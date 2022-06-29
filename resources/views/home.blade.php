@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
                <h1 class="text-center">Comtech</h1>
                {{-- <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div> --}}
            </div>
            @foreach ($barangs as $barang)
                <div class="col-md-4 ">
                    <div class="card">
                        <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                            <p class="card-text">
                                <strong>Harga :</strong> Rp. {{ number_format($barang->harga) }} <br>
                                <strong>Stok :</strong> {{ $barang->stok }} <br>
                                <strong>Keterangan :</strong> <br>
                                {{ $barang->keterangan }}
                            </p>
                            <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
