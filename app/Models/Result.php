<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'centre',
        'centreCode',
        'bureau',
        'votantInitial',
        'votant',
        'nosVoix',
        'bulletinRestant',
        'observer_id',
    ];

    public function observer(): BelongsTo
    {
        return $this->belongsTo(Observer::class);
    }
}
