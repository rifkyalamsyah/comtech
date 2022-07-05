<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isMember');
    }


    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        $data =
            [
                'produk' => $barang->nama_barang
            ];
        return view('pesan.index', compact('barang'), $data);
    }


    public function pesan(Request $request, $id)
    {
        // dd($request);

        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        // validasi apakah melebihi stok
        if ($request->jumlah_pesan > $barang->stok) {

            Alert::warning('Warning', 'Jumlah pesanan melebihi jumlah stok');
            return redirect('pesan/' . $id);
        }

        // cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (empty($cek_pesanan)) {
            // simpan ke database pesanan
            $pesanan = new Pesanan();

            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }

        // simpan ke database pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail();
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            // harga sekarang
            $haraga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $haraga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();

        Alert::success('Success', 'Pesanan Berhasil Masuk Keranjang');
        return redirect('check-out');
    }


    public function check_out()
    {
        $data =
            [
                'title' => 'Check Out'
            ];
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // validasi
        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('pesan.check_out', compact('pesanan', 'pesanan_details'), $data);
        } else {
            Alert::warning('Pesanan Kosong', 'Anda Belum Memesan Barang');
            return view('pesan.check_out', compact('pesanan'), $data);
        }
    }


    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        // sweet alert
        Alert::error('Delete', 'Pesanan Berhasil Dihapus');
        return redirect('check-out');
    }


    public function konfirmasi()
    {
        // validasi
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->no_hp)) {
            Alert::warning('Warning', 'Harap Lengkapi Identitas Anda');
            return redirect('profile');
        }

        if (empty($user->alamat)) {
            Alert::warning('Warning', 'Harap Lengkapi Identitas Anda');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok - $pesanan_detail->jumlah;
            $barang->update();
        }

        // sweet alert
        Alert::success('Success', 'Pesanan Berhasil Check Out');
        return redirect('history/' . $pesanan_id);
    }

    
    public function pesan_diterima($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 4;
        $pesanan->updated_at = Carbon::now();
        $pesanan->save();

        // sweet alert
        Alert::success('Success', 'Pesanan Berhasil Diterima');
        return redirect('history');
    }
}
