<?php

namespace App\Livewire;

use Livewire\Component;

class UpdateResult extends Component
{
    public $result;
    public $centre = '';
    public $centreCode = '';
    public $bureau = '';
    public $votantInitial = '';
    public $votant = '';
    public $nosVoix = '';
    public $bulletinRestant = '';
    public $id;

    public function render()
    {
        return view('livewire.update-result');
    }
}
