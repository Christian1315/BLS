<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossiersDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'dossier_id',
        'document_id'
        
    ];
    
}
