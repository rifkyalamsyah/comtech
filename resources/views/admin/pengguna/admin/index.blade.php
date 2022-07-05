@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ url('admin/tambah-admin') }}" class="btn btn-secondary mb-3"><i
                                class="fa fa-plus"></i> Tambah Admin</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                        <td>
                                            <a href="{{ url('admin/list-admin', $user->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ url('admin/list-admin', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda yakin ingin menghapus data?')"><i
                                                        class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- sweet alert --}}
    @include('sweetalert::alert')
@endsection
