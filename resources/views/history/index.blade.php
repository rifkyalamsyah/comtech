@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Pesanan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-2">
                <a href="{{ url('home') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-history"></i> Riwayat Pesanan</h3>
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
                                                @if ($pesanan->status == 1)
                                                    Sudah Pesan & Belum Bayar
                                                @elseif ($pesanan->status == 2)
                                                    Sudah Bayar, Pesanan Diproses
                                                @elseif ($pesanan->status == 3)
                                                    Pesanan Dikirim
                                                @elseif ($pesanan->status == 4)
                                                    Selesai
                                                @endif
                                            </td>
                                            <td>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</td>
                                            <td>
                                                @if ($pesanan->status == 3)
                                                    <a href="#" class="btn btn-success"
                                                        onclick="event.preventDefault(); document.getElementById('terima').submit();"><i
                                                            class="fa fa-check"></i>
                                                        Pesanan
                                                        Diterima</a>
                                                    <form id="terima"
                                                        action="{{ url('pesan/pesanan-diterima') }}/{{ $pesanan->id }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="4">
                                                    </form>
                                                @else
                                                    <a href="{{ url('history') }}/{{ $pesanan->id }}"
                                                        class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                                @endif

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
    </div>
    @include('sweetalert::alert')
@endsection
