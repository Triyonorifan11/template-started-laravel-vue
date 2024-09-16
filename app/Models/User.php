<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasUUID;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Wildside\Userstamps\Userstamps;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, SoftCascadeTrait, Userstamps, HasUUID;

    protected $guarded = ['id', 'id_hash'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'created_at' => 'string',
        'updated_at' => 'string',
        'deleted_at' => 'string',
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    // public function voucherHistory()
    // {
    //     return $this->hasMany(VoucherHistory::class, 'user_id', 'id');
    // }

    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * Utils
     *
     * @param  array|string $slug
     * @return bool
     */
    public function hasRole($slug)
    {
        $role = $this->role;

        if (is_array($slug)) {
            return in_array($role->slug, $slug);
        }

        return $role->slug == $slug;
    }

    /**
     * Utils
     *
     * @return bool
     */
    // public function isUserTwoFactorAuthenticationRequired()
    // {
    //     $roles = [
    //         'admin',
    //         'super-admin',
    //         // 'reviewer',
    //     ];

    //     return $this->hasRole($roles);
    // }

    // public function sendPasswordResetNotification($token)
    // {
    //     $greetingMessage = '';
    //     $hour = date("H");

    //     if ($hour < 12) {
    //         $greetingMessage = "Good Morning";
    //     } elseif ($hour >=12 && $hour < 18){
    //         $greetingMessage = "Good Afternoon";
    //     } elseif ($hour >= 18) {
    //         $greetingMessage = "Good Evening";
    //     }

    //     $details = [
    //         'link' => url("/reset-password/$token" . '?email=' . $this->email),
    //         'username' => $this->name,
    //         'greetingMessage' => $greetingMessage,
    //     ];
    //     $this->notify(new ResetPasswordNotification($details));
    // }
}
