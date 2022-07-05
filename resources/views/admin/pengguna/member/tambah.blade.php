@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-right">
                <a href="{{ url('admin/list-admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <form method="POST" action="{{ url('admin/tambah-admin') }}">
                @csrf

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Nama') }}</label>

                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email') }}</label>

                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-2">
                    <label for="no_hp" class="col-md-2 col-form-label text-md-end">No Hp</label>

                    <div class="col-md-5">
                        <input id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror"
                            name="no_hp" required autocomplete="no_hp" autofocus>

                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-5">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="password" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-2 offset-md-2 mt-4">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-plus"></i>
                            Tambah Admin
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
