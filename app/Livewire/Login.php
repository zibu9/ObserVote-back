<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $loginType = 'email';

    public function render()
    {
        return view('livewire.login');
    }

}
