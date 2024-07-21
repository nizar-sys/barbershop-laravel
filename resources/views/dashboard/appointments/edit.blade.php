@extends('layouts.app')
@section('title', 'Ubah Data Reservasi')

@section('title-header', 'Ubah Data Reservasi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Data Reservasi</a></li>
    <li class="breadcrumb-item active">Ubah Data Reservasi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Reservasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="service_id">Layanan</label>
                                    <select class="form-control @error('service_id') is-invalid @enderror" id="service_id"
                                        name="service_id" required>
                                        <option value="">Pilih Layanan</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ old('service_id', $appointment->service_id) == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('service_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="appointment_date">Tanggal Reservasi</label>
                                    <input type="date"
                                        class="form-control @error('appointment_date') is-invalid @enderror"
                                        id="appointment_date" name="appointment_date"
                                        value="{{ old('appointment_date', date("Y-m-d", strtotime($appointment->appointment_date))) }}" required>
                                    @error('appointment_date')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="barber_id">Barberman</label>
                                    <select class="form-control @error('barber_id') is-invalid @enderror" id="barber_id"
                                        name="barber_id" required>
                                        <option value="">Pilih Barberman</option>
                                        @foreach ($barbers as $barberman)
                                            <option value="{{ $barberman->id }}"
                                                {{ old('barber_id', $appointment->barber_id) == $barberman->id ? 'selected' : '' }}>
                                                {{ $barberman->name }} - {{ $barberman->shift }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('barber_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="customer_name">Detil Data Pelanggan</label>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>NO Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="customer_name" id="customer_name"
                                                            class="form-control @error('record') is-invalid @enderror"
                                                            value="{{ old('customer_name', $appointment->customer_name) }}"
                                                            required>
                                                    </td>
                                                    <td>
                                                        <input type="email" name="customer_email" id="customer_email"
                                                            class="form-control @error('record') is-invalid @enderror"
                                                            value="{{ old('customer_email', $appointment->customer_email) }}"
                                                            required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="customer_phone" id="customer_phone"
                                                            class="form-control @error('record') is-invalid @enderror"
                                                            value="{{ old('customer_phone', $appointment->customer_phone) }}"
                                                            required>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
