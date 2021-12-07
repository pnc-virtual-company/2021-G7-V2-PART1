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
       
            return [
                "first_name"=>$this->first_name,
                "last_name"=>$this->last_name,
                "email"=>$this->email,
                "phone_number"=>$this->phone_number,
                "password"=>$this->password,
                'created_at'=>$this->created_at->format('D|d F Y|h:i A'),
                'updated_at'=>$this->updated_at->format('D|d F Y|h:i A'),
    
            ];


    }
}
