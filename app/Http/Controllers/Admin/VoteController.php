<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vote\CreateRequest;
use App\Repositories\VoteEloquent;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct(VoteEloquent $voteEloquent)
    {
        $this->vote= $voteEloquent;
    }
    public function index()
    {
        return $this->vote->index();
    }
    public function create(){
        return $this->vote->create();
    }
    public function add(CreateRequest $request){
        return $this->vote->add($request->all());
    }
    public function edit(Request $request){
        return $this->vote->edit($request->all());
    }
    public function update(Request $request)
    {
        return $this->vote->update($request->all());
    }
    public function delete(Request $request)
    {
        return $this->vote->delete($request->all());
    }
}
