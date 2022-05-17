<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    //chỉ định table được map, sử dụng custom name
    public $table = "users_information";

    //ngược lại của fillable, cho phép tất cả các trường
    //được mass-assignment
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
