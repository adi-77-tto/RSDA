<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_name',
        'donor_phone',
        'transaction_id',
        'amount',
        'payment_method',
        'status',
        'admin_note'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Scope for pending donations
    public function scopePending($query)
    {
        return $query->where('status', 'pending')->latest();
    }

    // Scope for verified donations
    public function scopeVerified($query)
    {
        return $query->where('status', 'verified')->latest();
    }
}
