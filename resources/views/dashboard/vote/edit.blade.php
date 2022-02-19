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
{{--                            <form action="#" method="" enctype="multipart/form-data">--}}
                                <form class="form" action="{{route('votes.update',$vote->id)}}" method="post" id="registrationForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method("put")
{{--                                <input type="hidden" value="" name="">--}}
                                <div class="form-body">
                                    <div class="col-12 col-sm-8">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="name">اسم الشركة  </label>                                            </div>
                                            <div class="col-md-8">
                                                <input id="company" name="company" type="text" value="{{$vote->company}}" class="form-control input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="name">السؤال </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="name" name="name" type="text" value="{{$vote->name}}" class="form-control input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="name">تاريخ البداية </label>
                                            </div>
                                            <div class="col-md-8">

                                                    <input type="datetime-local" name="start_at"
                                                           class="form-control" value="{{$vote->start_at}}"
                                                           placeholder="تاريخ البداية">

                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="name">تاريخ النهاية </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="datetime-local" name="end_at"
                                                       class="form-control" value="{{$vote->end_at}}"
                                                       placeholder="تاريخ النهاية">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
{{--                                            <div class="form-group">--}}
{{--                                                <label for="image">صورة الشركة</label>--}}
{{--                                                <input id="image" name="image" type="file" class="form-control-file">--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row" style="float: left;">
                                        <div class="col-md-12">
                                            <a href="{{route('votes.index')}}" type="reset" class="btn default">الغاء</a>
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
