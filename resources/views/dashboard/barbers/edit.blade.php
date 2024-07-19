@extends('layouts.app')
@section('title', 'Ubah Data Barber')

@section('title-header', 'Ubah Data Barber')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('barbers.index') }}">Data Barber</a></li>
    <li class="breadcrumb-item active">Ubah Data Barber</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Barber</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('barbers.update', $barber->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Nama Barber" value="{{ old('name', $barber->name) }}"
                                        name="name">

                                    @error('name')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Barber" value="{{ old('email', $barber->email) }}"
                                        name="email">

                                    @error('email')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="phone_number">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" placeholder="Nomor Telepon Barber"
                                        value="{{ old('phone_number', $barber->phone_number) }}" name="phone_number">

                                    @error('phone_number')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="shift_start">Shift Mulai</label>
                                    <input type="time" class="form-control @error('shift_start') is-invalid @enderror"
                                        id="shift_start" placeholder="Shift Mulai Barber" value="{{ old('shift_start', $barber->shift_start) }}"
                                        name="shift_start">

                                    @error('shift_start')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="shift_end">Shift Selesai</label>
                                    <input type="time" class="form-control @error('shift_end') is-invalid @enderror"
                                        id="shift_end" placeholder="Shift Selesai Barber" value="{{ old('shift_end', $barber->shift_end) }}"
                                        name="shift_end">

                                    @error('shift_end')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="avatar">Foto</label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar"
                                placeholder="Foto Barber" name="avatar">

                            @error('avatar')
                                <div class="d-block invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('barbers.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
