<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sexe',
        'email',
        'phone',
        'password',
        'candidat_id',
    ];

    /**
     * Get the candidat that owns the Observer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
