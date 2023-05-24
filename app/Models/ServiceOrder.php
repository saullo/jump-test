<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceOrder extends Model
{
    use HasFactory;

    /**
     * Desabilita as colunas created_at, updated_at e deleted_at
     */
    public $timestamps = false;

    /**
     * Colunas que podem ser inseridas no banco de dados
     */
    public $fillable = [
        'vehiclePlate',
        'entryDateTime',
        'exitDateTime',
        'priceType',
        'price',
        'userId'
    ];

    /**
     * Retorna o relacionamento entre as tabelas service_orders->user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
