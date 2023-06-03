@extends('layouts.app')
@section('title', 'Hotspot Users')
@section('subtitle', 'Hotspot')

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
                    <h5 class="card-title">Total Hotspot User <span>: {{ $totalhotspotuser }} users</span></h5>
                </div>
                <div class="p-3">
                    <button class="btn btn-primary btn-round ml-auto" data-bs-toggle="modal"
                        data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Hotspot
                    </button>
                </div>
            </div>

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Uptime</th>
                        <th scope="col">Bytes In</th>
                        <th scope="col">Bytes Out</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotspotuser as $no => $data)
                    <tr>
                        <div hidden>{{ $id = str_replace('*', '', $data['.id']) }}</div>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $data['name'] ?? 'Data kosong'  }}</td>
                        <td>{{ $data['password'] ?? 'Data kosong'  }}</td>
                        <td>{{ $data['profile'] ?? 'Data kosong'  }}</td>
                        <td>{{ $data['uptime'] ?? 'Data kosong'  }}</td>
                        <td>{{ formatBytes($data['bytes-in'],) }}</td>
                        <td>{{ formatBytes($data['bytes-out'],) }}</td>
                        <td>
                            @if ($data['disabled'] == "true" )
                            Disable
                            @else
                            Enable
                            @endif

                        </td>
                        <td>{{ $data['comment'] ?? 'Data kosong'  }}</td>
                        <td class="d-flex flex-row justify-content">
                            <a href="{{ route('edit.page.hotspot.users', $id) }}" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('delete.hotspot.users', $id) }}" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Delete"
                                onclick="return confirm('Apakah anda yakin ingin menhapus user {{ $data['name'] }} ?')"
                                class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>


@php
    function formatBytes($bytes, $decimal = null)
    {
        $satuan = ['Bytes', 'Kb', 'Mb', 'Gb', 'Tb'];
        $i = 0;
        while ($bytes > 1024) {
            $bytes /= 1024;
            $i++;
        }
        return round($bytes, $decimal) .'-' . $satuan[$i];
    }
@endphp
@include('hotspot.add')
@endsection
