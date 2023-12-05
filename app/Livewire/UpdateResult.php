<?php

namespace App\Livewire;

use App\Models\Result;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

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
    public $alert = "";

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

    public function update()
    {
        $result = Result::find($this->id);
        $table = [
            'centre' => $this->centre,
            'centreCode' => $this->centreCode,
            'bureau' => $this->bureau,
            'votantInitial' => $this->votantInitial,
            'votant' => $this->votant,
            'nosVoix' => $this->nosVoix,
            'bulletinRestant' => $this->bulletinRestant,
        ];
        if ( $result->created_at === $result->updated_at) {
            $result->update($table);
            return redirect()->route('result.index')->with('success', 'resultats modifier avec success');
        }
        else{
            return redirect()->route('result.index')->with('warning', 'vous ne pouvez plus modifier');
        }
    }

}
