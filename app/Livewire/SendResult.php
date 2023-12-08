<?php

namespace App\Livewire;

use App\Models\Result;
use Livewire\Component;
use App\Models\Observer;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;

class SendResult extends Component
{
    public $step = 1;
    public $province = '';
    public $provinces;
    public $circonscription = '';
    public $circonscriptions;
    public $centre = '';
    public $centreCode = '';
    public $bureau = '';
    public $votantInitial = '';
    public $votant = '';
    public $nosVoix = '';
    public $vars = ['centre', 'centreCode', 'bureau', 'votantInitial', 'votant', 'nosVoix'];
    public $showCir=false;
    public $errors = false;

    public function mount($provinces)
    {
        $this->provinces = $provinces;
        $this->circonscriptions = collect();
    }

    public function updatedProvince($pays)
    {
        if(!empty($pays)){
            $province = Province::find($pays);
            $this->circonscriptions = $province->circonscriptions;
            $this->showCir = true;
        }
    }

    public function render()
    {
        return view('livewire.send-result', [
            'bulletinRestant' => $this->calculateBulletinRestant(),
        ]);
    }

    protected function calculateBulletinRestant()
    {
        return (int) $this->votantInitial - (int) $this->votant;
    }

    public function nextStep()
    {
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    private function validateStep()
    {
        switch ($this->step) {
            case 1:
                $this->validate(['province' => 'required']);
                $this->validate(['circonscription' => 'required']);
                $this->validate(['centre' => 'required']);
                break;

            case 2:
                $this->validate(['centreCode' => 'required']);
                break;

            case 3:
                $this->validate(['bureau' => 'required']);
                break;
            case 4:
                $this->validate(['votantInitial' => 'required']);
                break;
            case 5:
                $this->validate(['votant' => 'required']);
                break;
            case 6:
                $this->validate(['nosVoix' => 'required']);
                break;
            // case 7:
            //     $this->validate(['bulletinRestant' => 'required']);
            //    break;
        }
    }

    public function submitForm()
    {
        $this->validateStep();
        $this->saveData();
        return redirect()->route('result.index')->with('success', 'resultats soumis avec success');

    }

    private function saveData()
    {
        $observer = Observer::where('email', Auth::user()->email)
                        ->orWhere('phone', Auth::user()->phone)
                        ->first();
        Result::create([
            'province' => $this->province,
            'circonscription' => $this->circonscription,
            'circonscription_id' => (int)$this->circonscription,
            'centre' => $this->centre,
            'centreCode' => $this->centreCode,
            'bureau' => $this->bureau,
            'votantInitial' => $this->votantInitial,
            'votant' => $this->votant,
            'nosVoix' => $this->nosVoix,
            'bulletinRestant' => $this->calculateBulletinRestant(),
            'observer_id' => $observer->id,
            'candidat_id' => $observer->candidat_id,
        ]);
    }

}
