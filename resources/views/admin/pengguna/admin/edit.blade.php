@extends('layouts.admin')
@section('content')
<div class="text-left pb-4">
    <a href="{{ url('admin/list-admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('admin/list-admin', $user->id) }}">
                @csrf

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Nama') }}</label>

                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" required autocomplete="name" autofocus value="{{ $user->name }}">

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
                        <input id="email" type="" class="form-control @error('email') is-invalid @enderror"
                            name="email" autocomplete="email" autofocus value="{{ $user->email }}">
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
                        <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            name="no_hp" required autocomplete="no_hp" autofocus value="{{ $user->no_hp }}">

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
                            name="password" autofocus placeholder="Lewati jika tidak ingin merubah!">
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
                            <i class="fa fa-save"></i>
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
