@extends('layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Employee List</li>
                    </ul>
                </div>            
                <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                    <div class="bh_chart hidden-xs">
                        <div class="float-left m-r-15">
                            <small>Visitors</small>
                            <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                        </div>
                        <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Visits</small>
                            <h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
                        </div>
                        <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Chats</small>
                            <h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
                        </div>
                        <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Employee List</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            <label class="fancy-checkbox">
                                                <input class="select-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Join Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>

                                       <td class="width45">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                            <img src="{{ $user->profile->avatar != null ? $user->profile->avatar : 'https://res.cloudinary.com/virtual-tour/image/upload/v1634539139/icons/default_avatar_k3wxez.png' }}" class="rounded-circle avatar" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$user->profile->name}}</h6>
                                            <span>{{$user->profile->email}}</span>
                                        </td>
                                        <td>{{$user->profile->contact}}</td>
                                        <td>
                                            @if ($user->type == 'masteradmin')
                                                <span class="badge badge-danger">Master Admin</span>
                                            @elseif ($user->type == 'speaker')
                                                <span class="badge badge-success">Speaker</span>
                                            @elseif ($user->type == 'partner')
                                                <span class="badge badge-warning">Partner</span>
                                            @elseif ($user->type == 'touradmin')
                                                <span class="badge badge-info">TourAdmin</span>
                                            @endif
                                        </td>
                                        <td>{{$user->profile->updated_at}}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
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
    <div class="modal animated fadeIn" id="add_client" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title" id="defaultModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/users/save-create" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">            
                                    <label for="tour_name" class="form-control-label">Full Name *</label>               
                                    <input type="text" name="name" class="form-control" placeholder="Name Managerment">
                                </div>
                            </div>    
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tour_name" class="form-control-label">Phone *</label>                                      
                                    <input type="tel" name="contact" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group"> 
                                    <label for="tour_name" class="form-control-label">Email *</label>                                     
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">    
                                    <label for="tour_name" class="form-control-label">Type Account *</label>                                   
                                    <select class="form-control" name="type">
                                        <option>Select Role Type</option>
                                        <option value="superadmin">Superadmin</option>
                                        <option value="masteradmin">Admin</option>
                                        <option value="HR" disabled>HR</option>
                                        <option value="employee" disabled>Employee</option>
                                        <option value="sale" disabled>Sale</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
