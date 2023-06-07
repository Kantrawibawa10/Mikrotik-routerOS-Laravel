@section('title', 'ODP Location')
@section('subtitle', 'ODP')
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
                    <li class="breadcrumb-item active">{{ $edit['name'] }}</li>
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
                    <h1><i class="bi bi-diagram-2-fill"></i></h1>
                    <h5>{{ $edit['name'] }}</h5>
                    <div>
                        <label style="font-size: 14px;">Provinsi :</label>
                        <p style="font-size: 13px;">{{ $edit['provinsi'] ?? 'Tidak ada'}}</p>
                        <label style="font-size: 14px;">Kabupaten :</label>
                        <p style="font-size: 13px;">{{ $edit['kabupaten'] ?? 'Tidak ada'}}</p>
                        <label style="font-size: 14px;">Kecamatan :</label>
                        <p style="font-size: 13px;">{{ $edit['kecamatan'] ?? 'Tidak ada'}}</p>
                        <label style="font-size: 14px;">Desa :</label>
                        <p style="font-size: 13px;">{{ $edit['desa'] ?? 'Tidak ada'}}</p>
                        <label style="font-size: 14px;">Maps Lokasi :</label>
                        <div class="mb-3">
                            @if($edit['maps'] == null)
                            <a href="#" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Maps ODP"
                                class="p-0" style="background: transparent; border: none; cursor: not-allowed;">
                                <span class="badge bg-secondary"><i class="bi bi-geo-fill"></i> Maps ODP</span>
                            </a>
                            @else
                            <a href="{{ $edit['maps'] }}" target="_blank" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Maps ODP" class="p-0"
                                style="background: transparent; border: none;">
                                <span class="badge bg-warning"><i class="bi bi-geo-fill"></i> Maps ODP</span>
                            </a>
                            @endif
                        </div>
                        <label style="font-size: 14px;">Alamat :</label>
                        <p style="font-size: 13px;">{{ $edit['alamat'] ?? 'Tidak ada'}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-9">
        <div class="card p-4">
            <form action="{{ route('update.odp') }}" method="POST">
                @csrf
                <div class="row gy-4 g-2">
                    <input type="hidden" name="id" value="{{ $edit['id'] }}">
                    <div class="col-sm-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Nama ODP|POP</label>
                            <input name="name" type="text" id="name"
                                class="form-control mb-0 @error ('name') is-invalid @enderror"
                                placeholder="Nama ODP|POP" value="{{ $edit['name'] }}">

                            @error('name')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Provinsi</label>
                            <input name="provinsi" id="provinsi" type="text" value="{{ $edit['provinsi'] }}"
                                class="form-control mb-0 @error ('name') is-invalid @enderror" placeholder="Provinsi">

                            @error('provinsi')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Kabupaten</label>
                            <input name="kabupaten" id="kabupaten" value="{{ $edit['kabupaten'] }}"
                                class="form-control mb-0 @error ('kabupaten') is-invalid @enderror"
                                placeholder="Kabupaten">

                            @error('kabupaten')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Kecamatan</label>
                            <input name="kecamatan" id="kecamatan" type="text" value="{{ $edit['kecamatan'] }}"
                                class="form-control mb-0 @error ('kecamatan') is-invalid @enderror"
                                placeholder="Kecamatan">

                            @error('kecamatan')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Desa</label>
                            <input name="desa" id="desa" class="form-control mb-0 @error ('desa') is-invalid @enderror" value="{{ $edit['desa'] }}"
                                placeholder="Desa">

                            @error('desa')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 mb-0">
                        <div calass="form-group form-group-default">
                            <label><span class="text-primary">!</span>Alamat</label>
                            <textarea name="alamat" id="alamat" type="text"
                                class="form-control mb-0 @error ('alamat') is-invalid @enderror"
                                placeholder="Alamat">{{ $edit['alamat'] }}</textarea>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mb-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Maps link ODP|POP</label>
                            <input type="link" name="maps" id="maps" type="text"
                                class="form-control mb-0 @error ('maps') is-invalid @enderror"
                                placeholder="Maps ODP|POP" value="{{ $edit['maps'] }}">
                            @error('maps')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <x-embed url="{{ $edit->maps }}" aspect-ratio="4:3" />
                    </div>


                    <div class="col-md-12 mb-0 pr-0">
                        <div class="form-group form-group-default">
                            <label><span class="text-primary">!</span>Owner</label>
                            <select name="owner" id="owner" class="form-control">
                                <option value="" selected disabled>Pilih</option>
                            </select>
                            @error('owner')
                            <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-12 mb-0">
                        <div calass="form-group form-group-default">
                            <label>Comment</label>
                            <textarea name="comment" id="comment" type="text" class="form-control"
                                placeholder="Comment">{{ $edit['decription'] }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 text-end">
                        <a href="{{ route('pppoe.secret') }}" class="btn btn-danger">Cancel <i
                                class="bi bi-x-lg"></i></a>
                        <button type="submit" class="btn btn-primary">Update <i class="bi bi-rocket-fill"></i></button>
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>

@endsection
