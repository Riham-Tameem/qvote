<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserVoteEloquent;
use Illuminate\Http\Request;

class UserVoteController extends Controller
{
    public function __construct(UserVoteEloquent $userVoteEloquent)
    {
        $this->userVote= $userVoteEloquent;
    }
    public function index(){
        return $this->userVote->index();
    }
    public function addVote(Request $request){
        return $this->userVote->addVote($request->all());
    }
}
