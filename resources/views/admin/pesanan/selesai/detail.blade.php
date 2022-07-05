@extends('layouts.admin')
@section('content')
    <div class="card">
        @if (!empty($pesanan))
            <div class="alert alert-secondary" role="alert">
                Diterima Pada : <strong>{{ $pesanan->updated_at }}</strong>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
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
                                <td>
                                    <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100"
                                        alt="barang">
                                </td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}
                                </td>
                                <td align="right">{{ $pesanan_detail->jumlah }} Barang</td>
                                <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="5" align="right"><strong>Total Harga : </strong></td>
                            <td align="right"><strong>Rp.
                                    {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" align="right"><strong>Kode Unik : </strong></td>
                            <td align="right"><strong># {{ number_format($pesanan->kode) }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" align="right"><strong>Total Ditransfer :
                                </strong>
                            </td>
                            <td align="right"><strong>Rp.
                                    {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr style="height:1px;border:none;color:#dedede;background-color:#dedede;">
                <div class="pl-4">
                    <h5><i class="fa fa-user"></i> Informasi Pengiriman</h5>
                    <br>
                    <p>
                        <strong>Nama Penerima : </strong>{{ $user->name }}<br>
                        <strong>Alamat : </strong>{{ $user->alamat }}<br>
                        <strong>No. HP : </strong>{{ $user->no_hp }}<br>
                        <strong>Email : </strong>{{ $user->email }}<br>
                    </p>
                </div>
            </div>
            <div>
                <div class="text-right pr-4 pb-4">
                    <a href="{{ url('admin/pesanan-dikirim') }}" class="btn btn-secondary"><i
                            class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
        @endif
    </div>
@endsection
