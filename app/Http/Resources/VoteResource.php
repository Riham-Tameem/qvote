<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $active = $this->is_active?:false;
        $total_vote = $this->userVotes()->count();

        $request->request->add(['total_vote'=>$total_vote]);
        return [
            'id' => $this->id,
            'name' =>$this->name,
            'start_at'=> $this->start_at,
            'active'=>$active,
            'options' => OptionResource::collection($this->options),
        ];
    }
}
