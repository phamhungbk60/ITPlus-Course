<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userInformation()
    {
        //hasOne(model_đích, tên_khoá_ngoại)
        return $this->hasOne(UserInformation::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    /**
     * Viết mutator để tiến hành biến mật khẩu từ chuỗi thường sang
     * chuỗi được mã hoá (Mặc định là bcrypt - xem ở config/hashing.php)
     *
     * @param [type] $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
