@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon"><i class="fa fa-user"></i> </div>
                        <div class="content">
                            <div class="text">New Employee</div>
                            <h5 class="number">22</h5>
                        </div>
                        <hr>
                        <div class="icon"><i class="fa fa-users"></i> </div>
                        <div class="content">
                            <div class="text">Total Employee</div>
                            <h5 class="number">425</h5>
                        </div>
                    </div>
                </div>
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon"><i class="fa fa-university"></i> </div>
                        <div class="content">
                            <div class="text">Total Salary</div>
                            <h5 class="number">$2.8M</h5>
                        </div>
                        <hr>
                        <div class="icon"><i class="fa fa-university"></i> </div>
                        <div class="content">
                            <div class="text">Avg. Salary</div>
                            <h5 class="number">$1,250</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <h5>Income Analysis</h5>
                        <span>8% High then last month</span>
                        <div class="sparkline-pie m-t-20">6,4,8</div>
                        <div class="stats-report m-b-30">
                            <div class="stat-item">
                                <h5>Design</h5>
                                <b class="col-black">84.60%</b></div>
                            <div class="stat-item">
                                <h5>Dev</h5>
                                <b class="col-black">15.40%</b></div>
                            <div class="stat-item">
                                <h5>SEO</h5>
                                <b class="col-black">5.10%</b></div>
                        </div>
                        <span id="sparkline-compositeline">8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Salary Statistics</h2>
                        <ul class="header-dropdown">
                            <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Weekly">W</a></li>
                            <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Monthly">M</a></li>
                            <li><a class="tab_btn active" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Yearly">Y</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="Salary_Statistics" class="chartist"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Total Salary by Unit</h2>
                        <ul class="header-dropdown">
                            <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Weekly">W</a></li>
                            <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Monthly">M</a></li>
                            <li><a class="tab_btn active" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Yearly">Y</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="total_Salary" class="ct-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>Employee Structure</h2>
                    </div>
                    <div class="body text-center">
                        <h6>Male</h6>
                        <input type="text" class="knob2" data-linecap="round" value="73" data-width="125" data-height="125" data-thickness="0.15" data-fgColor="#49a9e5" readonly>
                        <hr>
                        <h6>Female</h6>
                        <input type="text" class="knob2" data-linecap="round" value="27" data-width="125" data-height="125" data-thickness="0.15" data-fgColor="#b880e1" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
