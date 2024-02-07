<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'partietype_id',
        'partiecategory_id'


    ];
}
