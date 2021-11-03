@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Invoices</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Accounts</li>
                        <li class="breadcrumb-item active">Invoices</li>
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
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Clients</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#LA-0218</td>
                                        <td>vPro Infoweb LLC.</td>
                                        <td>07 March, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$4,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0220</td>
                                        <td>BT Technology</td>
                                        <td>25 Jun, 2018</td>
                                        <td><img src="../assets/images/mastercard.png" class="rounded width45" alt="mastercard"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$5,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0222</td>
                                        <td>Core Infoweb Pvt.</td>
                                        <td>12 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$2,000</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0312</td>
                                        <td>AUR Tech LLC.</td>
                                        <td>13 July, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$10,000</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0389</td>
                                        <td>WrapTheme Pvt.</td>
                                        <td>27 July, 2018</td>
                                        <td><img src="../assets/images/visa-card.png" class="rounded width45" alt="visa card"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$1,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0218</td>
                                        <td>vPro Infoweb LLC.</td>
                                        <td>07 March, 2018</td>
                                        <td><img src="../assets/images/paypal.png" class="rounded width45" alt="paypal"></td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>$4,205</td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0220</td>
                                        <td>BT Technology</td>
                                        <td>25 Jun, 2018</td>
                                        <td><img src="../assets/images/mastercard.png" class="rounded width45" alt="mastercard"></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>$5,205</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
