<?php

namespace App\Livewire;

use Livewire\Component;

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
    public $filled = [false, false, false, false, false, false, false];

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

        $this->filled[$this->step - 1] = true;
    }

}
