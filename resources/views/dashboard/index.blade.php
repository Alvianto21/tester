@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2 mb-3 border-bottom">
  <h1 class="h2">Welcome, {{ Auth::user()->name }}</h1>
</div>

<div class="my-4 w-100">
  <canvas id="myChart" width="900" height="380"></canvas>
</div>

<script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>


@endsection