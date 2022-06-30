@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-2">
                <a href="{{ url('home') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>{{ $barang->nama_barang }}</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="img-thumbnail"
                                    alt="Barang">
                            </div>
                            <div class="col-md-6 mt-5">
                                <h2>{{ $barang->nama_barang }}</h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($barang->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ number_format($barang->stok) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $barang->keterangan }}</td>
                                        </tr>
                                        <form method="POST" action="{{ url('pesan') }}/{{ $barang->id }}">

                                            @csrf

                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                                <input type="number" name="jumlah_pesan" class="form-control"
                                                    required="">

                                                <button type="submit" class="btn btn-primary mt-2"><i
                                                        class="fa fa-shopping-cart"></i> Masukan keranjang</button>
                                            </td>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
