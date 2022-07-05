@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('img/c-1.jpeg') }}" class="d-block w-100" alt="carousel-1">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('img/c-2.jpeg') }}" class="d-block w-100" alt="carousel-2">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('img/c-3.jpeg') }}" class="d-block w-100" alt="carousel-3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 my-4">
                <h2 class="text-center">Laptop / Notebook</h2>
            </div>
            @foreach ($barangs as $barang)
                <div class="col-md-4 p-2">
                    <div class="card">
                        <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top"
                            style="height: 20rem; object-fit: cover;" alt="barang">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                            <p class="card-text">
                                <strong>Harga :</strong> Rp. {{ number_format($barang->harga) }} <br>
                                <strong>Stok :</strong> {{ $barang->stok }} <br>
                                {{-- <strong>Keterangan :</strong> <br>
                                {{ $barang->keterangan }} --}}
                            </p>
                            <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i
                                    class="fa fa-shopping-cart"></i> Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
