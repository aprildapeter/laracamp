<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','card_number', 'exp','cvc','camp_id','is_paid'
    ];

    public function setExpiredAttribute($value)
    {
        $this->attributes['exp'] = date('Y-m-t', strtotime($value));
    }

    /**
     * Get the camp that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function camp(): BelongsTo
    {
        return $this->belongsTo(Camps::class);
    }
}
