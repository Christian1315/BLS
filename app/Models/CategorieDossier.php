<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategorieDossier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
        
    ];
    
function Dossier(): HasMany
{
    return $this->hasMany(Dossier::class, "category");
}
    
}
