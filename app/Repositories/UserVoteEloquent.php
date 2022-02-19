<?php

namespace App\Repositories;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\UserVoteResource;
use App\Http\Resources\VoteResource;
use App\Models\UserVote;
use App\Models\Vote;

class UserVoteEloquent extends BaseController
{

    private $model;

    public function __construct(UserVote $userVote)
    {
        $this->model = $userVote;
    }
    public function index(){
        $votes=Vote::orderBy('created_at', 'desc')->get();
        return $this->sendResponse('احدث الاضافات ',VoteResource::collection($votes));
    }

    public function addVote(array $data){
        $is_vote=UserVote::where('mac_address',$data['mac_address'])
                            ->where('vote_id',$data['vote_id'])
                            ->first();
//        $vote= UserVote::get();
//        dd($is_vote);
        if($is_vote){
            return $this->sendError(400,'تم التصويت من قبل ');
        }
        $userVote= UserVote::create([
            'vote_id'=>$data['vote_id'],
            'option_id'=>$data['option_id'],
            'mac_address'=>$data['mac_address']
        ]);
        return $this->sendResponse('تم اضافة التصويت بنجاح ', new UserVoteResource($userVote));
    }

}
