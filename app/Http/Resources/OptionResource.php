<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
 $this->userVotes->count();
        $prec=0;
        $candite_count = $this->userVotes()->count();
            $total_vote = $request->get('total_vote');
        //  return  $request;
        if($total_vote > 0){
            $prec = ($candite_count/$total_vote) *100.0;
        }

        $count=$this->userVotes->count();


        return [
            'id' => $this->id,
            'text' => $this->text,
            'image' => $this->image,
            'vote_precentage' => $prec,
            'total_votes' => $candite_count,
        ];
    }
}
