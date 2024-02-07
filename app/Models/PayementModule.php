<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PayementModule extends Model
{
    use HasFactory;
    protected $fillable = [
        "label",
        "image",
        "description",
    ];
    function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, "module");
    }
}
