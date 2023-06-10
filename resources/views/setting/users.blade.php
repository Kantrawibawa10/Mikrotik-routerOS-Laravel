@extends('layouts.app')
@section('title', 'Users Management')
@section('subtitle', 'Setting')

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
    <div class="col-lg-12 mb-2">
        @if (count($errors) > 0)
        <div class="alert alert-danger mb-0">
            <ul class="mb-0 px-2">
                <span>Lengkapi Data untuk melanjutkan!</span>
            </ul>
        </div>
        @endif
    </div>
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="card-title">Total Seluruh Users <span>: {{ $user->count() }} users</span></h5>
                </div>
                <div class="p-3">
                    <button class="btn btn-primary btn-round ml-auto" data-bs-toggle="modal"
                        data-bs-target="#addRowModal">
                        <i class="bi bi-people"></i>
                        Add Users
                    </button>
                </div>
            </div>

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Users</th>
                        <th scope="col">Role</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $no => $data)
                    <tr>
                        <div hidden>{{ $id = str_replace('*', '', $data['id']) }}</div>
                        <th scope="row">{{ $no+1 }}</th>
                        <td>{{ $data['name'] ?? 'Data kosong' }}</td>
                        <td class="">{{ $data['email'] ?? 'Data kosong' }}</td>
                        <td>{{ $data['description'] ?? 'Data kosong' }}</td>
                        <td class="d-flex flex-row justify-content">
                            <a href="{{ route('edit.tiang', $id) }}" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('delete.tiang', $id) }}" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Delete"
                                onclick="return confirm('Apakah anda yakin ingin menhapus secret {{ $data['name'] }} ?')"
                                class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

@include('tiang.add')
@endsection
