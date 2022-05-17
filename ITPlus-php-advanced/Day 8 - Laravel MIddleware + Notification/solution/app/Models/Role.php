<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 1;

    //specifying custom table name
    protected $table = "roles";

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
