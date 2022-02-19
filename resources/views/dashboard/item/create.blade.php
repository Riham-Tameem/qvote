@extends('dashboard.app')
@section('content')
    <div class="row" style="margin-bottom: 2rem;">
        <div class="col-md-12">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">الرئيسية</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>اضافة خيارات</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-grey-gallery uppercase">معلومات العنصر</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="" class="reload" data-original-title="" title=""> </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>

                <div class="portlet-body" style="display: block;">

                    <div class="row">
                        <div class="col-md-12">
                                <form class="form" action="{{route('options.store')}}" method="post"
                                      enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="name">النص </label>
                                                <input id="name" name="text" type="text" value="{{old('text')}}" class="form-control input-xlarge">
                                            </div>
                                        </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="name">التصويت </label>
                                               <select class="form-select form-control" aria-label="Default select example" name="vote_id"
                                                    id="vote_id">
                                                <option value="">اختر التصويت </option>
                                                @foreach($votes as $vote)
                                                    <option {{old('vote_id')==$vote->id?"selected":""}} value="{{$vote->id}}">{{$vote->name}}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">صورة العنصر</label>
                                                <input id="image" name="image" type="file" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row" style="float: left;">
                                        <div class="col-md-12">
                                            <button type="reset" class="btn default">الغاء</button>
                                            <button type="submit" class="btn green">اضافة</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END GRID PORTLET-->
        </div>
    </div>
@endsection
