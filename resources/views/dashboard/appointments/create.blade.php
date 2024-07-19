@extends('layouts.app')
@section('title', 'Tambah Data Reservasi')

@section('title-header', 'Tambah Data Reservasi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Data Reservasi</a></li>
    <li class="breadcrumb-item active">Tambah Data Reservasi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Reservasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('appointments.store') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="service_id">Layanan</label>
                                    <select class="form-control @error('service_id') is-invalid @enderror" id="service_id"
                                        name="service_id">
                                        <option value="">Pilih Layanan</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ old('service_id') == $service->id ? 'selected' : '' }}>
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
                                    <label for="date">Tanggal Reservasi</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" value="{{ old('date') }}" required>
                                    @error('date')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="barberman_id">Barberman</label>
                                    <select class="form-control @error('barberman_id') is-invalid @enderror"
                                        id="barberman_id" name="barberman_id" required>
                                        <option value="">Pilih Barberman</option>
                                        @foreach ($barbers as $barberman)
                                            <option value="{{ $barberman->id }}"
                                                {{ old('barberman_id') == $barberman->id ? 'selected' : '' }}>
                                                {{ $barberman->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('barberman_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="time_slot">Jam</label>
                                    <select class="form-control @error('time_slot') is-invalid @enderror" id="time_slot"
                                        name="time_slot" required>
                                        <option value="">Pilih Jam</option>
                                    </select>
                                    @error('time_slot')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('barberman_id').addEventListener('change', function() {
            const barbermanId = this.value;
            const date = document.getElementById('date').value;

            if (barbermanId && date) {
                fetch(`/api/get-available-slots?barberman_id=${barbermanId}&date=${date}`)
                    .then(response => response.json())
                    .then(data => {
                        const timeSlotSelect = document.getElementById('time_slot');
                        timeSlotSelect.innerHTML = '<option value="">Pilih Jam</option>';
                        data.slots.forEach(slot => {
                            const option = document.createElement('option');
                            option.value = slot;
                            option.text = slot;
                            timeSlotSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
@endsection
