@extends('layouts.app')
@section('title', 'PPPoE Secrete')
@section('subtitle', 'PPPoE')

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
                    <h5 class="card-title">Total Secret PPPoE <span>: {{ $totalsecret }} client</span></h5>
                </div>
                <div class="p-3">
                    <button class="btn btn-primary btn-round ml-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Secret
                    </button>
                </div>
           </div>

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Password</th>
                        <th scope="col">Service</th>
                        <th scope="col">Local-Address</th>
                        <th scope="col">Remote-Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($secret as $no => $data)
                    <tr>
                        <div hidden>{{ $id = str_replace('*', '', $data['.id']) }}</div>
                        <th scope="row">{{ $no+1 }}</th>
                        <td>{{ $data['name'] ?? 'Data kosong' }}</td>
                        <td>{{ $data['password'] ?? 'Data kosong' }}</td>
                        <td>{{ $data['service'] ?? 'Data kosong' }}</td>
                        <td>{{ $data['local-address'] ?? '0.0.0.0' }}</td>
                        <td>{{ $data['remote-address'] ?? '0.0.0.0' }}</td>
                        <td class="">
                            @if($data['disabled'] == "true")
                            <form action="{{ route('disabled.page.pppoe.secret') }}" method="POST">
                                @csrf
                                <button type="submit" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled" onclick="return confirm('Apakah anda yakin ingin mengaktifkan secret {{ $data['name'] }} ?')" class="p-0" style="background: transparent; border: none;">
                                    <input type="hidden" name="id" value="{{ $data['.id'] }}">
                                    <input type="hidden" name="disabled" value="false">
                                    <span class="badge bg-danger">Disable</span>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('disabled.page.pppoe.secret') }}" method="POST">
                                @csrf
                                <button type="submit" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Enable" onclick="return confirm('Apakah anda yakin ingin menonaktifkan secret {{ $data['name'] }} ?')" class="p-0" style="background: transparent; border: none;">
                                    <input type="hidden" name="id" value="{{ $data['.id'] }}">
                                    <input type="hidden" name="disabled" value="true">
                                    <span class="badge bg-success">Enable</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td>{{ $data['comment'] ?? 'Data kosong' }}</td>
                        <td class="d-flex flex-row justify-content">
                            <a href="{{ route('edit.page.pppoe.secret', $id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('delete.pppoe.secret', $id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Apakah anda yakin ingin menhapus secret {{ $data['name'] }} ?')" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

@include('pppoe.add')
@endsection
