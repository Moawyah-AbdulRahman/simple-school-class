<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            $request['type'].'Id' => $this->id,
            'userId' => $this->user_id,
            'name' => $this->first_name.' '.$this->last_name,
            'phoneNumber' => $this->phone_number,
            'email' => $this->user->email,
            'type' => $request['type']
        ];
    }
}
