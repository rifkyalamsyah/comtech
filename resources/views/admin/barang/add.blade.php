@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('admin/tambah-barang') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-2">
                    <label for="nama_barang" class="col-md-2 col-form-label text-md-end">{{ __('Nama Barang') }}</label>

                    <div class="col-md-5">
                        <input id="nama_barang" type="text"
                            class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" required
                            autocomplete="nama_barang" autofocus>

                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="gambar" class="col-md-2 col-form-label text-md-end">{{ __('Gambar') }}</label>

                    <div class="col-md-5">
                        <input id="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror"
                            name="gambar" required autocomplete="gambar" autofocus>
                        @error('gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="harga" class="col-md-2 col-form-label text-md-end">Harga (Rp.)</label>

                    <div class="col-md-5">
                        <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror"
                            name="harga" required autocomplete="harga" autofocus>

                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="stok" class="col-md-2 col-form-label text-md-end">Stok</label>

                    <div class="col-md-5">
                        <input id="stok" type="number" class="form-control @error('stok') is-invalid @enderror"
                            name="stok" required autocomplete="stok" autofocus>

                        @error('stok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="keterangan" class="col-md-2 col-form-label text-md-end">{{ __('Keterangan') }}</label>

                    <div class="col-md-5">
                        <textarea name="keterangan" id="keterangan" class="form-control" @error('keterangan') is-invalid @enderror
                            required=""></textarea>

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-2 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Tambah Barang
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
