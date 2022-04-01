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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                                <li class="breadcrumb-item active">Thêm mới bài viết</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Thêm mới bài viết</h4>
                    </div>
                </div>
            </div>
            <form action="{{route('management.post.article.save-create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên bài viết :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="title_article" placeholder="Tên bài viết">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Slug :</label>
                    <div class="col-sm-10">
                        <div class="input-group--sa-slug input-group"><span class="input-group-text" id="form-category/slug-addon">https://360fairs.com/article/</span>
                            <input id="input-slug" type="text" class="form-control" name="slug" >
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh  :</label>
                    <div class="col-sm-10 banner_article">
                        <input type="file" name="files[]" class="dropify" data-max-file-size="10M" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả ngắn về bài viêt:</label>
                    <div class="col-sm-10">
                        <textarea name="short_content" class="form-control" rows="5" placeholder="Mô tả ngắn về bài viết"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung bài viết :</label>
                    <div class="col-sm-10">
                        <textarea name="content" class="form-control" cols="30" rows="3" placeholder="Nội dung"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Tác giả :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="	author" placeholder="Tác giả" name="	author">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="input-hidden" name="isPublic" checked>
                            <label class="custom-control-label" for="input-hidden">Hiển thị bài viết ngay</label>
                        </div>
                    </div>
                </div>
   
                <div class="form-group row mt-3 float-right mr-1">
                    <button id="btn-clear" type="reset" class="btn btn-secondary waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="fas fa-window-close"></i> </span>Đóng
                    </button>
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="mdi mdi-content-save"></i> </span>Lưu bài viêt
                    </button>
                </div>
            </form>  
        </div>
    </div>
@stop
@section('script')
    <script>
        CKEDITOR.replace('content');
    </script>
    <script>
        $('#title_article').on('input', function () {  
            let name = $(this).val();
            let slug = Utils.convertToSlug(name);
            $('#input-slug').val(slug);
        });
        
        $('#btn-clear').click(function () {  
            let name = $(this).val();
            let slug = Utils.convertToSlug(name);
            $('#input-slug').val(slug);
        });

    </script>
@stop

