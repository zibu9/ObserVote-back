<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
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

    protected static function booted()
    {
        static::created(function ($observer) {
            $observer->createUser();
        });
    }

    public function createUser()
    {
        $user = new User([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role_id' => 3,
            'candidat_id' => $this->id,
        ]);

        $this->users()->save($user);

        //Mail::to($this->email)
           // ->send(new NewUser($username, $this->password));
    }
}
