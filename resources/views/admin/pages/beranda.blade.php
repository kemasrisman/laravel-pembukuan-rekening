@extends('admin.layouts.master')
@section('title', 'Beranda')
{{-- Content body: main page content --}}

@section('content')
<div class="row pt-4 text-center">
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-header ">Total Users</div>
            <div class="card-body">
                <h1 class="">{{ $totalUsers }}</h1>
                <p class="card-text">Jumlah total user yang terdaftar di sistem.</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-header ">Total Nasabah</div>
            <div class="card-body">
                <h1 class="">{{ $totalNasabah }}</h1>
                <p class="card-text">Jumlah total nasabah yang terdaftar di sistem.</p>
            </div>
        </div>
    </div>
</div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush