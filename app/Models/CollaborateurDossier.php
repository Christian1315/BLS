<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaborateurDossier extends Model
{
    use HasFactory;
    
    protected $table = "collaborateur_dossiers";
    protected $fillable = [
        'dossier_id',
        'collaborateur_id'
    ];
}
