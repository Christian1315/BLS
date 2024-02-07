<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRight extends Model
{
    use HasFactory;
    protected $table = "users_rights";
    protected $fillable = [
        'user_id',
        'right_id'
    ];
}
