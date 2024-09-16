<?php

namespace App\Helpers;

use Illuminate\Support\MessageBag;

/**
 * @OA\Schema(
 *   schema="ResponseFormatter",
 *   type="object",
 *   @OA\Property(
 *     property="meta",
 *     type="object",
 *     @OA\Property(property="code", type="integer", default="200"),
 *     @OA\Property(property="status", type="string", default="success"),
 *     @OA\Property(property="message", type="string")
 *   ),
 *   @OA\Property(property="data", type="object", default=null)
 * ),
 */
class ResponseFormatter
{
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => null,
            'message' => null,
        ],
        'data' => null
    ];

    public static function success($data = null, $message = null)
    {
        self::$response['meta']['code'] = 200;
        self::$response['meta']['status'] = 'success';
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function error($errors = [], $message = null, $code = 400)
    {
        self::$response['meta']['code'] = $code;
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['message'] = $message;

        if ($errors instanceof MessageBag) {
            $errors = $errors->toArray();
        }

        if (is_array($errors) && isset($errors['exception_class'], $errors['file'], $errors['line'])) {
            self::$response['data']['errors'] = [];
        } elseif (is_array($errors)) {
            self::$response['data']['errors'] = array_map(function ($field, $messages) {
                return array_map(function ($message) use ($field) {
                    return [
                        'field' => ucfirst($field),
                        'message' => $message,
                    ];
                }, (array) $messages); // Pastikan $messages adalah array
            }, array_keys($errors), $errors);

            self::$response['data']['errors'] = array_merge(...self::$response['data']['errors']);
        } else {
            self::$response['data']['errors'] = [];
        }

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
