@section('title', 'Konfigurasi Gmaps API')
@section('subtitle', 'Setting')
@extends('layouts.app')

@section('menu-page')
<div class="pagetitle">
    <div class="d-flex justify-content-between">
        <div>
            <h1>@yield('title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">@yield('subtitle')</li>
                    <li class="breadcrumb-item active"><a href="#">Edit @yield('title')</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row ">
    <div class="card">
        <div class="card-body">
            <center>
                @include('vendor.commingsoon')
            </center>
        </div>
    </div>
</div>
@endsection
