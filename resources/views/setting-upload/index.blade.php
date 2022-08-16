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
                    @if(@isset($config) > 0)
                    @foreach ($config as $conf)
                    <div class="card-box" data-config-id="{{$conf->id}}">
                        <h3 class="mb-3">{{$conf->type}} - <span>{{$conf->value}} MB</span> </h3>
                        <hr>
                        <input onchange="changeValue(this)" type="range" id="range{{$conf->type}}" value="{{$conf->value}}" data-old-value="{{$conf->value}}" min="1" max="100">
                    </div>
                    @endforeach
                    @endif
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
        let id = $(target).parents('div').attr('data-config-id');
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

