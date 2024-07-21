@extends('layouts.app')
@section('title', 'Data Reservasi')

@section('title-header', 'Data Reservasi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Reservasi</li>
@endsection

@section('action_btn')
    <a href="{{ route('appointments.create') }}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Reservasi</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Layanan</th>
                                    <th>Barber</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $appointment->customer_name }}</td>
                                        <td>
                                            @dateId($appointment->appointment_date)
                                        </td>
                                        <td>
                                            {{ $appointment->service->name }}
                                        </td>
                                        <td>
                                            {{ $appointment->barber->name }}
                                        </td>
                                        <td>
                                            <form data-appointment-id="{{ $appointment->id }}"
                                                action="{{ route('appointments.update-status', $appointment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                @if (in_array($appointment->status, ['pending', 'disetujui']))
                                                    <div
                                                        class="badge badge-{{ $appointment->status == 'pending' ? 'warning' : 'info' }}">
                                                        <select name="status" class="bg-transparent text-dark"
                                                            onchange="changeStatus(this)"
                                                            data-prev-status="{{ $appointment->status }}">
                                                            @if ($appointment->status == 'pending')
                                                                <option value="pending"
                                                                    {{ $appointment->status == 'pending' ? 'selected' : '' }}>
                                                                    Pending</option>
                                                            @endif
                                                            <option value="disetujui"
                                                                {{ $appointment->status == 'disetujui' ? 'selected' : '' }}>
                                                                Terima</option>
                                                            @if ($appointment->status == 'pending')
                                                                <option value="ditolak">Tolak</option>
                                                            @elseif ($appointment->status == 'disetujui')
                                                                <option value="selesai">Selesai</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                @elseif ($appointment->status == 'ditolak')
                                                    <span class="badge badge-danger">{{ $appointment->status }}</span>
                                                @elseif ($appointment->status == 'selesai')
                                                    <span class="badge badge-success">{{ $appointment->status }}</span>
                                                @endif
                                            </form>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            @if ($appointment->status == 'pending')
                                                <a href="{{ route('appointments.edit', $appointment->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form id="delete-form-{{ $appointment->id }}"
                                                    action="{{ route('appointments.destroy', $appointment->id) }}"
                                                    class="d-none" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button onclick="deleteForm('{{ $appointment->id }}')"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @elseif($appointment->status == 'selesai')
                                                <a target="__blank"
                                                    href="{{ route('appointments.print-invoice', $appointment->id) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-file-pdf"></i> Print
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data reservasi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="d-flex justify-content-between">
                                            <p>Jumlah Data : {{ $appointments->total() }}</p>
                                            <nav aria-label="Page navigation example">
                                                <ul
                                                    class="pagination
                                                    justify-content-end">
                                                    {{ $appointments->links() }}
                                                </ul>
                                            </nav>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id) {
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }
    </script>
    <script>
        function changeStatus(select) {
            const $select = $(select);
            const currentStatus = $select.val();
            const prevStatus = $select.attr('data-prev-status');

            const confirmationText = `Apakah Anda yakin ingin mengubah status menjadi ${currentStatus}?`;

            Swal.fire({
                title: 'Konfirmasi',
                text: confirmationText,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Lanjut!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $select.closest('form').submit();
                } else {
                    $select.val(prevStatus);
                }
            });
        }
    </script>
@endsection
