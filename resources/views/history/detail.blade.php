@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-2">
                <a href="{{ url('history') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Check Out Sukses</h3>
                        <h5>Pesanan anda sudah berhasil di check out, selanjutnya untuk pembayaran silahkan transfer ke
                            rekening : </h5>
                        <h5><strong>Bank BCA : 12345678 - a/n PT.Comtech Indonesia</strong> dengan nominal : <strong>Rp.
                                {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</strong></h5>
                        <h5></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                        @if (!empty($pesanan))
                            <p align="right">Tanggal Pesan: {{ $pesanan->tanggal }}</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th class="text-end">Jumlah</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                            <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}
                                            </td>
                                            <td align="right">{{ $pesanan_detail->jumlah }} Barang</td>
                                            <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                        <td align="right"><strong>Rp.
                                                {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right"><strong>Kode Unik : </strong></td>
                                        <td align="right"><strong># {{ number_format($pesanan->kode) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total Yang Harus Ditransfer : </strong>
                                        </td>
                                        <td align="right"><strong>Rp.
                                                {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
