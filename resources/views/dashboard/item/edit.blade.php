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
                        <span>تعديل </span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">معلومات </span>
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
                            <form class="form" action="{{route('options.update',$option->id)}}" method="post" id="registrationForm"
                                  enctype="multipart/form-data">
                                @csrf
                                @method("put")
                                <input type="hidden" value="" name="">
                                <div class="form-body">
                                    <div calss="row">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">اسم العنصر</label>
                                                <input id="company" name="text" type="text" value="{{$option->text}}" class="form-control input">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="image">صورة العنصر</label>
                                                    <div style="width:30%">
                                                        {{-- <img  src="{{asset('blog-frontend/img/default-avatar.jpg')}}" class="center"> --}}
                                                        {{-- <img  src="{{asset('storage/images/'.$post->image)}}" class="center"> --}}
                                                        <img  style="width: 650px;height: 300px" src="{{$option->image}}" class="center">
                                                    </div>
                                                    <input type="file" class="form-control" name="image" id="editImage">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row" style="float: left;">
                                        <div class="col-md-12">
                                            <button type="reset" class="btn default">الغاء</button>
                                            <button type="submit" class="btn green">تعديل</button>
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
