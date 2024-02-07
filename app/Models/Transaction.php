<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "type",
        "transaction_id",
        "status",
        "transaction_amount",
        "payment_amount",
        "client",
        "module",
        "date_transaction",
        "account_owner",
    ];

    function _type(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class, "type");
    }

    function _client(): BelongsTo
    {
        return $this->belongsTo(Client::class, "client");
    }
    function _module(): BelongsTo
    {
        return $this->belongsTo(PayementModule::class, "module");
    }

    function _status(): BelongsTo
    {
        return $this->belongsTo(TransactionStatus::class, "status");
    }
}
