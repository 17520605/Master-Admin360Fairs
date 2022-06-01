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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cài đặt</a></li>
                                <li class="breadcrumb-item active">Quản lý cài đặt</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản lý cài đặt</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 card-box" style="min-height: 65vh">
                    <div class="mt-2" >
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="public-tab" data-toggle="tab" href="#public" role="tab" aria-controls="public" aria-expanded="true">Public</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images">Images</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video">Video</a>
                            </li>
                        </ul>
                        <div class="tab-content text-muted" id="myTabContent">
                            <div role="tabpanel" class="tab-pane fade in active show" id="public" aria-labelledby="public-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên cá nhân / tổ chức : <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="name" placeholder="Tên cá nhân hoặc tổ chức" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên cá nhân / tổ chức : <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="name" placeholder="Tên cá nhân hoặc tổ chức" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên cá nhân / tổ chức : <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="name" placeholder="Tên cá nhân hoặc tổ chức" required>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <input type="file" name="file1" class="dropify" data-max-file-size="10M" required>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <input type="file" name="file2" class="dropify" data-max-file-size="10M">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <input type="file" name="file3" class="dropify" data-max-file-size="10M">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <input type="file" name="file4" class="dropify" data-max-file-size="10M">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <input type="file" name="file3" class="dropify" data-max-file-size="10M">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <input type="file" name="file4" class="dropify" data-max-file-size="10M">
                                            </div>
                                        </div>
                                        <button class="btn btn-twitter waves-effect waves-light mb-3 btn-block">Edit Image Popular</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Link video : <span style="color: red">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mb-3" id="input-link-youtube-introduce-video" name="name" placeholder="Tên cá nhân hoặc tổ chức" required>
                                                <iframe src="https://www.youtube.com/embed/Q4qdV_dpzS8" frameborder="0" style="width: 100%; min-height: 600px;border-radius:5px "></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
<script>
    function youtube_parser(url){
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match&&match[7].length==11)? match[7] : false;
    }
    $('#input-link-youtube-introduce-video').change(function () { 
        let linkinput = $('#input-link-youtube-introduce-video').val();
        if(linkinput != null){
            let youtubeId = youtube_parser(linkinput);
            let linkYoutube = 'https://www.youtube.com/embed/'+youtubeId;
            if(youtubeId != null)
            {
                $('#preview-box-video-iframe').show();
                $('#preview-box-video-img').hide();
                $('#preview-box-video-iframe').attr('src',linkYoutube);
                $('#box-vd-up').find("#preview-box-video-vd").attr('src', file);
                let data = new FormData();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{env('APP_URL')}}/profile/save-vd",
                    type: 'POST',
                    data : {url: linkYoutube},
                    dataType: 'json',
                    success: function (res) { 
                        tata.success('Thành công', 'Đã thay đổi thành công', {
                            animate: 'slide',
                            closeBtn: true,
                        })
                    }
                });
            }
            else
            {
                $('#preview-box-video-iframe').hide();
                $('#preview-box-video-img').show();
            }
        }
        else{
            $('#preview-box-video-iframe').hide();
            $('#preview-box-video-img').show();
        }
    });
</script>
@stop