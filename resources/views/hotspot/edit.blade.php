@section('title', 'Hotspot Users')
@section('subtitle', 'Hotspot')
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
                    <h1><i class="bi bi-hdd-stack-fill"></i></h1>
                    <h5>Hotspot User</h5>
                    <div>
                        <label style="font-size: 14px;">username :</label>
                        <p style="font-size: 13px;">{{ $user['name'] ?? ''}}</p>
                        <label style="font-size: 14px;">Profile :</label>
                        <p style="font-size: 13px;">{{ $user['profile'] ?? ''}}</p>
                        <label style="font-size: 14px;">Server :</label>
                        <p style="font-size: 13px;">{{ $user['server'] ?? 'Uknown' }}</p>
                        <label style="font-size: 14px;">Status :</label>
                        <p style="font-size: 13px;">
                            @if ($user['disabled'] == "false")
                            Enable
                            @else
                            Disable
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-9">
        <div class="card p-4">
            <form action="{{ route('update.hotspot.users') }}" method="POST">
                @csrf
                <div class="row gy-4 g-2 mb-3">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="user">User</label>
                            <input type="hidden" value="{{ $user['.id'] }}" name="id">
                            <input type="text" name="user" class="form-control" autocomplete="off"  value="{{ $user['name'] ?? '' }}" id="user" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ $user['password'] ?? '' }}" id="password" required>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="server">Server</label>
                            <select name="server" id="server" class="form-control">
                                <option disabled selected>-- Pilih Server --</option>
                                @foreach ($server as $data)
                                    @if($user['server'] ?? '' == $data['name'] ?? '')
                                        <option value="{{$data['name'] }}" selected>{{$data['name'] }}</option>
                                    @else
                                        <option value="{{ $data['name'] }}">{{ $data['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <select name="profile" id="profile" class="form-control">
                                <option disabled selected>-- Pilih Profile--</option>
                                @foreach ($profile as $data)
                                    @if($user['profile'] ?? '' == $data['name'] ?? '')
                                        <option value="{{$data['name'] }}" selected>{{$data['name'] }}</option>
                                    @else
                                        <option value="{{ $data['name'] }}">{{ $data['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="disabled" id="disabled" class="form-control">
                                @if ($user['disabled'] == "false")
                                <option value="false" selected>Enable</option>
                                <option value="true">Disable</option>
                                @elseif ($user['disabled'] == "false")
                                <option value="true" selected>Disable</option>
                                <option value="false">Enable</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="timelimit">Time Limit</label>
                        <input type="text" name="timelimit" value="{{ $user['limit-uptime'] ?? '0' }}" class="form-control"
                            id="timelimit">
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea type="text" name="comment" class="form-control"
                            id="comment" placeholder="Comment">{{ $user['comment'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-12 text-end">
                    <a href="{{ route('hotspot.users') }}" class="btn btn-danger">Cancel <i class="bi bi-x-lg"></i></a>
                    <button type="submit" class="btn btn-primary">Update <i class="bi bi-hdd-stack-fill"></i></button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
