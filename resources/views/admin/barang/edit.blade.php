@extends('layouts.admin')
@section('content')

    <div class="text-left mb-4">
        <a href="{{ url('admin/barang') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
            Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ url('admin/barang') }}/{{ $barangs->id }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-2">
                    <label for="nama_barang" class="col-md-2 col-form-label text-md-end">{{ __('Nama Barang') }}</label>

                    <div class="col-md-5">
                        <input id="nama_barang" type="text"
                            class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" required
                            autocomplete="nama_barang" autofocus value="{{ $barangs->nama_barang }}">

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
                            name="gambar" autocomplete="gambar" autofocus>
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
                            name="harga" required autocomplete="harga" autofocus value="{{ $barangs->harga }}">

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
                            name="stok" required autocomplete="stok" autofocus value="{{ $barangs->stok }}">

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
                        <textarea rows="10" style="height:100%;" name="keterangan" id="keterangan" class="form-control"
                            @error('keterangan') is-invalid @enderror required="">{{ $barangs->keterangan }}</textarea>

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="keterangan"
                        class="col-md-2 col-form-label text-md-end">{{ __('Preview Gambar') }}</label>
                    <div class="col-md-5">
                        <img src="{{ url('uploads') }}/{{ $barangs->gambar }}" height="250px">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-2 offset-md-2">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-save"></i>
                            Simpan
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
