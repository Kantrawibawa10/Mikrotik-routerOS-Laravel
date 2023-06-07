@section('title', 'Konfigurasi Umum')
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
                    <h5><i class="bi bi-building-gear"></i> Profil Perusahaan</h5>
                    <div class="mt-3">
                        <label style="font-size: 14px;">Nama Perusahaan :</label>
                        <p style="font-size: 13px;">{{ $name['value'] ?? 'Tidak ada'}}</p>

                        <label style="font-size: 14px;">No. Hp :</label>
                        <p style="font-size: 13px;">{{ $phone['value'] ?? 'Tidak ada'}}</p>

                        <label style="font-size: 14px;">Alamat :</label>
                        <p style="font-size: 13px;">{{ $alamat['value'] ?? 'Tidak ada'}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-9">
        <div class="card p-4">
            <form action="{{ route('umum.set') }}" method="POST">
                @csrf
                <div class="row gy-4 g-2">
                    <input type="hidden" name="id" value="{{-- $edit['id'] --}}">
                    <input type="hidden" name="setting[]" value="Config">
                    <input type="hidden" name="name_config[]" value="conf_perusahaan">
                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Nama Perusahaan</label>
                            <input name="value[]" type="text" id="name"
                                class="form-control mb-0 @error ('value') is-invalid @enderror" placeholder="Nama perusahaan"
                                value="{{ $name['value'] ?? '' }}">

                            @error('value')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>No. HP</label>
                            <input type="hidden" name="setting[]" value="Config">
                            <input type="hidden" name="name_config[]" value="conf_phone">
                            <input name="value[]" type="number" id="phone"
                                class="form-control mb-0 @error ('value') is-invalid @enderror" placeholder="No. Hp"
                                value="{{ $phone['value'] ?? '' }}">

                            @error('value')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mb-0 pr-0">
                        <input type="hidden" name="name_config[]" value="remind_inv">
                        <input type="hidden" name="setting[]" value="Config">
                        <div class="form-group form-group-default">
                            <label for="">Invoice Otomatis</label>
                            <select name="value[]" id="remind_inv" class="form-control">
                                <option value="" selected disabled>Pilih Waktu</option>
                                @if($remind_inv['value'] ?? '' == '5')
                                    <option value="5" selected>5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="10">10 Hari Sebelum Jatuh Tempo</option>
                                    <option value="15">15 Hari Sebelum Jatuh Tempo</option>
                                @elseif($remind_inv['value'] ?? '' == '7')
                                    <option value="7" selected>7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="10">10 Hari Sebelum Jatuh Tempo</option>
                                    <option value="15">15 Hari Sebelum Jatuh Tempo</option>
                                @elseif($remind_inv['value']  ?? '' == '10')
                                    <option value="10" selected>10 Hari Sebelum Jatuh Tempo</option>
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="15">15 Hari Sebelum Jatuh Tempo</option>
                                @elseif($remind_inv['value'] ?? '' == '15')
                                    <option value="15" selected>15 Hari Sebelum Jatuh Tempo</option>
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="10">10 Hari Sebelum Jatuh Tempo</option>
                                @else
                                    <option value="5">5 Hari Sebelum Jatuh Tempo</option>
                                    <option value="7">7 Hari Sebelum Jatuh Tempo</option>
                                    <option value="10">10 Hari Sebelum Jatuh Tempo</option>
                                    <option value="15">15 Hari Sebelum Jatuh Tempo</option>
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-0">
                        <div calass="form-group form-group-default">
                            <input type="hidden" name="setting[]" value="Config">
                            <input type="hidden" name="name_config[]" value="conf_alamat">
                            <label>Alamat</label>
                            <textarea name="value[]" id="alamat" type="text" class="form-control"
                                placeholder="Alamat">{{ $alamat['value'] ?? '' }}</textarea>
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
