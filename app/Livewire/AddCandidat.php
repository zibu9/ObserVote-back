<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidat;
use App\Models\Province;
use App\Models\Circonscription;
use Illuminate\Support\Facades\Hash;

class AddCandidat extends Component
{
    public $types;
    public $type_id;
    public $name;
    public $regroupement;
    public $parti;
    public $candidat;
    public $sexe;
    public $province;
    public $circonscription;
    public $email;
    public $phone;
    public $password;
    public $provinces;
    public $circonscriptions;
    public $selectProvince = NULL;
    public $selectCirconscription = NULL;
    public $selectId;

    public function mount($types, $provinces)
    {
        $this->types = $types;
        $this->type_id = $types[0]->id; // Sélectionnez le premier type par défaut
        $this->provinces = $provinces;
        $this->circonscriptions = collect();
        $this->selectId = 'select2_' . uniqid();
    }

    public function render()
    {
        return view('livewire.add-candidat');
    }

    public function updatedSelectProvince($pays)
    {
        if(!empty($pays)){
            $province = Province::find($pays);
            $this->circonscriptions = $province->circonscriptions();
        }
    }

    public function submitForm()
    {
        dd($this->type_id);
        $this->validate([
            'name' => 'required|string',
            'parti' => 'required|string',
            'candidat' => 'required|string',
            'sexe' => 'required|string',
            'email' => 'required|email|unique:candidats,email',
            'phone' => 'unique:candidats,phone',
            'password' => 'required|string|min:8',
        ]);

        $password = $this->password;

        $candidat = Candidat::create([
            'name' => $this->name,
            'regroupement' => $this->regroupement,
            'parti' => $this->parti,
            'candidat' => $this->candidat,
            'sexe' => $this->sexe,
            'province' => $this->province,
            'circonscription' => $this->circonscription,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $password,
            'type_id' => (int) $this->type_id,
        ]);

        $candidat->update([
            'password' => Hash::make($password),
        ]);

        session()->flash('success', 'Candidat créé avec succès');

        return redirect()->route('candidat.index');
    }
}
