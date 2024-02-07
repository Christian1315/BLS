<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossiersJuridiction extends Model
{
    use HasFactory;

    protected $table = "dossiers_juridictions";
    protected $fillable = [
        'dossier_id',
        'juridiction_id'
    ];
}
