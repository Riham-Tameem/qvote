<?php

namespace App\Repositories;


use App\Models\Option;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class VoteEloquent
{
    private $model;

    public function __construct(Vote $vote)
    {
        $this->model = $vote;
    }

    public function index()
    {
       // dd($q);
        $votes = Vote::orderBy('created_at', 'desc')->get();


        return view('dashboard.main',compact('votes'));
//            ->with(['votes' => $votes]);
    }

    public function create()
    {
       // $priceArray=['0','2'];
        return view('dashboard.vote.create');
    }

    public function add(array $data)
    {
    // dd($data);
        DB::beginTransaction();

        try {
            $vote = Vote::create([
                'name' => $data['name'],
                'company' => $data['company'],
                'start_at' => $data['start_at'],
                'end_at' => $data['end_at'],
            ]);
            $options=$data['options'];
            if (isset($data['options'])) {
                foreach ($options as $key => $option) {
                    $filename = $options[$key]['image']->store('images');
                    // $imagename = $option['image']->hashName();
                    $image = $filename;
                    Option::create([
                        'vote_id' => $vote->id,
                        'text' => $options[$key]['text'],
                        'image' => $image,
                    ]);
                }
            }
        DB::commit();
            return redirect(route('votes.index'))->with('msg','تمت عملية الحفظ بنجاح"');
           //return $this->sendResponse('add product successfully', new ProductResource($product));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect(route('votes.create'))->with('msg',$e->getMessage());
            // something went wrong
        }
    }

    public function edit($id){
        //$vote=Vote::where('id',$data['id'])->first();
        $vote = Vote::find($id);
        return view('dashboard.vote.edit')->with([
            'vote'=>$vote
        ]);
    }
    public function update(array $data, $id){
        //$vote=Vote::where('id',$data['id'])->first();

        $vote = Vote::find($id);
        $vote->update($data);
        return redirect(route('votes.index'))->with("msg","تمت عملية التعديل بنجاح");

    }
    public function show($id){
        $vote = Vote::find($id);
//        return redirect(route('vote.index'));
        return $vote;
    }
    public function delete(array $data){
       // $vote=Vote::where('id',$data['id'])->first();
         // return  $id = $data['id'];
        $vote = Vote::findOrFail($data['id']);
            $vote->delete();
            session()->flash("msg","تمت عملية الحذف بنجاح");
        return redirect(route('votes.index'));

    }
    public function destroy($id){
        // $vote=Vote::where('id',$data['id'])->first();

        $vote = Vote::find($id);
//        dd($vote);
        if($vote){
            $vote->delete();
            session()->flash("msg","تمت عملية الحذف بنجاح");
        }
        return redirect(route('votes.index'));

    }

}
