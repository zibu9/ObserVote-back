<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'regroupement',
        'parti',
        'candidat',
        'sexe',
        'province',
        'circonscription',
        'email',
        'phone',
        'password',
        'type_id',

    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function observers()
    {
        return $this->hasMany(Observer::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    protected static function booted()
    {
        static::created(function ($candidat) {
            $candidat->createUser();
        });
    }

    public function createUser()
    {
        $user = new User([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role_id' => 2,
            'candidat_id' => $this->id,
        ]);

        $this->users()->save($user);

        //Mail::to($this->email)
           // ->send(new NewUser($username, $this->password));
    }
}
