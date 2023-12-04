<?php

namespace App\Livewire;

use App\Models\Observer;
use App\Models\Result;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SendResult extends Component
{
    public $step = 1;
    public $centre = '';
    public $centreCode = '';
    public $bureau = '';
    public $votantInitial = '';
    public $votant = '';
    public $nosVoix = '';
    public $bulletinRestant = '';
    public $vars = ['centre', 'centreCode', 'bureau', 'votantInitial', 'votant', 'nosVoix', '$bulletinRestant'];

    public function render()
    {
        return view('livewire.send-result');
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
            case 7:
                $this->validate(['bulletinRestant' => 'required']);
                break;
        }
    }

    public function submitForm()
    {
        $this->validateStep();
        $this->saveData();
        return redirect()->route('result.create')->with('success', 'resultats soumis avec success');
    }

    private function saveData()
    {
        $observer = Observer::where('email', Auth::user()->email)
                        ->orWhere('phone', Auth::user()->phone)
                        ->first();
        Result::create([
            'centre' => $this->centre,
            'centreCode' => $this->centreCode,
            'bureau' => $this->bureau,
            'votantInitial' => $this->votantInitial,
            'votant' => $this->votant,
            'nosVoix' => $this->nosVoix,
            'bulletinRestant' => $this->bulletinRestant,
            'observer_id' => $observer->id,
        ]);
    }

}
