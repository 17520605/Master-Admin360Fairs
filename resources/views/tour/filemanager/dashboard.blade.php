@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">File Manager</li>
                        <li class="breadcrumb-item active">File Manager</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                        <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                            data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                        <span>Visitors</span>
                    </div>
                    <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                        <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                            data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                        <span>Visits</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="javascript:void(0);" class="folder">
                        <h6><i class="fa fa-folder m-r-10"></i> Lucid Project</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="javascript:void(0);" class="folder">
                        <h6><i class="fa fa-folder m-r-10"></i> Themeforest</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="javascript:void(0);" class="folder">
                        <h6><i class="fa fa-folder m-r-10"></i> New Website</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="javascript:void(0);" class="folder">
                        <h6><i class="fa fa-folder m-r-10"></i> My Folder</h6>
                    </a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-5 col-sm-12">
                <div class="card">
                    <div class="body">
                        <h4>1TB <i class="fa fa-server float-right"></i></h4>
                        <p class="mb-0">Storage <small class="text-muted float-right">of 1Tb</small></p>                            
                        <div id="progress-striped progress-xs" class="progress progress-striped mb-0">
                            <div class="progress-bar progress-bar-warning" data-transitiongoal="43" aria-valuenow="43" style="width: 43%;">43%</div>
                        </div>
                    </div>
                </div>
                <div class="card modal-open m-b-5">
                    <div class="body">
                        <h6>2GB</h6>
                        <p class="mb-0">Documents <small class="text-muted float-right">of 1Tb</small></p>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-blue mb-0">
                        <div class="progress-bar" data-transitiongoal="18"></div>
                    </div>
                </div>
                <div class="card modal-open m-b-5">
                    <div class="body">
                        <h6>10GB</h6>
                        <p class="mb-0">Media <small class="text-muted float-right">of 1Tb</small></p>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-purple mb-0">
                        <div class="progress-bar" data-transitiongoal="34"></div>
                    </div>
                </div>
                <div class="card modal-open">
                    <div class="body">
                        <h6>20GB</h6>
                        <p class="mb-0">Images <small class="text-muted float-right">of 1Tb</small></p>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-green mb-0">
                        <div class="progress-bar" data-transitiongoal="67"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>File Reports</h2>                            
                    </div>
                    <div class="body">                        
                        <div id="area_chart"></div>                        
                    </div>                    
                </div>
            </div>                
        </div>
    </div>
    <script>
        $(function() {
            "use strict";
            MorrisArea();
        });

        function MorrisArea() {
            Morris.Area({
                element: 'area_chart',
                data: [{
                        period: '2011',
                        Documents: 0,
                        Media: 0,
                        Images: 7
                    }, {
                        period: '2012',
                        Documents: 22,
                        Media: 12,
                        Images: 5
                    }, {
                        period: '2013',
                        Documents: 10,
                        Media: 1,
                        Images: 23
                    }, {
                        period: '2014',
                        Documents: 27,
                        Media: 12,
                        Images: 2
                    }, {
                        period: '2015',
                        Documents: 17,
                        Media: 9,
                        Images: 26
                    }, {
                        period: '2016',
                        Documents: 39,
                        Media: 51,
                        Images: 9
                    }, {
                        period: '2017',
                        Documents: 20,
                        Media: 9,
                        Images: 21
                    }

                ],
                lineColors: ['#0E9BE2', '#AB7DF6', '#7CAC25'],
                xkey: 'period',
                ykeys: ['Documents', 'Media', 'Images'],
                labels: ['Documents', 'Media', 'Images'],
                pointSize: 2,
                lineWidth: 1,
                resize: true,
                fillOpacity: 0.2,
                behaveLikeLine: true,
                gridLineColor: '#d6d6d6',
                hideHover: 'auto'
            });
        }

        // progress bars
        $('.progress .progress-bar').progressbar({
            display_text: 'none'
        });
    </script>
@endsection
