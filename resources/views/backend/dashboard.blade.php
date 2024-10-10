@extends('backend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="py-2">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">{{  __('Dashboard') }}</h1>
            </div>
        
        </div>
    </div>
    
    <div class="row dashboard">
        @foreach($data as $item)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 px-0">
                <div class="card p-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text">{{ $item['value'] }}</p>
                    </div>
                    <i class="{{ $item['icon'] }} fa-3x big-icon"></i>
                </div>
            </div>
        @endforeach
       
    </div>
    
    <div class="row">
        <h4 class="h5 text-muted mt-2"> {{ __('Recent Subscribers') }}</h4>
        <div class="chart__container mt-4">
            <canvas id="chart" width="600" height="150"></canvas>
        </div>
    </div>
    

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            'use strict';
            
            // ********************  Dashboard statistics Card random color ******************
            const colors = ['#0a6f4d', 'rgba(233,116,26,0.87)', '#e74c3c', '#4287f5'];
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                const colorIndex = index % colors.length;
                card.style.backgroundColor = colors[colorIndex];
            });
            
            
            // ************************ Chart For Recent Subscribers ****************************
            let subscriptionStatistics = @json($statistics);
            let subscriptionStatisticsArrayKeys = Object.keys(subscriptionStatistics);
            let subscriptionStatisticsArrayValue = Object.values(subscriptionStatistics);
            
            let ctx = $("#chart")[0].getContext('2d');
            
            let gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
            gradientStroke.addColorStop(0, "#3c72fc");
            gradientStroke.addColorStop(1, "rgba(60,114,252,0.89)");
            
            let gradient = ctx.createLinearGradient(0, 100, 0, 400);
            gradient.addColorStop(0, "rgba(60,114,252,0.58)");
            gradient.addColorStop(1, "rgba(60,114,252,0.28)");
            
            let draw = Chart.controllers.line.prototype.draw;
            Chart.controllers.line = Chart.controllers.line.extend({
                draw: function() {
                    draw.apply(this, arguments);
                    let ctx = this.chart.chart.ctx;
                    let _stroke = ctx.stroke;
                    ctx.stroke = function() {
                        ctx.save();
                         //ctx.shadowColor = 'rgba(60,114,252,0.75)';
                        ctx.shadowBlur = 6;
                        ctx.shadowOffsetX = 0;
                        ctx.shadowOffsetY = 2;
                        _stroke.apply(this, arguments)
                        ctx.restore();
                    }
                }
            });
            
            
             new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',
                
                // The data for our dataset
                data: {
                    labels: subscriptionStatisticsArrayKeys,
                    datasets: [{
                        label: "Subscribers",
                        backgroundColor: gradient,
                        borderColor: gradientStroke,
                        data: subscriptionStatisticsArrayValue,
                        pointBorderColor: "rgba(255,255,255,0)",
                        pointBackgroundColor: "rgba(255,255,255,0)",
                        pointBorderWidth: 8,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: gradientStroke,
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 4,
                        pointRadius: 1,
                        borderWidth: 5,
                        pointHitRadius: 16,
                    }]
                },
                
                // Configuration options go here
                options: {
                    tooltips: {
                        backgroundColor:'#fff',
                        displayColors:false,
                        titleFontColor: '#000',
                        bodyFontColor: '#000'
                        
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display:false
                            }
                        }],
                    }
                }
            });
        });
    </script>
@endsection