@section('title', 'Konfigurasi Payment')
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

    <div class="col-xl-3">

        <div class="row">
            <div class="col-lg-12">
                <div class="info-box card px-4 pt-5 pb-5">
                    <h4><i class="bi bi-wallet2"></i> Doku Payment</h4>
                    <div class="mt-3">
                        <label style="font-size: 14px;">Client ID :</label>
                        <p style="font-size: 13px;">{{ $client['value'] ?? 'Tidak ada'}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-9">
        <div class="card p-4">
            <form action="{{ route('apidoku.set') }}" method="POST">
                @csrf
                <div class="row gy-4 g-2">
                    <input type="hidden" name="id" value="{{-- $edit['id'] --}}">
                    <input type="hidden" name="setting[]" value="DOKU_API">
                    <input type="hidden" name="name_config" value="DOKU">
                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>API Payment (DOKU)</label>
                            <input name="api" type="password" id="api"
                                class="form-control mb-0 @error ('value') is-invalid @enderror" placeholder="Secret Key"
                                value="{{ $secret['api'] ?? '' }}">

                            @error('value')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Client ID (DOKU)</label>
                            <input type="hidden" name="setting[]" value="DOKU_API">
                            <input type="hidden" name="name_config[]" value="client_DOKU">
                            <input name="value[]" type="text" id="domain"
                                class="form-control mb-0 @error ('value') is-invalid @enderror" placeholder="client id"
                                value="{{ $client['value'] ?? '' }}">

                            @error('value')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-12 mb-0">
                        <div calass="form-group form-group-default">
                            <label>Comment</label>
                            <textarea name="description" id="description" type="text" class="form-control"
                                placeholder="Comment">{{ $secret['description'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 text-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel <i class="bi bi-x-lg"></i></a>
                        <button type="submit" class="btn btn-primary">Update <i class="bi bi-rocket-fill"></i></button>
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>
@endsection
