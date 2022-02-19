<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vote\CreateRequest;
use App\Models\Vote;
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

    public function create()
    {
        return $this->vote->create();
    }


    public function store(CreateRequest $request)
    {
        return $this->vote->add($request->all());
    }


    public function show($id)
    {
        return $this->vote->show($id);
    }

    public function edit($id)
    {
        return $this->vote->edit($id);

    }

    public function update(Request $request, $id)
    {
        return $this->vote->update($request->all(), $id);
    }

    public function destroy(Request $request)
    {
       $id = $request->all();
      // return $id;
        $vote = Vote::findOrFail($id);
        dd($vote);
        $vote->delete();
        session()->flash("msg","تمت عملية الحذف بنجاح");
        return redirect(route('votes.index'));

    }
}
