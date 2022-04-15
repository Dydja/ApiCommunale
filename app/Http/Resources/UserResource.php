<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'prenom'=>$this->prenom,
            // 'IdCommune'=>$this->IdCommune,
            'commune'=> new CommuneResource($this->commune),
            //'IdTypeUtilisateur'=>$this->IdTypeUtilisateur,
            'type_utilisateur' => new TypeUtilisateurResource($this->type_utilisateur),
        ];
    }
}
