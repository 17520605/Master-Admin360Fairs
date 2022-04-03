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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Liên hệ</a></li>
                                <li class="breadcrumb-item active">Quản lý liên hệ</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản lý liên hệ</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Nội dung</th>
                                    <th style="width: 6%;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(@isset($contacts) > 0)
                                    @foreach ($contacts as $contact)
                                    <tr data-contact-id='{{$contact->id}}'>
                                        <td>{{$contact->id}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>
                                            <button onclick="toggleVisiable(this)" class="btn btn-xs btnStatusHandle {{ $contact->status != 1 ? 'btn-success' : 'btn-secondary' }}" > {{ $contact->status != 1 ? 'Chưa xữ lý' : 'Đã xữ lý' }}</button>
                                        </td>
                                        <th>{{$contact->content}}</th>
                                        <td>
                                            <button class="btn waves-effect waves-light btn-success"
                                                onclick="openPopupView('{{ $contact->id }}')"><i class="mdi mdi-eye"></i></button>
                                            <button class="btn waves-effect waves-light btn-danger"
                                                onclick="openPopupDelete('{{ $contact->id }}')"><i class="mdi mdi-trash-can"> </i></button>
                                        </td>
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
        <div class="modal fade" id="viewContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleDeleteProduct">Thông tin thắc mắc</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" style="font-size: 16px">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Tình trạng :</th>
                                    <td id="popup_contact_status"></td>
                                </tr>
                              <tr>
                                <th scope="row">Họ tên :</th>
                                <td id="popup_contact_name"></td>
                              </tr>
                              <tr>
                                <th scope="row">Số điện thoại :</th>
                                <td id="popup_contact_phone"></td>
                              </tr>
                              <tr>
                                <th scope="row">Địa chỉ Email :</th>
                                <td id="popup_contact_email"></td>
                              </tr>
                              <tr>
                                <th scope="row">Nội dung :</th>
                                <td id="popup_contact_content"></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleDeleteProduct">Xóa thắc mắc</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa thắc mắc này không ?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="confirmDeleteBtn" type="button" class="btn btn-danger" onclick='confirmDelete(this)'>Xóa</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        function openPopupDelete(id) {
            $('#confirmDeleteBtn').attr('data-id', id);
            $('#deleteContact').modal('show');
        }
        function openPopupView(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "get",
                url: "{{ env('APP_URL') }}/contact/" + id,
            }).done(function(result){
                console.log(result);
                if(result)
                {
                    $('#popup_contact_name').text(result.name);
                    $('#popup_contact_phone').html('<a href="tel:'+result.phone+'">'+result.phone+'</a>');
                    $('#popup_contact_email').html('<a href="mailto:'+result.email+'">'+result.email+'</a>');
                    $('#popup_contact_content').text(result.content);
                    $('#popup_contact_status').html('<button onclick="toggleVisiablePop('+result.id+')" class="btn btnStatusHandle btn-xs {{ $contact->status != 1 ? "btn-success" : "btn-secondary" }}" > {{ $contact->status != 1 ? "Chưa xữ lý" : "Đã xữ lý" }}</button>');
                    $('#viewContact').modal('show');
                }
            });
        }
        
        function confirmDelete(target) {
            let id = $(target).attr('data-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "delete",
                url: "{{ env('APP_URL') }}/contact/" + id,
                data: "data",
                dataType: "json",
                success: function(res) {
                    if (res.success === true) {
                        $('#deleteContact').modal('hide');
                        var table = $('#datatable').DataTable();
                        var row = $('#datatable').find('tr[data-contact-id="' + id + '"]');
                        table.row(row).remove().draw();
                        tata.success('Thành công', 'Đã xóa Thắc mắc', {
                            animate: 'slide',
                            closeBtn: true,
                        })
                    } else {
                        tata.error('Lỗi', res.errors, {
                            animate: 'slide',
                            closeBtn: true,
                        })
                    }
                },
                error: function() {
                    tata.error('Lỗi', "Xóa thất bại", {
                        animate: 'slide',
                        closeBtn: true,
                    });
                }
            });
        }

        function toggleVisiable(target) {
            let id = $(target).parents('tr').attr('data-contact-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ env('APP_URL') }}/contact/" + id + "/toggle-visiable",
                dataType: "json",
                success: function(res) {
                    if (res.success === true) {
                        if (res.status) {
                            $('.btnStatusHandle').removeClass('btn-success');
                            $('.btnStatusHandle').addClass('btn-secondary');
                            $('.btnStatusHandle').text('Đã xử lý');
                        }

                        tata.success('Thành công', 'Đã thay đổi thành công', {
                            animate: 'slide',
                            closeBtn: true,
                        })
                    } else {
                        tata.error('Lỗi', res.errors, {
                            animate: 'slide',
                            closeBtn: true,
                        })
                    }
                },
                error: function() {
                    tata.error('Lỗi', "Cập nhật thất bại", {
                        animate: 'slide',
                        closeBtn: true,
                    });
                }
            });
        }

        function toggleVisiablePop(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ env('APP_URL') }}/contact/" + id + "/toggle-visiable",
                dataType: "json",
                success: function(res) {
                    if (res.success === true) {
                        if (res.status) {
                            $('.btnStatusHandle').removeClass('btn-success');
                            $('.btnStatusHandle').addClass('btn-secondary');
                            $('.btnStatusHandle').text('Đã xử lý');
                        }

                        tata.success('Thành công', 'Đã thay đổi thành công', {
                            animate: 'slide',
                            closeBtn: true,
                        })
                    } else {
                        tata.error('Lỗi', res.errors, {
                            animate: 'slide',
                            closeBtn: true,
                        })
                    }
                },
                error: function() {
                    tata.error('Lỗi', "Cập nhật thất bại", {
                        animate: 'slide',
                        closeBtn: true,
                    });
                }
            });
        }
    </script>
@stop