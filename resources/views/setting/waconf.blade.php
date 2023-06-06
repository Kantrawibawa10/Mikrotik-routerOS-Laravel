@section('title', 'Konfigurasi Whatsaap')
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
                    <li class="breadcrumb-item active">{{-- $edit['name'] --}}</li>
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
                    <h3><i class="bi bi-whatsapp"></i> WABLAS</h3>
                    <div class="mt-3">
                        <label style="font-size: 14px;">Domain API :</label>
                        <p style="font-size: 13px;">{{ $domain['value'] ?? 'Tidak ada'}}</p>

                        <label style="font-size: 14px;">Phone connection :</label>
                        <p style="font-size: 13px;" class="mb-0">{{ $phone['value'] ?? '' }}</p>
                        <p style="font-size: 13px;" class="mb-0">{{ $phonecs['value'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-9">
        <div class="card p-4">
            <form action="{{ route('apiwa.set') }}" method="POST">
                @csrf
                <div class="row gy-4 g-2">
                    <input type="hidden" name="id" value="{{-- $edit['id'] --}}">
                    <input type="hidden" name="setting[]" value="WA_API">
                    <input type="hidden" name="name_config" value="Whatsaap">
                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>API Whatsapp (WABLAS)</label>
                            <input name="api" type="text" id="api"
                                class="form-control mb-0 @error ('api') is-invalid @enderror" placeholder="API Whatsapp"
                                value="{{ $api['api'] ?? '' }}">

                            @error('api')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-lg-12 mb-0 pb-0">
                        <label class="col-form-label pt-0">Notifikasi Jatuh Tempo 1</label>
                    </div>
                    <div class="col-md-4 mb-0 pr-0 mt-1">
                        <input type="hidden" name="name_config[]" value="notif1">
                        <input type="hidden" name="setting[]" value="WA_API">
                        <div class="form-group form-group-default">
                            <label for="">Notifikasi 1</label>
                            <select name="value[]" id="notif1" class="form-control">
                                <option value="" selected disabled>Pilih Waktu</option>
                                @if($notif1['value'] == 2)
                                    <option value="2" selected>2 Hari Sebelum Jatuh Tempo</option>
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="14">14 Hari Sebelum Jatuh Tempo</option>
                                    <option value="0">Hanya Pada Saat Jatuh Tempo</option>
                                @elseif($notif1['value'] == 5)
                                    <option value="5" selected>5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="2">2 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="14">14 Hari Sebelum Jatuh Tempo</option>
                                    <option value="0">Hanya Pada Saat Jatuh Tempo</option>
                                @elseif($notif1['value'] == 7)
                                    <option value="7" selected>7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="2">2 Hari Sebelum Jatuh Tempo</option>
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="14">14 Hari Sebelum Jatuh Tempo</option>
                                    <option value="0">Hanya Pada Saat Jatuh Tempo</option>
                                @elseif($notif1['value'] == 14)
                                    <option value="14" selected>14 Hari Sebelum Jatuh Tempo</option>
                                    <option value="2">2 Hari Sebelum Jatuh Tempo</option>
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="0">Hanya Pada Saat Jatuh Tempo</option>
                                @elseif($notif1['value'] == 0)
                                    <option value="0" selected>Hanya Pada Saat Jatuh Tempo</option>
                                    <option value="2">2 Hari Sebelum Jatuh Tempo</option>
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="14">14 Hari Sebelum Jatuh Tempo</option>
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-0 pr-0 mt-1">
                        <div class="form-group form-group-default">
                            <input type="hidden" name="setting[]" value="WA_API">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="yourBox1"
                                    name="name_config[]" value="notif2">
                                <label class="form-check-label" for="yourBox1">
                                    Notifikasi 2
                                </label>
                            </div>
                            <select name="value[]" id="notif2" class="form-control" disabled>
                                <option value="" selected disabled>Pilih Waktu</option>
                                <option value="2">2 Hari Sebelum Jatuh Tempo</option>
                                <option value="3">3 Hari Sebelum Jatuh Tempo</option>
                                <option value="0">Hanya Pada Saat Jatuh Tempo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-0 pr-0 mt-1">
                        <div class="form-group form-group-default">
                            <div class="form-check">
                                <input type="hidden" name="setting[]" value="WA_API">
                                <input class="form-check-input" type="checkbox" id="yourBox2"
                                    name="name_config[]" value="notif3">
                                <label class="form-check-label" for="yourBox2">
                                    Notifikasi 3
                                </label>
                            </div>
                            <select name="value[]" id="notif3" class="form-control" disabled>
                                <option value="" selected disabled>Pilih Waktu</option>
                                <option value="0">Hanya Pada Saat Jatuh Tempo</option>
                                <option value="">Jangan Aktifkan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Domain API (WABLAS)</label>
                            <input type="hidden" name="setting[]" value="WA_API">
                            <input type="hidden" name="name_config[]" value="domainAPI_WA">
                            <input name="value[]" type="text" id="domain"
                                class="form-control mb-0 @error ('domain') is-invalid @enderror" placeholder="Domain"
                                value="{{ $domain['value'] ?? '' }}">

                            @error('domain')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Token API (WABLAS)</label>
                            <input type="hidden" name="setting[]" value="WA_API">
                            <input type="hidden" name="name_config[]" value="TokenAPI_WA">
                            <input name="value[]" type="password" id="token"
                                class="form-control mb-0 @error ('token') is-invalid @enderror" placeholder="Token"
                                value="{{ $token['value'] ?? '' }}">

                            @error('token')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Nomor Whatsaap (WABLAS)</label>
                            <input type="hidden" name="setting[]" value="WA_API">
                            <input type="hidden" name="name_config[]" value="wa_API_phone">
                            <input name="value[]" type="number" id="no1"
                                class="form-control mb-0 @error ('value[]') is-invalid @enderror" placeholder="+62"
                                value="{{ $phone['value'] ?? '' }}">

                            @error('value[]')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Nomor Whatsaap CS (WABLAS)</label>
                            <input type="hidden" name="setting[]" value="WA_API">
                            <input type="hidden" name="name_config[]" value="wa_API_phone_cs">
                            <input name="value[]" type="number" id="value[]"
                                class="form-control mb-0 @error ('value[]') is-invalid @enderror" placeholder="+62"
                                value="{{ $phonecs['value'] ?? '' }}">

                            @error('value[]')
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
                                placeholder="Comment">{{ $api['description'] ?? '' }}</textarea>
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


<script>
    document.getElementById('yourBox1').onchange = function() {
        document.getElementById('notif2').disabled = !this.checked;
    };

    document.getElementById('yourBox2').onchange = function() {
        document.getElementById('notif3').disabled = !this.checked;
    };
</script>
@endsection
