<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvocatDossier extends Model
{
    use HasFactory;
    
    protected $table = "avocat_dossiers";
    protected $fillable = [
        'dossier_id',
        'avocat_id'
    ];
}
