@extends('dashboard.app')
@section('content')
    <div class="row" style="margin-bottom: 2rem;">
        <div class="col-md-12">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="">الرئيسية</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>الخيارات </span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">ادارة الخيارات </span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="" class="reload" data-original-title="" title=""> </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>

                <div class="portlet-body" style="display: block;">


                    <div class="row" style="margin-bottom: 1.5rem;">
                        <div class="col-md-6">
{{--                            <form action="" method="GET">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="بحث ...">--}}
{{--                                    <span class="input-group-btn">--}}
{{--                                    <button class="btn btn-primary" type="submit"> بحث <i class="fa fa-search"></i></button>--}}
{{--                                </span>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>

                        <div class="col-md-6">
                            <a href="{{route("options.create")}}" class="btn green-jungle" type="button"> اضافة عنصر <i class="fa fa-plus"></i></a>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue-chambray">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة الخيارات </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> النص</th>
                                                <th>الصورة</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($options as $option)
                                                <tr>
                                                    <td>{{$option->text}}</td>
{{--                                                    <td>{{$option->image}}</td>--}}
                                                    <td><img class="img-thumbnail" style="width: 150px;" src="{{$option->image}}" alt="صورة المدرس"></td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                            <a href='{{route("options.edit",$option->id)}}' type="button" style="margin: 0.3rem;" class="btn btn-sm btn-warning" data-toggle="modal"> تعديل <i class="fa fa-pencil"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#delete{{$option->id}}"> حذف <i class="fa fa-trash"></i></button>
                                                        <!-- Modal -->

                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END GRID PORTLET-->
        </div>
    </div>


@endsection
