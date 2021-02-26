@extends('home', ['activePage' => 'chart'])
@section('mainDashboard')

<div class="card card-primary">
    <canvas id="allproductsCharts"></canvas>
</div>

<div class="card card-primary">
    <canvas id="publishPending"></canvas>
</div>

<div class="card card-primary">
    <canvas id="lineAllproducts"></canvas>
</div>

@endsection



