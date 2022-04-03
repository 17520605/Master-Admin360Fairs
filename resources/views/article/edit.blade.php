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
                                <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Chỉnh sửa bài viết</h4>
                    </div>
                </div>
            </div>
            <form action="{{route('master.post.article.save-edit',$article->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tên bài viết :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title_article" placeholder="Tên bài viết" value="{{$article->title}}" name="title">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Slug :</label>
                  <div class="col-sm-10">
                      <div class="input-group--sa-slug input-group"><span class="input-group-text" id="form-category/slug-addon">https://hoangthinhsg.com/category/</span>
                          <input id="input-slug" type="text" class="form-control" name="slug" value="{{$article->slug}}">
                      </div>
                  </div>
              </div>
              <div class="form-group row banner_article">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh  :</label>
                  <div class="col-sm-10 dropify-file-wrapper">
                        <input type="hidden" class="changed" name="changedFiles" value="0">
                        <input type="file" name="file" class="dropify" data-default-file="{{$article->banner}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả bài viêt:</label>
                  <div class="col-sm-10">
                      <textarea name="short_description" class="form-control" rows="5" placeholder="Mô tả ngắn về bài viết">{{$article->shortDescription}}</textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung bài viết :</label>
                  <div class="col-sm-10">
                      <textarea name="content" class="form-control" cols="30" rows="3" placeholder="Nội dung">{{$article->content}}</textarea>
                  </div>
              </div>
    
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Tác giả :</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="author" placeholder="Tên Tác giả" value="{{$article->author}}" name="author">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="input-public" name="public" {{$article->isPublic != 0 ? 'checked':''}} >
                            <label class="custom-control-label" for="input-hidden">Hiển thị bài viết ngay</label>
                        </div>
                    </div>
                </div>
              <div class="form-group row mt-3 float-right mr-1">
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="mdi mdi-content-save"></i> </span>Lưu bài viêt
                    </button>
                    <button id="btn-clear" type="reset" class="btn btn-secondary waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="fas fa-window-close"></i> </span>Đóng
                    </button>
              </div>
              
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

      $('.dropify-clear').click(function() {
        let wrapper = $(this).parents('.dropify-file-wrapper');
        wrapper.find('.changed').val(1);

        let inputFile = wrapper.find('.dropify');
        if(inputFile.attr('name') == 'file'){
            inputFile.prop('required', true);
        }
    });

    $('.dropify').click(function() {
        let wrapper = $(this).parents('.dropify-file-wrapper');
        wrapper.find('.changed').val(1);
    });

    $('#btn-clear').click(function () {  
        let name = $(this).val();
        let slug = Utils.convertToSlug(name);
        $('#input-slug').val(slug);
    });
  </script>
  
@stop
