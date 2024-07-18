@extends('layouts.app')
@section('title', 'Ubah Data Layanan')

@section('title-header', 'Ubah Data Layanan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Data Layanan</a></li>
    <li class="breadcrumb-item active">Ubah Data Layanan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Layanan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('services.update', $service->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="name">Nama Layanan</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Nama Layanan" value="{{ old('name', $service->name) }}"
                                        name="name">

                                    @error('name')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="price">Harga</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" placeholder="Harga Layanan"
                                        value="{{ old('price', $service->price) }}" name="price">

                                    @error('price')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('services.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
