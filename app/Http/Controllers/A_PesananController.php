<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Barang;
use App\Models\User;


class A_PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    //Daftar Pesanan
    public function index()
    {
        $pesanans = Pesanan::where('status', 1)->get();
        $data =
            [
                'title' => 'Daftar Pesanan',
            ];
        return view('admin.pesanan.list_pesanan.index', compact('pesanans'), $data);
    }
    public function detail($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan_details = PesananDetail::where('pesanan_id', $id)->get();
        $data =
            [
                'title' => 'Detail Pesanan',
            ];
        return view('admin.pesanan.list_pesanan.detail', compact('pesanan', 'pesanan_details'), $data);
    }
    public function konfirmasi($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 2;
        $pesanan->updated_at = now();
        $pesanan->save();
        return redirect('/admin/pesanan-dibayar')->with('success', 'Pesanan berhasil dikonfirmasi');
    }

    //Pesanan Dibayar
    public function dibayar()
    {
        $pesanans = Pesanan::where('status', 2)->get();
        $data =
            [
                'title' => 'Pesanan Dibayar',
            ];
        return view('admin.pesanan.dibayar.index', compact('pesanans'), $data);
    }
    public function proses_pesanan($id)
    {
        $pesanan = Pesanan::find($id);
        $data =
            [
                'title' => 'Proses Pesanan',
                'user' => User::find($pesanan->user_id),
                'pesanan_details' => PesananDetail::where('pesanan_id', $id)->get(),
            ];
        return view('admin.pesanan.dibayar.proses_pesanan', compact('pesanan'), $data);
    }
    public function kirim_pesanan($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 3;
        $pesanan->updated_at = now();
        $pesanan->save();
        return redirect('/admin/pesanan-dikirim')->with('success', 'Pesanan berhasil dikirim');
    }

    //Pesanan Dikirim
    public function dikirim()
    {
        $pesanans = Pesanan::where('status', 3)->get();
        $data =
            [
                'title' => 'Pesanan Dikirim',
            ];
        return view('admin.pesanan.dikirim.index', compact('pesanans'), $data);
    }
    public function detail_dikirim($id)
    {
        $pesanan = Pesanan::find($id);
        $user = User::find($pesanan->user_id);
        $pesanan_details = PesananDetail::where('pesanan_id', $id)->get();
        $data =
            [
                'title' => 'Detail Pesanan',
            ];
        return view('admin.pesanan.dikirim.detail', compact('pesanan', 'pesanan_details', 'user'), $data);
    }

    //Pesanan Selesai
    public function selesai()
    {
        $pesanans = Pesanan::where('status', 4)->get();
        $data =
            [
                'title' => 'Pesanan Selesai',
            ];
        return view('admin.pesanan.selesai.index', compact('pesanans'), $data);
    }
    public function detail_pesanan($id)
    {
        $pesanan = Pesanan::find($id);
        $user = User::find($pesanan->user_id);
        $pesanan_details = PesananDetail::where('pesanan_id', $id)->get();
        $data =
            [
                'title' => 'Detail Pesanan',
            ];
        return view('admin.pesanan.selesai.detail', compact('pesanan', 'pesanan_details', 'user'), $data);
    }
}
