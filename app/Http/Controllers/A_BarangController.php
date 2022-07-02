<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\File;

class A_BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Barang'
        ];
        return view('admin.barang.add', $data);
    }

    public function store(Request $request)
    {
        //validasi form
        $this->validate($request, [
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // menangkap file -> merubah nama file -> menyimpan file ke folder public/uploads
        $file = $request->file('gambar');
        $nama_gambar = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads', $nama_gambar);

        //tambah data ke tabel barang
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;
        $barang->gambar = $nama_gambar;
        $barang->save();
        return redirect('admin/barang')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function list()
    {
        $data = [
            'title' => 'List Barang',
        ];

        $barangs = Barang::all();
        return view('admin.barang.list', compact('barangs'), $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Barang',
        ];

        $barangs = Barang::find($id);
        return view('admin.barang.edit', compact('barangs'), $data);
    }

    public function update($id, Request $request)
    {
        //validasi form
        $this->validate($request, [
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $barang = Barang::find($id);

        // cek jika ada file yang diupload | Jika tidak akan langsung mengupdate data tanpa mengubah file
        if ($request->hasFile('gambar')) {
            File::delete('uploads/' . $barang->gambar);
            $file = $request->file('gambar');
            $nama_gambar = $barang->gambar;
            $file->move('uploads', $nama_gambar);
        }

        // mengupdate data ke tabel barang
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;
        $barang->gambar = $barang->gambar;
        $barang->save();
        return redirect('admin/barang')->with('success', 'Data Berhasil Diubah');
    }
    public function delete($id)
    {
        $barang = Barang::find($id);
        File::delete('uploads/' . $barang->gambar);
        $barang->delete();
        return redirect('admin/barang')->with('success', 'Data Berhasil Dihapus');
    }
}
