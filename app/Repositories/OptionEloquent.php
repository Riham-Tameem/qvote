<?php

namespace App\Repositories;

use App\Models\Option;
use App\Models\Vote;

class OptionEloquent
{
    private $model;

    public function __construct(Option $option)
    {
        $this->model = $option;
    }
    public function index($id){
        $vote=Vote::find($id);
        $options=Option::where('vote_id',$id)->get();
        return view('dashboard.item.index',compact('options','vote'));
        // dd($options);

    }
    public function create()
    {
        $votes=Vote::get();
        return view('dashboard.item.create',compact('votes'));
    }
    public function save(array $data){

        $filename = $data['image']->store('images');
        // $imagename = $option['image']->hashName();
        $image = $filename;
        Option::create([
            'vote_id' => $data['vote_id'],
            'text' => $data['text'],
            'image' => $image,
        ]);

        return redirect(route('votes.index'))->with("msg","تمت عملية الاضافة بنجاح");

    }
    public function edit($id){
        $option = Option::find($id);
        return view('dashboard.item.edit')->with([
            'option'=>$option
        ]);
    }
    public function update(array $data,$id){
   // dd($data);
        $option = Option::find($id);
        if(isset($data['image'])){
            $filename = $data['image']->store('images');
            $data['image']=$filename;
        }
        $option->update($data);
        return redirect(route('options.index',$option->vote_id))->with("msg","تمت عملية التعديل بنجاح");
    }

    public function delete($id){
        dd($id);
    }

}
