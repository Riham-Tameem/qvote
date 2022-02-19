<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\OptionEloquent;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function __construct(OptionEloquent $optionEloquent)
    {
        $this->option= $optionEloquent;
    }
    public function index($id)
    {

        return $this->option->index($id);
    }
    public function create(){
        return $this->option->create();
    }
    public function save(Request $request)
    {
        return $this->option->save($request->all());
    }
    public function edit($id){
        return $this->option->edit($id);
    }
    public function update(Request $request,$id)
    {
        return $this->option->update($request->all(),$id);
    }
    public function delete($id)
    {
        return $this->option->delete($id);
    }

}
