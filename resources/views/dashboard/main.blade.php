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
                                    <input type="text" name="search" value="{{request()->search}}" class="form-control"
                                           placeholder="بحث ...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"> بحث <i
                                            class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <a href="{{route("votes.create")}}" class="btn green-jungle" type="button"> اضافة تصويت <i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box yellow-soft">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة التصويت
                                    </div>
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
                                                <th>اسم الشركة</th>
                                                <th>تاريخ البدء</th>
                                                <th> تاريخ الانتهاء</th>
                                                <th>متاح</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($votes as $vote)
                                                <tr>
                                                    <td> {{$vote->name}}</td>
                                                    <td>{{$vote->start_at}}</td>
                                                    <td>{{$vote->end_at}}</td>

                                                    <td>
                                                        <div class="">
                                                            <span
                                                                class="bootstrap-switch-handle-on bootstrap-switch-primary"
                                                                style="width: 34px;"></span>
                                                            <span class="bootstrap-switch-label" style="width: 34px;">&nbsp;</span>
                                                            <span
                                                                class="bootstrap-switch-handle-off bootstrap-switch-default"
                                                                style="width: 34px;"></span>
                                                            <input type="checkbox" checked="{{$vote->is_active}}"
                                                                   class="make-switch" id="test" data-size="mini">
                                                        </div>
                                                    </td>

                                                    <td>

                                                        <!-- Button trigger modal -->
                                                        {{--                                                        <a href="{{route("votes.create")}}" type="button" style="margin: 0.3rem;" class="btn btn-sm btn-warning" data-toggle="modal"> تعديل <i class="fa fa-pencil"></i></a>--}}

                                                        {{--                                                            <button type="button" class="btn btn-sm btn-danger " style="margin: 0.3rem;"> حذف <i class="fa fa-trash"></i></button>--}}

                                                        {{--                                                  <form method='post' action="{{route('votes.destroy',$vote->id)}}">--}}
                                                        {{--                                                            @csrf--}}
                                                        {{--                                                            @method('delete')--}}
                                                        <a href='{{route("votes.edit",$vote->id)}}'
                                                           class='btn btn-primary'>تعديل<i class="fa fa-pencil"></i></a>

                                                        <form style="display: inline"
                                                              action="{{route('vote.delete' , $vote->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <button data-effect="effect-scale" data-id="{{$vote->id}}"
                                                                    data-toggle="modal"
                                                                    href="#modaldemo9" title="حذف" type="button"
                                                                    class="btn btn-danger btn-xs delete">
                              <span class=" glyphicon glyphicon-trash" aria-hidden="true">
                              </span>
                                                                حذف
                                                            </button>
                                                        </form>
                                                        {{--                                                        <a class="btn red btn-outline sbold" data-toggle="modal" data-id="{{$vote->id}}" href="#basic"> View Demo </a>--}}

                                                        {{--                                                            <input onclick='return confirm("هل أنت متأكد?")' type='submit' class='btn btn-danger' value='حذف'>--}}
                                                        {{--                                                            <button type="button"   id="getDeleteId" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#DeletePostModal"><i class="feather icon-trash"></i></button>--}}
                                                        {{--                                                        <button type="button"   data-id="{{$vote->id}}" data-toggle="modal" data-target="#DeletePostModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>--}}




                                                        {{--                                                   <a href="{{'#'}}" class="delete-mdoal" data-value="{{$vote->id}}" data-toggle="modal" data-target="#myModal">Delete</a>--}}


                                                        <a href="{{route("options.index",['id'=>$vote->id])}}"
                                                           type="button" class="btn btn-sm btn-warning"> عرض
                                                            الخيارات </a>

                                                        {{--                                                        </form>--}}
                                                        <div class="modal" id="modaldemo9">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">حذف المستخدم</h6>
                                                                        <button aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <form action="/vote/delete/{id}" method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <div class="modal-body">
                                                                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                                            <input type="hidden" name="id" id="id" value="{{$vote->id}}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                            <button type="submit" class="btn btn-danger">تاكيد</button>
                                                                        </div>

                                                                </form>
                                                            </div>
                                                        </div>




                                                        @endforeach
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
    <!-- Delete Modal -->
    <!-- Modal -->
    <!-- Modal -->

    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <div class="modal-body"> Modal body goes here</div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green" id="">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- Delete Category Modal -->
    <div class="modal" id="DeletePostModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">حذف السؤال </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>هل انت متأكد ؟</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="SubmitDeletePostForm">نعم</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
    {{--                    <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>--}}
    {{--                </div>--}}
    {{--                <form method="post">--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
    {{--                        <button type="submit" class="btn btn-primary" name="delete_dividend" value="foo">Delete</button>--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <script>
        $('#modaldemo9').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);


        })
    </script>
@endsection


@section('app-js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src=//code.jquery.com/jquery-3.5.1.slim.min.js
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin=anonymous></script>




    {{--    var deleteID;--}}
    {{--            $('body').on('click', '#getDeleteId', function () {--}}
    {{--                deleteID = $(this).data('id');--}}
    {{--            });--}}
    {{--            $('#SubmitDeletePostForm').click(function (e) {--}}
    {{--                e.preventDefault();--}}
    {{--                var id = deleteID;--}}
    {{--                $.ajaxSetup({--}}
    {{--                    headers: {--}}
    {{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--                    }--}}
    {{--                });--}}
    {{--                $.ajax({--}}
    {{--                    url: "/vote/"+id+"/delete",--}}
    {{--                    method: 'DELETE',--}}
    {{--                    success: function (result) {--}}
    {{--                        console.log(result);--}}
    {{--                        if (!result.errors) {--}}
    {{--                            $('.alert-danger').hide();--}}
    {{--                            $('.alert-success').show();--}}
    {{--                            // $('.datatable').DataTable().ajax.reload();--}}
    {{--                            setTimeout(function () {--}}
    {{--                                $('.alert-success').hide();--}}
    {{--                                $('#exampleModal').hide();--}}
    {{--                                swal("Success !", result.success, "success");--}}
    {{--                                $('.modal-backdrop').hide();--}}
    {{--                            }, 1000);--}}
    {{--                        } else {--}}
    {{--                            console.log('error');--}}
    {{--                        }--}}
    {{--                    },--}}
    {{--                    error:function(xhr,status,error){--}}
    {{--                        // $("#SubmitEditPostForm").html('Update');--}}
    {{--                        $('#loadingUpdate').css('display','none');--}}
    {{--                        // console.log(xhr.responseJSON,status,error);--}}

    {{--                        $('.alert-danger').html('');--}}
    {{--                        $.each(error, function(key, value) {--}}
    {{--                            $('.alert-danger').show();--}}
    {{--                            // $('.alert-danger').append('<strong><li>'+value+'</li></strong>');--}}
    {{--                            $('.alert-danger').append('<strong><li>'+xhr.responseJSON.responseText+'</li></strong>');--}}
    {{--                        });--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            });--}}
    {{--            --}}
    {{--            --}}
    {{--            --}}

    {{--         });--}}
    {{--    </script>--}}
@endsection
