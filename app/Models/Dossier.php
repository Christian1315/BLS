<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'num',
        'reference',
        'commentaire',
        'date_create',
        'statut',
        'category',
        'amount',
        'user',
        'juridiction',
    ];
    function category(): BelongsTo
    {
        return $this->belongsTo(CategorieDossier::class, "category");
    }
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "category");
    }

    function juridictions() : BelongsToMany {
        return $this->belongsToMany(Juridiction::class,"dossiers_juridictions","dossier_id","juridiction_id");
    }

    
    function avocats() : BelongsToMany {
        return $this->belongsToMany(Avocat::class,"avocat_dossiers","dossier_id","avocat_id");
    }
    function collaborateurs() : BelongsToMany {
        return $this->belongsToMany(Collaborateur::class,"collaborateur_dossiers","dossier_id","collaborateur_id");
    }
    
    function documents() : BelongsToMany {
        return $this->belongsToMany(Document::class,"dossiers_documents","dossier_id","document_id");
    }
}
