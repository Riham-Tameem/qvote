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
                        <span class="caption-subject bold font-grey-gallery uppercase">معلومات الشركة</span>
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
                            <form class="form" action="{{route('votes.store')}}" method="post" id="registrationForm"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">

                                    <div class="col-12 col-md-10">

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="name">اسم الشركة  </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="company" name="company" type="text"  class="form-control input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="name">السؤال </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="name" name="name" type="text"  class="form-control input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="name">تاريخ البداية </label>
                                                </div>
                                                <div class="col-md-8">

                                                    <input type="datetime-local" name="start_at"
                                                           class="form-control"
                                                           placeholder="تاريخ البداية">

                                                    {{--                                                <input id="start_at" name="start_at" type="date" class="form-control input">--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="name">تاريخ النهاية </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="datetime-local" name="end_at"
                                                           class="form-control"
                                                           placeholder="تاريخ النهاية">
                                                </div>
                                            </div>



                                <div class="form-group row">
                                    <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <td>

                                                <input type="text" name="options[0][text]" placeholder="ادخل الاسم  " class="form-control" />

                                            </td>
                                            <td>
                                                <input  name="options[0][image]" type="file" class="form-control-file">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="options[1][text]" placeholder="Enter subject" class="form-control" />
                                            </td>
                                            <td>
                                                <input  name="options[1][image]" type="file" class="form-control-file">
                                            </td>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td>
                                        </tr>
                                    </table>
                                </div>
                                </div>


                                    <div class="row">
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="image">صورة الشركة</label>--}}
{{--                                                <input id="image" name="image" type="file" class="form-control-file">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row" style="float: left;">
                                        <div class="col-md-12">
                                            <a href="{{route('votes.index')}}" type="reset" class="btn default">الغاء</a>
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
@section('page-js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 1;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="options[' + i +
            '][text]" placeholder="Enter subject" class="form-control" /></td>' +
            '<td>'+'<input name="options['+i+'][image]" type="file" class="form-control-file"></td>'+
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
