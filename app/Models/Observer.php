<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function users()
    {
        return $this->hasMany(User::class);
    }

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
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role_id' => 3,
            'candidat_id' => (int) Auth::user()->candidat->id,
        ]);

        //$this->users()->save($user);

        //Mail::to($this->email)
           // ->send(new NewUser($username, $this->password));
    }
}
