<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
use App\Mail\SendMail;
use App\Models\User;
use App\Models\Roles;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => (int) config('sanctum.expiration')
        ];
    }

    /**
     * @OA\Post(
     *   tags={"Api|Auth"},
     *   path="/api/auth/register",
     *   summary="Auth register",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"name", "email", "phone", "password", "password_confirmation"},
     *       @OA\Property(property="name", type="string"),
     *       @OA\Property(property="email", type="string", format="email"),
     *       @OA\Property(property="phone", type="integer", format="phone"),
     *       @OA\Property(property="password", type="string", format="password"),
     *       @OA\Property(property="password_confirmation", type="string", format="password"),
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/ResponseFormatter")
     *   )
     * )
     */
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|phone:ID',
            'password' => 'required|string|min:6|confirmed',
        ];

        $messages = [];

        $attributes = [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone Number',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation'
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return ResponseFormatter::error($errors, 'Please fill out the form correctly.', 422);
        }

        $role = Roles::where('slug', 'customer')->first();

        if (!$role) {
            return ResponseFormatter::error(null, 'Role customer not found', 404);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email_verified_at' => null,
            'is_active' => false,
            'id_hash' => Str::uuid(),
            'role_id' => $role->id,
        ]);

        event(new Registered($user));

        // send email verify user
        // if($user->count() > 0){
        //     $details = [
        //         'subject' => 'Register User at Website Menara Danareksa',
        //         'link' => url('/') . '/verify-email/user/' . $user->id_hash . '?email=' . $user->email,
        //         'view' => 'emails.registerMail'
        //     ];

        //     Mail::to($request->email)->send(new SendMail($details));
        // }

        return ResponseFormatter::success(new UserResource($user), 'User registered successfully. Please Check your email!');
    }

    /**
     * @OA\Post(
     *   tags={"Api|Auth"},
     *   path="/api/auth/login",
     *   summary="Auth login",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"username", "password"},
     *       @OA\Property(property="username", type="string"),
     *       @OA\Property(property="password", type="string", format="password"),
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/ResponseFormatter")
     *   )
     * )
     */
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string',
            'recaptcha' => 'nullable|string',
        ];

        $messages = [];

        $attributes = [
            'username' => 'Username',
            'password' => 'Password',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return ResponseFormatter::error($errors, 'Please fill out the form correctly.', 422);
        }

        if ($request->filled('recaptcha')) {
            $client = new Client();
            $response = $client->post(
                'https://www.google.com/recaptcha/api/siteverify',
                [
                    'verify' => !(config('app.env') == 'local'),
                    'form_params' => [
                        'secret' => config('env.recaptcha_key.secret'),
                        'remoteip' => request()->getClientIp(),
                        'response' => $request->recaptcha,
                    ]
                ]
            );
            $body = json_decode((string)$response->getBody());
            if (!$body->success) {
                return ResponseFormatter::error([], 'Failed verfication captcha!', 401);
            }
        }

        $credentials = $request->only('username', 'password');

        if (!auth()->attempt($credentials)) {
            return ResponseFormatter::error([], 'Username or password is incorrect!', 401);
        }

        $userAuth = $this->userInterface->findById(
            id: auth()->user()->id,
            withRelations: ['role', 'userable'],
            method: 'find'
        );

        if (empty($userAuth)) {
            return ResponseFormatter::error([], 'User data not found', 403);
        }

        if ($userAuth->is_active != true) {
            return ResponseFormatter::error([], 'Your account is inactive. Please verify your email first!', 403);
        }

        // make token
        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        return ResponseFormatter::success([
            'token' => $this->respondWithToken($token),
            'user' => (new UserResource($userAuth))->toArray($request),
        ], 'User successfully logged in');
    }

    /**
     * @OA\Post(
     *   tags={"Api|Auth"},
     *   path="/api/auth/logout",
     *   summary="Auth logout",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/ResponseFormatter")
     *   )
     * )
     */
    public function logout(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return ResponseFormatter::error([], 'User tidak terautentikasi', 401);
        }

        $user->currentAccessToken()->delete();

        return ResponseFormatter::success([], 'User berhasil logout');
    }

    /**
     * @OA\Get(
     *   tags={"Api|Auth"},
     *   path="/api/auth/me",
     *   summary="Profil user after login",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/ResponseFormatter")
     *   )
     * )
     */
    public function me()
    {
        $userAuth = $this->userInterface->findById(
            id: auth()->user()->id,
            withRelations: ['role', 'userable']
        );

        if (!$userAuth) {
            return ResponseFormatter::error(null, 'User not found', 404);
        }

        return ResponseFormatter::success(new UserResource($userAuth), 'Your data displayed successfuly');
    }

    /**
     * @OA\Put(
     *   tags={"Api|Auth"},
     *   path="/api/auth/change-password",
     *   summary="Auth change password",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"current_password", "new_password", "new_password_confirmation"},
     *       @OA\Property(property="current_password", type="string", format="password"),
     *       @OA\Property(property="new_password", type="string", format="password"),
     *       @OA\Property(property="new_password_confirmation", type="string", format="password")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/ResponseFormatter")
     *   )
     * )
     */
    public function changePassword(Request $request)
    {
        DB::beginTransaction();

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|different:current_password|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6',
        ];

        $messages = [];

        $attributes = [
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'new_password_confirmation' => 'New Password Confirmation',
        ];


        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            DB::rollBack();
            $errors = $validator->errors()->toArray();
            return ResponseFormatter::error($errors, 'Silahkan isi form dengan benar terlebih dahulu', 422);
        }

        $userAuth = $this->userInterface->findById(
            id: auth()->user()->id
        );

        if (!Hash::check($request->current_password, $userAuth->password)) {
            DB::rollBack();
            return ResponseFormatter::error(null, 'Password lama tidak sama dengan password yang sekarang', 400);
        }

        $userAuth->password = Hash::make($request->new_password);
        $userAuth->save();

        DB::commit();
        return ResponseFormatter::success([], 'Password berhasil diubah');
    }

    public function updateProfile(Request $request, $id)
    {
        $isUuid = Str::isUuid($id);
        if (!$isUuid) {
            return ResponseFormatter::error(null, 'Invalid ID format', 400);
        }

        DB::beginTransaction();

        $userByIdHash = $this->userInterface->findByIdHash(
            id: $id,
        );

        if (is_null($userByIdHash) || empty($userByIdHash)) {
            return ResponseFormatter::error(null, 'Data not found', 404);
        }

        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $userByIdHash->id,
            'current_password' => 'nullable',
            'password' => 'nullable|min:6|confirmed|different:current_password',
            // 'new_password_confirmation' => 'nullable|min:6',
        ];

        $messages = [];

        $attributes = [
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
            'current_password' => 'Current Password',
            // 'new_password_confirmation' => 'Password Confirmation',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            DB::rollBack();
            $errors = $validator->errors()->toArray();
            return ResponseFormatter::error($errors, 'Please fill out the form correctly', 422);
        }

        try {

            $dataUpdateUser = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ];

            $userAuth = $this->userInterface->findById(
                id: auth()->user()->id
            );

            if($request->filled('current_password')){
                if (!Hash::check($request->current_password, $userAuth->password)) {
                    DB::rollBack();
                    return ResponseFormatter::error(null, 'Old password is not the same as current password', 400);
                }
            }

            if ($request->filled('password')) {
                $dataUpdateUser['password'] = Hash::make($request->password);
            }

            $user = $this->userInterface->update(
                id: $id,
                data: $dataUpdateUser
            );

            DB::commit();

        $greetingMessage = '';
        $hour = date("H");

        if ($hour < 12) {
            $greetingMessage = "Good Morning";
        } elseif ($hour >=12 && $hour < 18){
            $greetingMessage = "Good Afternoon";
        } elseif ($hour >= 18) {
            $greetingMessage = "Good Evening";
        }

            // send email verify user
        $details = [
            'subject' => 'Update Profile & Password User at Website Menara Danareksa',
            'view' => 'emails.confirmUpdateProfileMail',
            'email' => $user->email,
            'date' => $user->updated_at,
            'greetingMessage' => $greetingMessage,
            'username' => $user->name,
        ];

            // Mail::to($request->email)->send(new SendMail($details));

            return ResponseFormatter::success(new UserResource($user), 'Data profile edited successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(null, 'An error occurred while saving data: ' . $e->getMessage(), 500);
        }
    }

    /**
     * for verify email user
     */
    public function verifyEmailUser(Request $request, $id)
    {
        $isUuid = Str::isUuid($id);
        if (!$isUuid) {
            return ResponseFormatter::error(null, 'Invalid ID format', 400);
        }


        $userByIdHash = $this->userInterface->findByIdHash(
            id: $id,
        );

        if (is_null($userByIdHash) || empty($userByIdHash)) {
            return ResponseFormatter::error(null, 'Data not found', 404);
        }

        if ($userByIdHash->email_verified_at !== null && $userByIdHash->is_active) {
            return ResponseFormatter::error(null, 'User has been verified at ' . date_format($userByIdHash->email_verified_at, 'd/M/Y H:i'), 401);
        }

        try {
            DB::beginTransaction();
            $dataUpdateUser = [
                'email_verified_at' => date('Y-m-d H:i:s'),
                'is_active' => true,
            ];

            $user = $this->userInterface->update(
                id: $id,
                data: $dataUpdateUser
            );

            DB::commit();

            return ResponseFormatter::success(new UserResource($user), 'Data customer verify successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(null, 'An error occurred while saving data: ' . $e->getMessage(), 500);
        }
    }
}
