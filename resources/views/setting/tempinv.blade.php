@section('title', 'Konfigurasi Invoice')
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
<div class="row">

    <div class="col-xl-3">

        <div class="row">
            <div class="col-lg-12">
                <div class="info-box card px-4 pt-5 pb-5">
                    <h4><i class="bi bi-wallet2"></i> Temp Invoice</h4>
                    <div class="mt-3">
                        <label style="font-size: 14px;">Nama Perusahaan :</label>
                        <p style="font-size: 13px;">{{ $name['value'] ?? 'Tidak ada'}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="info-box card px-4 pt-5 pb-5">
                    <h4>Logo Invoce</h4>
                    <div class="mt-3 mb-0">
                        <form action="{{ route('invoice.set') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12 mb-4 mt-0 d-flex justify-content-center">
                                @if(!$logo_inv)
                                    <img id="blah" src="{{ asset('invoice/logo.png') }}" alt="your image" class="img-fluid">
                                @else
                                    <img id="blah" src="{{ asset('invoice/'. $logo_inv->value) }}" alt="your image" class="img-fluid">
                                @endif
                            </div>
                            <input type="hidden" name="setting" value="Invoice">
                            <input type="hidden" name="name_config" value="Logo_INV">
                            <input name="value" accept="image/*" type='file' id="imgInp" class="form-control mb-4" required/>

                            <button class="btn btn-primary mb-0 col-12" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-9">
        <div class="card p-4">
            <form action="{{ route('apidoku.set') }}" method="POST">
                @csrf
                <div class="row gy-4 g-2 p-4">
                    @include('vendor.invoice')
                </div>
            </form>
        </div>

    </div>

</div>

<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
