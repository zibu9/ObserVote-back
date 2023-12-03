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

}
