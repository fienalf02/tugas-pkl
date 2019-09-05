@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div> -->

                <div class="page-wrapper">
                @if (Auth::user()->role=='ADMIN')
                    @include('admin/index')
                @elseif (Auth::user()->role=='GURU')
                    @include('guru/index')
                @elseif (Auth::user()->role=='TU')
                    @include('TU/index')
                @else (Auth::user()->role=='SISWA')
                    @include('siswa/index')
                @endif
                </div>
            <!-- </div>
        </div>
    </div>
</div> -->
@endsection