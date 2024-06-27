<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class contactsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
   


        public function toArray($request)
        {

          return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'company' => $this->physician_id,
            'email' => $this->email,
            'phone' => $this->phone,

          ];
        }
    
}
