@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tài khoản</a></li>
                                <li class="breadcrumb-item active">Danh sách</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cấu hình dung lượng tải lên storage</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h3 class="mb-3">Cấu hình dung lượng tải lên storage</h3>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tbody>
                                <tr>
                                    <th class="w-20">Loại </th>
                                    <th>Tùy chỉnh (dung lượng nhỏ nhất (10MB) - lớn nhất (100MB)</th>
                                    <th>Tổng</th>
                                </tr>
                                @if(@isset($config) > 0)
                                    @foreach ($config as $conf)
                                        <tr data-config-id='{{$conf->id}}' data-config-value='{{$conf->value}}'>
                                            <th class="w-20">{{$conf->type}}</th>
                                            <td><input onchange="changeValue(this)" type="range" id="range{{$conf->type}}" value="{{$conf->value}}" data-old-value="{{$conf->value}}" min="1" max="100"></td>
                                            <td class="w-5"><span id="text{{$conf->type}}" class="capacity">{{$conf->value}}</span> MB</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="12">Không có dữ liệu</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
<script>

    $("#rangeVideo").change(function(){
        let value = $("#rangeVideo").val();
        $("#textVideo").html(value);
    });
    $("#rangeImage").change(function(){
        let value = $("#rangeImage").val();
        $("#textImage").html(value)
    });
    $("#rangeAudio").change(function(){
        let value = $("#rangeAudio").val();
        $("#textAudio").html(value)
    });
    $("#rangeModel").change(function(){
        let value = $("#rangeModel").val();
        $("#textModel").html(value)
    });

    function changeValue(target){
        let id = $(target).parents('tr').attr('data-config-id');
        let value = $(target).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "{{env('APP_URL')}}/setting-upload/" + id + "/data-upload/"+ value,
            dataType: "json",
            success: function (res) {
                if(res.success === true){
                    tata.success('Thành công', 'Đã thay đổi thành công', {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
                else{
                    tata.error('Lỗi', res.errors, {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
            },
            error: function(){
                tata.error('Lỗi', "Cập nhật thất bại", {
                    animate: 'slide',
                    closeBtn: true,
                });
            }
        });
    }

</script>
@stop

