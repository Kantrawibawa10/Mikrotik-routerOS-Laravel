@extends('layouts.app')
@section('title', 'Dashboard')
@section('subtitle', 'Home')

@section('menu-page')
<div class="pagetitle">
    <div class="d-flex justify-content-between">
        <div>
            <h1>@yield('title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">@yield('subtitle')</li>
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">@yield('title')</a></li>
                </ol>
            </nav>
            <span>Router Board Name : {{ $identity }}</span>
        </div>

        <div>
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#apirouter">
                <i class="bi bi-router"></i> API Router
            </button>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="row">
        <!-- CPU Load -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">CPU Load</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-hdd-stack-fill" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 18px;" id="cpu"></h6>
                            <span class="text-success small pt-1 fw-bold">Load CPU</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End CPU Load -->

        <!-- PPOe Secreat -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Total PPPoE Secret</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-house-door-fill" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 18px;">{{ $totalsecret }}</h6>
                            <span class="text-success small pt-1 fw-bold" style="font-size: 11px;">PPPoE Secret</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End PPOe Secreat -->


        <!-- PPOe Secreat -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Hotspot Active</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-people-fill" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 18px;">{{ $hotspotactive }}</h6>
                            <span class="text-success small pt-1 fw-bold" style="font-size: 11px;">Hotspot User</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End PPOe Secreat -->


        <!-- Uptime -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Uptime</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-clock-fill" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 18px;" id="uptime"></h6>
                            <span class="text-success small pt-1 fw-bold" style="font-size: 11px;">Uptime</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Uptime -->


        <!-- Info -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Info</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-house-door-fill" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 12px;">Model: {{ $model }} / ({{ $boardname }})</h6>
                            <span class="text-success small pt-1 fw-bold" style="font-size: 11px;">OS : {{ $version
                                }}</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Info -->


        <!-- Memory -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Free Memory/HDD</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-database-fill" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 12px;">({{ $freememory }})/<br>({{ $freehdd }})</h6>
                            <span class="text-success small pt-1 fw-bold" style="font-size: 11px;">Memory | HDD</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Memory -->


        <!-- PPoE Active -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">PPPoE Active</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-database-fill" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 20px;">{{ $secretactive }}</h6>
                            <span class="text-success small pt-1 fw-bold" style="font-size: 11px;">Active</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End PPoE Active -->


        <!-- Total User Hotspot -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Total User Hotspot</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-wifi" style="font-size: 20px;"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 20px;">{{ $hotspotactive }}</h6>
                            <span class="text-success small pt-1 fw-bold" style="font-size: 11px;">Total User</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Total User Hotspot -->
    </div>
</div>

<div class="col-lg-8">
    <div class="row">
        <!-- Reports -->


        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">List Traffic Naik</h5>
                    <div id="load"></div>
                </div>

            </div>
        </div>
        <!-- End Recent Sales -->

    </div>
</div>


<div class="col-lg-4">

    <div class="card mb-3">
        <div class="my-3 mx-3">
            <div class="form-group">
                <label for="defaultSelect">Select Interface</label>
                <select class="form-control form-control" name="interface" id="interface">
                    @foreach ($interface as $data)
                    <option value="{{ $data['name'] }}">{{ $data['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2" id="traffic"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    setInterval('load();', 1000);
    function load() {
        $('#load').load('{{ route('dashboard.report') }}')
    }

    setInterval('traffic();',1000);
    function traffic() {
        var traffic = $('#interface').val() ;
        var url = '{{ route("dashboard.traffic", ":traffic") }}';
        // console.log(traffic);
        $('#traffic').load(url.replace(':traffic', traffic));
    }

    setInterval('cpu();',1000);
    function cpu() {
        $('#cpu').load('{{ route('dashboard.cpu') }}')
    }

    setInterval('uptime();',1000);
    function uptime() {
        $('#uptime').load('{{ route('dashboard.uptime') }}')
    }
</script>



<?php function formatBytes($bytes, $decimal = null){
    $satuan = ['Bytes', 'Kb', 'Mb', 'Gb', 'Tb'];
    $i = 0;
    while ($bytes > 1024) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, $decimal) .'-' . $satuan[$i];
}
?>
@include('layouts.routeros')
@endsection
