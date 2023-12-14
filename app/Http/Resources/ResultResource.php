<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'province' => $this->province,
            'circonscription' => $this->circonscription,
            'circonscription_id' => $this->circonscription_id,
            'centre' => $this->centre,
            'centreCode' => $this->centreCode,
            'bureau' => $this->bureau,
            'votantInitial' => $this->votantInitial,
            'votant' => $this->votant,
            'nosVoix' => $this->nosVoix,
            'bulletinRestant' => $this->bulletinRestant,
            'observer_id' => $this->observer_id,
            'candidat_id' => $this->candidat_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
