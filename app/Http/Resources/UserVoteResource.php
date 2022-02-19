<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserVoteResource extends JsonResource
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
          'vote'=>$this->vote,
          'option'=>$this->option,
          'mac_address'=>$this->mac_address
        ];

    }
}
