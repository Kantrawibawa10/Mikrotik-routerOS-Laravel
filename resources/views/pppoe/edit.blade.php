@section('title', 'PPPoE Secrete')
@section('subtitle', 'PPPoE')
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
                    <li class="breadcrumb-item active">{{ $user['name'] }}</li>
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
                    <h1><i class="bi bi-rocket-fill"></i></h1>
                    <h5>PPPoE Secret</h5>
                    <div>
                        <label style="font-size: 14px;">username :</label>
                        <p style="font-size: 13px;">{{ $user['name'] ?? ''}}</p>
                        <label style="font-size: 14px;">Profile :</label>
                        <p style="font-size: 13px;">{{ $user['profile'] ?? ''}}</p>
                        <label style="font-size: 14px;">Local Adress :</label>
                        <p style="font-size: 13px;">{{ $user['local-address'] ?? '0.0.0.0'}}</p>
                        <label style="font-size: 14px;">Remote Adress :</label>
                        <p style="font-size: 13px;">{{ $user['remote-address'] ?? '0.0.0.0'}}</p>
                        <label style="font-size: 14px;">Service :</label>
                        <p style="font-size: 13px;">{{ $user['service'] ?? '0.0.0.0'}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-9">
        <div class="card p-4">
            <form action="{{ route('update.pppoe.secret') }}" method="POST">
                @csrf
                <div class="row gy-4 g-2">
                    <input type="hidden" name="id" value="{{ $user['.id'] }}">
                    <div class="col-md-6">
                        <label for="">Username</label>
                        <input type="text" name="user" class="form-control @error ('user') is-invalid @enderror" placeholder="Username" value="{{ $user['name'] ?? ''}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control @error ('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ $user['password'] ?? '' }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="">Local Address</label>
                        <input type="text" class="form-control" name="localaddress" placeholder="Local Address" value="{{ $user['local-address'] ?? '' }}">
                    </div>

                    <div class="col-md-4">
                        <label for="">Remote Address</label>
                        <input type="text" class="form-control" name="remoteaddress" placeholder="Remote Address" value="{{ $user['remote-address'] ?? '' }}">
                    </div>

                    <div class="col-md-4">
                        <label for="">Profile</label>
                        <select name="profile" id="profile" class="form-control">
                            <option selected>{{ $user['profile'] }}</option>
                            @foreach ($profile as $data)
                                <option>{{ $data['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Service</label>
                        <select name="service" id="service" class="form-control">
                            <option selected>{{ $user['service'] }}</option>
                            <option value="any">ANY</option>
                            <option value="async">ASYNC</option>
                            <option value="pppoe">PPPoE</option>
                            <option value="pptp">PPTP</option>
                            <option value="sstp">SSTP</option>
                            <option value="l2tp">L2TP</option>
                            <option value="ovpn">OVPN</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Status</label>
                        <select name="disabled" id="disabled" class="form-control">
                            <option disabled selected>--Pilih Kategori Produk--</option>
                            @if ($user['disabled'] == "false")
                                <option value="true">Disable</option>
                                <option value="false" selected>Enable</option>
                            @elseif($user['disabled'] == "true")
                                <option value="true" selected>Disable</option>
                                <option value="false">Enable</option>
                            @endif
                        </select>
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="comment" rows="6" placeholder="Comment"
                        >{{ $user['comment'] ?? '' }}</textarea>
                    </div>

                    <div class="col-md-12 text-end">
                        <a href="{{ route('pppoe.secret') }}" class="btn btn-danger">Cancel <i class="bi bi-x-lg"></i></a>
                        <button type="submit" class="btn btn-primary">Update <i class="bi bi-rocket-fill"></i></button>
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>
@endsection
