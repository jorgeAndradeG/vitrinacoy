<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('adminlte::page')

@section ('title','Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-md-12 mt-2">
            <h3>Panel principal</h3>
        </div>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Estadísticas de tus redes sociales</h4>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart" style='max-width:100%'></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="card-stats">
                        <p>fecha</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4">
        <div class="card">
                <div class="card-header">
                    <h4>Estadísticas de tus redes sociales</h4>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart2" style='max-width:100%'></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="card-stats">
                        <p>fecha</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
const data_1 = {
    labels: [
        'Instagram',
        'Facebook',
        'TikTok',
        'Whatsapp',
        'Sitio Web'
    ],
    datasets: [{
        label: '',
        data: [300, 50, 100, 20, 40],
        backgroundColor: [
            'rgb(255, 87, 154)',
            'rgb(69, 89, 220)',
            'rgb(255, 205, 86)',
            'rgb(21, 176, 31)',
            'rgb(102, 229, 212)'
        ],
        hoverOffset: 8
    }]
};
const config_1 = {
    type: 'doughnut',
    data: data_1,
};

var ctx = document.getElementById('myChart').getContext('2d');
new Chart(ctx, config_1);
</script>


@stop
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js" integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>