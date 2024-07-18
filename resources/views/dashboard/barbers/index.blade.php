@extends('layouts.app')
@section('title', 'Data Barber')

@section('title-header', 'Data Barber')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Barber</li>
@endsection

@section('action_btn')
    <a href="{{route('barbers.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Barber</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barbers as $barber)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barber->name }}</td>
                                        <td>{{ $barber->email }}</td>
                                        <td>
                                            {{ $barber->phone_number }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('/uploads/images/'.$barber->avatar) }}" alt="{{ $barber->name }}" width="100">
                                        </td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('barbers.edit', $barber->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $barber->id }}" action="{{ route('barbers.destroy', $barber->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$barber->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="d-flex justify-content-between">
                                            <p>Jumlah Data : {{ $barbers->total() }}</p>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination
                                                    justify-content-end">
                                                    {{ $barbers->links() }}
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
        function deleteForm(id){
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
@endsection
