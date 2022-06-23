@extends('layouts.admin')

@section('title','Dashboard')
    
@section ('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-dark">Dashboard Admin</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    In Class FSM</div>
                                <div class="h5 mb-0 font-weight-bold text-dark">{{$icfsm}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    In Class Salesmen</div>
                                <div class="h5 mb-0 font-weight-bold text-dark">{{$ics}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    In Class Lain-Lain</div>
                                <div class="h5 mb-0 font-weight-bold text-dark">{{$icll}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    In Store Lain - Lain</div>
                                <div class="h5 mb-0 font-weight-bold text-dark">{{$isll}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">In Class Promotor</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="filter" class="col-sm-2 col-form-label text-dark">Filter</label>
                            <div class="col-sm-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-dark btn-filter-chart-inclass icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$bulanFull}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="01">Januari</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="02">Febuari</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="03">Maret</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="04">April</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="05">Mei</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="06">Juni</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="07">Juli</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="08">Agustus</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="09">September</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="10">Oktober</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="11">November</a>
                                        <a class="dropdown-item chart-filter-inclass" href="#" data-filter="12">Desember</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chart-pie">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">In Store Promotor</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="filter" class="col-sm-2 col-form-label text-dark">Filter</label>
                            <div class="col-sm-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-dark btn-filter-chart-instore icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$bulanFull}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton2">
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="01">Januari</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="02">Febuari</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="03">Maret</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="04">April</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="05">Mei</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="06">Juni</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="07">Juli</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="08">Agustus</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="09">September</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="10">Oktober</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="11">November</a>
                                        <a class="dropdown-item chart-filter-instore" href="#" data-filter="12">Desember</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="chart-pie">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
    <script src="{{asset('/admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myChartInclass = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Done", "On Going"],
                datasets: [{
                    data: [{!!json_encode($inclass1)!!}, {!!json_encode($inclass2)!!}],
                    backgroundColor: ['#1cc88a', '#e74a3b'],
                    hoverBackgroundColor: ['#1bdd96', '#FF4500'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            filter: function(legendItem, data) {
                                let labels = data.labels, datasets = data.datasets[0].data;
                                for(let i=0;i<labels.length;i++){
                                    if(labels[i].indexOf(legendItem.text)!=-1){
                                        let t = legendItem.text;
                                        legendItem.text = t+': '+datasets[i];
                                        break;
                                    }
                                }
                                return legendItem;
                            },
                        },
                    },
                },
            }
        });

        function changeDataInclass(chart, inclass1, inclass2){
            chart.data = {
                labels: ["Done", "On Going"],
                datasets: [{
                    data: [inclass1, inclass2],
                    backgroundColor: ['#1cc88a', '#e74a3b'],
                    hoverBackgroundColor: ['#1bdd96', '#FF4500'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }]
            },
            chart.options = {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            filter: function(legendItem, data) {
                                let labels = data.labels, datasets = data.datasets[0].data;
                                for(let i=0;i<labels.length;i++){
                                    if(labels[i].indexOf(legendItem.text)!=-1){
                                        let t = legendItem.text;
                                        legendItem.text = t+': '+datasets[i];
                                        break;
                                    }
                                }
                                return legendItem;
                            },
                        },
                    },
                },
            },
            chart.update();
        }

        $(document).on('click', '.chart-filter-inclass', function(e){
        e.preventDefault();
        var data_filter = $(this).attr('data-filter');
            if(data_filter == '01'){
                $('.btn-filter-chart-instore-inclass').html('Januari');
            }else if(data_filter == '02'){
                $('.btn-filter-chart-inclass').html('Februari');
            }else if(data_filter == '03'){
                $('.btn-filter-chart-inclass').html('Maret');
            }else if(data_filter == '04'){
                $('.btn-filter-chart-inclass').html('April');
            }else if(data_filter == '05'){
                $('.btn-filter-chart-inclass').html('Mei');
            }else if(data_filter == '06'){
                $('.btn-filter-chart-inclass').html('Juni');
            }else if(data_filter == '07'){
                $('.btn-filter-chart-inclass').html('Juli');
            }else if(data_filter == '08'){
                $('.btn-filter-chart-inclass').html('Agustus');
            }else if(data_filter == '09'){
                $('.btn-filter-chart-inclass').html('September');
            }else if(data_filter == '10'){
                $('.btn-filter-chart-inclass').html('Oktober');
            }else if(data_filter == '11'){
                $('.btn-filter-chart-inclass').html('November');
            }else if(data_filter == '12'){
                $('.btn-filter-chart-inclass').html('Desember');
            }

            $.ajax({
                url: "{{ url('/filterinclass') }}/" + data_filter,
                method: "GET",
                success:function(response){
                    changeDataInclass(myChartInclass, response.inclass1, response.inclass2);
                }
            });
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChartInstore = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Done", "On Going"],
                datasets: [{
                    data: [{!!json_encode($instore1)!!}, {!!json_encode($instore2)!!}],
                    backgroundColor: ['#1cc88a', '#e74a3b'],
                    hoverBackgroundColor: ['#1bdd96', '#FF4500'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            filter: function(legendItem, data) {
                                let labels = data.labels, datasets = data.datasets[0].data;
                                for(let i=0;i<labels.length;i++){
                                    if(labels[i].indexOf(legendItem.text)!=-1){
                                        let t = legendItem.text;
                                        legendItem.text = t+': '+datasets[i];
                                        break;
                                    }
                                }
                                return legendItem;
                            },
                        },
                    },
                },
            }
        });

        function changeData(chart, data_array1, data_array2){
            chart.data = {
                labels: ["Done", "On Going"],
                datasets: [{
                    data: [data_array1, data_array2],
                    backgroundColor: ['#1cc88a', '#e74a3b'],
                    hoverBackgroundColor: ['#1bdd96', '#FF4500'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }]
            },
            chart.options = {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            filter: function(legendItem, data) {
                                let labels = data.labels, datasets = data.datasets[0].data;
                                for(let i=0;i<labels.length;i++){
                                    if(labels[i].indexOf(legendItem.text)!=-1){
                                        let t = legendItem.text;
                                        legendItem.text = t+': '+datasets[i];
                                        break;
                                    }
                                }
                                return legendItem;
                            },
                        },
                    },
                },
            },
            chart.update();
        }

        $(document).on('click', '.chart-filter-instore', function(e){
        e.preventDefault();
        var data_filter = $(this).attr('data-filter');
            if(data_filter == '01'){
                $('.btn-filter-chart-instore').html('Januari');
            }else if(data_filter == '02'){
                $('.btn-filter-chart-instore').html('Februari');
            }else if(data_filter == '03'){
                $('.btn-filter-chart-instore').html('Maret');
            }else if(data_filter == '04'){
                $('.btn-filter-chart-instore').html('April');
            }else if(data_filter == '05'){
                $('.btn-filter-chart-instore').html('Mei');
            }else if(data_filter == '06'){
                $('.btn-filter-chart-instore').html('Juni');
            }else if(data_filter == '07'){
                $('.btn-filter-chart-instore').html('Juli');
            }else if(data_filter == '08'){
                $('.btn-filter-chart-instore').html('Agustus');
            }else if(data_filter == '09'){
                $('.btn-filter-chart-instore').html('September');
            }else if(data_filter == '10'){
                $('.btn-filter-chart-instore').html('Oktober');
            }else if(data_filter == '11'){
                $('.btn-filter-chart-instore').html('November');
            }else if(data_filter == '12'){
                $('.btn-filter-chart-instore').html('Desember');
            }

            $.ajax({
                url: "{{ url('/filterinstore') }}/" + data_filter,
                method: "GET",
                success:function(response){
                    changeData(myChartInstore, response.instore1, response.instore2);
                    // alert(response.dataongoing);
                }
            });
        });
    </script>
@endsection

