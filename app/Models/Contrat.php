<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contrat extends Model
{
    /** @use HasFactory<\Database\Factories\ContratFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'amount',
        'status',
        'user_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'amount' => 'decimal:2',
    ];
}
