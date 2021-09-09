@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">Year  {{ date('Y') }} Transactions summary
            </div>
            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-dashboard"> Dashboard </i></div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <canvas id="airtime"></canvas>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <canvas id="sms"></canvas>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <canvas id="mpesa_c2b"></canvas>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <canvas id="mpesa_b2c"></canvas>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/Chart.bundle.js') }}"></script>



    <script>
        var sms_sum = {!! $sms_sum !!};
        var sms_count = {!! $sms_count !!};
        const smsBarChart = new Chart(document.getElementById('sms'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        backgroundColor: 'rgb(75, 192, 192)',
                        borderColor: 'rgb(75, 192, 192)',
                        highlightFill: 'rgba(220, 220, 220, 0.75)',
                        highlightStroke: 'rgba(220, 220, 220, 1)',
                        data: sms_sum,
                        label: 'Cost of sms',
                    },
                    {
                        backgroundColor: 'rgb(137, 191, 111)',
                        bordercolor: 'rgba(137, 191, 111)',
                        highlightFill: 'rgba(151, 187, 205, 0.75)',
                        highlightStroke: 'rgba(151, 187, 205, 1)',
                        data: sms_count,
                        label: 'Number of sms sent ',
                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Sms overview'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the Year ' + new Date().getFullYear()
                        }
                    }],
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        });


        var mpesa_c2b_sum = {!! $mpesa_c2b_sum !!};
        var mpesa_c2b_count = {!! $mpesa_c2b_count !!};
        const c2bBarChart = new Chart(document.getElementById('mpesa_c2b'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        backgroundColor: 'rgb(75, 192, 192)',
                        borderColor: 'rgb(75, 192, 192)',
                        highlightFill: 'rgba(220, 220, 220, 0.75)',
                        highlightStroke: 'rgba(220, 220, 220, 1)',
                        data: mpesa_c2b_sum,
                        label: 'Value MPESA C2B',
                    },
                    {
                        backgroundColor: 'rgb(137, 191, 111)',
                        bordercolor: 'rgba(137, 191, 111)',
                        highlightFill: 'rgba(151, 187, 205, 0.75)',
                        highlightStroke: 'rgba(151, 187, 205, 1)',
                        data: mpesa_c2b_count,
                        label: 'Number MPESA C2B transactions',
                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'M-PESA C2B overview'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the Year ' + new Date().getFullYear()
                        }
                    }],
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        })

        var airtime_sum = {!! $airtime_sum !!};
        var airtime_count = {!! $airtime_count !!};
        const barChart = new Chart(document.getElementById('airtime'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        backgroundColor: 'rgb(75, 192, 192)',
                        borderColor: 'rgb(75, 192, 192)',
                        highlightFill: 'rgba(220, 220, 220, 0.75)',
                        highlightStroke: 'rgba(220, 220, 220, 1)',
                        data: airtime_sum,
                        label: 'Cost of airtime',
                    },
                    {
                        backgroundColor: 'rgb(137, 191, 111)',
                        bordercolor: 'rgba(137, 191, 111)',
                        highlightFill: 'rgba(151, 187, 205, 0.75)',
                        highlightStroke: 'rgba(151, 187, 205, 1)',
                        data: airtime_count,
                        label: 'Number of airtime transactions',
                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Airtime overview'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the Year ' + new Date().getFullYear()
                        }
                    }],
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        });


        var mpesa_b2c_sum = {!! $mpesa_b2c_sum !!};
        var mpesa_b2c_count = {!! $mpesa_b2c_count !!};
        const b2cBarChart = new Chart(document.getElementById('mpesa_b2c'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        backgroundColor: 'rgb(75, 192, 192)',
                        borderColor: 'rgb(75, 192, 192)',
                        highlightFill: 'rgba(220, 220, 220, 0.75)',
                        highlightStroke: 'rgba(220, 220, 220, 1)',
                        data: mpesa_b2c_sum,
                        label: 'Value M-PESA B2C',
                    },
                    {
                        backgroundColor: 'rgb(137, 191, 111)',
                        bordercolor: 'rgba(137, 191, 111)',
                        highlightFill: 'rgba(151, 187, 205, 0.75)',
                        highlightStroke: 'rgba(151, 187, 205, 1)',
                        data: mpesa_b2c_count,
                        label: 'Number M-PESA B2C transactions',
                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'M-PESA B2C overview'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the Year ' + new Date().getFullYear()
                        }
                    }],
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        });

    </script>

@endsection
