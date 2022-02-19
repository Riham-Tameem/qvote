@extends('dashboard.app')
@section('content')
    <div class="row" style="margin-bottom: 2rem;">
        <div class="col-md-12">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#">القائمة</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>قائمة التصويت </span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">ادارة التصويت</span>
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
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="بحث ...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"> بحث <i class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <a href="{{route("votes.create")}}" class="btn green-jungle" type="button"> اضافة تصويت <i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box yellow-soft">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة التصويت </div>
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
                                                <th>#</th>
                                                <th>اسم الشركة</th>
                                                <th>تاريخ البدء</th>
                                                <th> تاريخ الانتهاء</th>
                                                <th>متاح</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse ($votes as $vote)
                                                <tr>
                                                    <td>{{$vote->id}}</td>
                                                    <td> {{$vote->name}}</td>
                                                    <td>{{$vote->start_at}}</td>
                                                    <td>{{$vote->end_at}}</td>
                                                    <td>نعم</td>

                                                    <td>
                                                        <a href='{{route("votes.edit",$item->id)}}' class='btn btn-primary'>تعديل<i class="fa fa-pencil"></i></a>

                                                        <!-- Button trigger modal -->
                                                        {{--                                                        <a href="{{route("votes.create")}}" type="button" style="margin: 0.3rem;" class="btn btn-sm btn-warning" data-toggle="modal"> تعديل <i class="fa fa-pencil"></i></a>--}}

                                                        <button type="button" class="btn btn-sm btn-danger " style="margin: 0.3rem;"> حذف <i class="fa fa-trash"></i></button>

                                                        @empty
                                                            <div  id="error-message" class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-right: 23px ; width: 850px; padding-right: 12px;" >
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <h4 style="text-align: right;margin-bottom: 0px ; display: inline-block; margin-left: 1px; color: white">لا يوجد اصوات ...</h4>
                                                            </div>
                                                        @endforelse
                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin: 0.3rem;" data-target="#users"> عرض التفاصيل  <i class="fa fa-graduation-cap"></i></button>

                                                        <!--Users Modal -->
                                                        <div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="users Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="col-md-4">
                                                                            <a href="/create/item" class="btn green-jungle" type="button"> اضافة عنصر <i class="fa fa-plus"></i></a>
                                                                        </div>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="portlet box blue-dark">
                                                                                <div class="portlet-title">
                                                                                    <div class="caption">
                                                                                        <i class="fa fa-table"></i>قائمة المرشحين </div>
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
                                                                                                <th>#</th>
                                                                                                <th>اسم الطالب</th>
                                                                                                <th>الصورة </th>
                                                                                                <th>العمليات</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>

                                                                                            <tr>
                                                                                                <td>1</td>
                                                                                                <td>محمد</td>
                                                                                                <td></td>


                                                                                                <td>
                                                                                                    <form action="#" method="POST">
                                                                                                        @csrf

                                                                                                        <input hidden name="" value="">

                                                                                                        <button type="button" class="btn btn-sm btn-danger " style="margin: 0.3rem;"> حذف <i class="fa fa-trash"></i></button>
                                                                                                        <a href="/edit/item" type="button" style="margin: 0.3rem;" class="btn btn-sm btn-warning" data-toggle="modal"> تعديل <i class="fa fa-pencil"></i></a>


                                                                                                    </form>
                                                                                                </td>
                                                                                            </tr>

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                    </div>

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete Label">تأكيد الحذف</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    هل تريد المتابعة في عملية الحذف ؟
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="#" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                        <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    </tr>

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
