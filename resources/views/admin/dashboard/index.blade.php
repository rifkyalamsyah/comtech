@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-0">{{ $totaluser }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Barang</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-0">{{ $totalbarang }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-cart-shopping"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-0">{{ $totalpesanan }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
