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
    public $typeId;
    public $name;
    public $regroupement;
    public $parti;
    public $candidat;
    public $sexe = '';
    public $province;
    public $circonscription;
    public $email;
    public $phone;
    public $password;
    public $provinces;
    public $circonscriptions;
    public $showCir=false;

    public function mount($types, $provinces)
    {
        $this->types = $types;
        $this->typeId = $types[0]->id; // Sélectionnez le premier type par défaut
        $this->provinces = $provinces;
        $this->circonscriptions;
        $this->province = NULL;
        $this->sexe = "Masculin";
    }

    public function render()
    {
        return view('livewire.add-candidat');
    }

    public function updatedProvince($pays)
    {
        if(!empty($pays)){
            $province = Province::find($pays);
            $this->circonscriptions = $province->circonscriptions;
            $this->showCir = true;
        }
    }

    public function submitForm()
    {
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
            'type_id' => (int) $this->typeId,
        ]);

        $candidat->update([
            'password' => Hash::make($password),
        ]);

        return redirect()->route('candidat.index')->with('success', 'Candidat créé avec succès');;
    }
}
