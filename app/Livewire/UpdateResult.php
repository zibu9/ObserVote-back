<?php

namespace App\Livewire;

use Livewire\Component;

class UpdateResult extends Component
{
    public $result;
    public $centre;
    public $centreCode;
    public $bureau;
    public $votantInitial;
    public $votant;
    public $nosVoix;
    public $bulletinRestant;
    public $id;

    public function render()
    {
        return view('livewire.update-result');
    }

    public function mount()
    {
        $this->centre = $this->result->centre;
        $this->centreCode = $this->result->centreCode;
        $this->bureau = $this->result->bureau;
        $this->votantInitial = $this->result->votantInitial;
        $this->votant = $this->result->votant;
        $this->nosVoix = $this->result->nosVoix;
        $this->bulletinRestant = $this->result->bulletinRestant;
        $this->id = $this->result->id;
    }
}
