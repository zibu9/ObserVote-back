<?php

namespace App\Models;

use App\Models\Circonscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    public function circonscriptions()
    {
        return $this->hasMany(Circonscription::class);
    }
}
