@extends('backend.layouts.app')
@section('title')
  Dashboard
@endsection

@section('content')





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="complaint-list.php" style="color: #0a0a0a">TOTAL COMPLAINTS</a></span>
                            <span class="info-box-number">410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="pendingComplaintsForChiefC.php" style="color:#0a0a0a; ">PENDING COMPLAINTS</a></span>
                            <span class="info-box-number">44</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="approvedSmritiPatra.php" style="color:#0a0a0a; ">APPROVED SMRITIPATRA</a></span>
                            <span class="info-box-number">90</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="pendingSmritiPatra.php" style="color:#0a0a0a; ">PENDING SMRITIPATRA</a></span>
                            <span class="info-box-number">41</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="approvedScreening.php" style="color:#0a0a0a; ">APPROVED SCREENING</a></span>
                            <span class="info-box-number">35</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="pendingScreening.php" style="color:#0a0a0a; ">PENDING SCREENING</a></span>
                            <span class="info-box-number">20</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="Case-list.php">Total Case</a></span>
                            <span class="info-box-number">90<small></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="tamili.php" style="color:#0a0a0a; ">Tamili</a></span>
                            <span class="info-box-number">20</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="clearfix visible-sm-block"></div>

            </div>
            </div>

        </section>
<div class="col-md-4">
    <div class="chart-container">
        <div class="pie-chart-container">
            <canvas id="pie-chart"></canvas>
        </div>
    </div>

</div>


{{--        <div class="col-md-12">--}}
{{--            <h1 class="text-center">Monthly News Chart</h1>--}}
{{--            <div class="col-md-8 col-md-offset-2">--}}
{{--                <div class="col-xl-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="chart-container">--}}
{{--                                <div class="chart has-fixed-height" id="bars_basic"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
@endsection

@section('js')
    <script>
        $(function(){
            //get the pie chart canvas
            var cData = JSON.parse(`<?php echo $data['chart_data'];?>`);
            // console.log(cData)
            var ctx = $("#pie-chart");
            //pie chart data
            var data = {
                labels: cData.date,

                datasets: [
                    {
                        label: "Users Count",
                        data: cData.data,
                        backgroundColor: [
                            "#DEB887",
                            "#A9A9A9",
                            "#DC143C",
                            "#F4A460",
                            "#2E8B57",
                            "#1D7A46",
                            "#CDA776",
                        ],
                        borderColor: [
                            "#CDA776",
                            "#989898",
                            "#CB252B",
                            "#E39371",
                            "#1D7A46",
                            "#F4A460",
                            "#CDA776",
                        ],
                        borderWidth: [1, 1, 1, 1, 1,1,1]
                    }
                ]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Yearly News Pie-Chart",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                }
            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: "pie",
                data: data,
                options: options
            });

        });
    </script>


{{--    <script type="text/javascript">--}}
{{--        var bars_basic_element = document.getElementById('bars_basic');--}}
{{--        if (bars_basic_element) {--}}
{{--            var bars_basic = echarts.init(bars_basic_element);--}}
{{--            bars_basic.setOption({--}}
{{--                color: ['#3398DB'],--}}
{{--                tooltip: {--}}
{{--                    trigger: 'axis',--}}
{{--                    axisPointer: {--}}
{{--                        type: 'shadow'--}}
{{--                    }--}}
{{--                },--}}
{{--                grid: {--}}
{{--                    left: '3%',--}}
{{--                    right: '4%',--}}
{{--                    bottom: '3%',--}}
{{--                    containLabel: true--}}
{{--                },--}}
{{--                xAxis: [--}}
{{--                    {--}}
{{--                        type: 'category',--}}
{{--                        data: ['Fruit'],--}}
{{--                        axisTick: {--}}
{{--                            alignWithLabel: true--}}
{{--                        }--}}
{{--                    }--}}
{{--                ],--}}
{{--                yAxis: [--}}
{{--                    {--}}
{{--                        type: 'value'--}}
{{--                    }--}}
{{--                ],--}}
{{--                series: [--}}
{{--                    {--}}
{{--                        name: 'Total Products',--}}
{{--                        type: 'bar',--}}
{{--                        barWidth: '20%',--}}
{{--                        data: [--}}
{{--                            100--}}

{{--                        ]--}}
{{--                    }--}}
{{--                ]--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}

@endsection
