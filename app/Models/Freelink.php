<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelink extends Model
{
    use HasFactory;
    protected $fillable = [
        "motif",
        "titre_page",
        "montant",
        "moyen_paiement",
        "description",
        "logo"
    ];
    protected $table = "freelink";

}
