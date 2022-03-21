<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ACCOUNT_PASSWORD = 'password';
    const ACCOUNT_EMAIL = 'email';
    const ACCOUNT_DEFAULT_PASSWORD_VALUE = 'password';
    const ACCOUNT_WRONG_PASSWORD_VALUE = 'wrong-password';
    const ACCOUNT_NAME = 'name';
    const ACCOUNT_PASSWORD_CONFIRMATION = 'password_confirmation';
    const ACCOUNT_PROFILE = 'profile';
    const ACCOUNT_IMG = 'img';
    const ACCOUNT_GENDER = 'gender';
    const ACCOUNT_EMAIL_VERIFIED_AT = 'email_verified_at';
    const ACCOUNT_REMEMBER_TOKEN = 'remember_token';
    const ACCOUNT_REGISTER_TOKEN = 'register_token';
    const ACCOUNT_PASSWORD_RESET_TOKEN = 'password_reset_token';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 1ユーザーに対して複数のメモが紐づく
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memos(): HasMany
    {
        return $this->hasMany(Memo::class);
    }

    /**
     * 1ユーザーに対して複数のメモいいねが紐づく
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memoGoods(): HasMany
    {
        return $this->hasMany(MemoGood::class);
    }

    /**
     * 1つのメモに対して複数の返信が紐づく
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memoResponses(): HasMany
    {
        return $this->hasMany(MemoResponse::class);
    }

    /**
     * 1つのメモに対して複数の返信が紐づく
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memoResponseGoods(): HasMany
    {
        return $this->hasMany(MemoResponseGood::class);
    }

    public function getAuthAccount(): ?User
    {
        $user = Auth::user();
        return $user;
    }

    public function getAuthAccountId(): ?String
    {
        $userId = Auth::id();
        return $userId;
    }
}
