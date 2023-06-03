@extends('layouts.app')
@section('title', 'Traffic Report')
@section('subtitle', 'Report')

@section('menu-page')
<div class="pagetitle">
    <div class="d-flex justify-content-between">
        <div>
            <h1>@yield('title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">@yield('subtitle')</li>
                    <li class="breadcrumb-item active"><a href="{{ route('traffic.index') }}">@yield('title')</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">


        <div class="card-body">
           <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="card-title">Total Traffic Report <span>: {{ $report->count() }} report</span></h5>
                </div>
           </div>

           <center>
            <div>
                <table>
                    <tr>
                        <form class="form-inline" action="{{ route('traffic.search') }}" method="GET">
                            <div class="form-group">
                                <td><label><b>Mulai Tanggal:</b></label></td>
                                <td><input type="date" class="form-control datepicker" name="tgl_awal" id="tgl_awal" value="{{ request('tgl_awal') }}" required></td>
                            </div>

                            <div class="form-group">
                                <td><label><b>Sampai Tanggal:</b></label></td>
                                <td><input type="date" class="form-control datepiscker" name="tgl_akhir" id="tgl_akhir" value="{{ request('tgl_akhir') }}" required></td>
                            </div>

                            <div class="form-group">
                                <td><button type="submit" class="btn btn-primary">Search</button></td>
                            </div>
                            <div class="form-group">
                                <td><a href="{{ route('traffic.index') }}" type="reset" value="reset" class="btn btn-danger">Reset</a></td>
                            </div>
                        </form>
                    </tr>
                </table>
            </div>
        </center>
        <center class="mt-4">
            {{ $view_tgl }}
        </center>

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($report as $no => $data)
                    <tr>
                        <div hidden>{{ $id = str_replace('*', '', $data['.id']) }}</div>
                        <th scope="row">{{ $no+1 }}</th>
                        <td>{!! $data['text'] ?? 'Data kosong' !!}</td>
                        <td>{{ date('d F Y h:i:s', strtotime($data['created_at'])) ?? 'Data kosong' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection
