@extends('layouts.admin')
@section('content')
    @if ($pesanans->count() > 0)
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal</td>
                                    <td>Status</td>
                                    <td>Jumlah</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanans as $pesanan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pesanan->tanggal }}</td>
                                        <td>
                                            @if ($pesanan->status == 2)
                                                Sudah Dibayar, Menunggu diproses
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</td>
                                        <td>
                                            <a href="{{ url('admin/pesanan-dibayar') }}/{{ $pesanan->id }}"
                                                class="btn btn-primary"><i class="fa fa-arrow-right"></i> Proses Pesanan</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h5>Tidak ada Data</h5>
    @endif
    {{-- sweet alert --}}
    @include('sweetalert::alert')
@endsection
