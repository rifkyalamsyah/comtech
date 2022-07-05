<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;


class A_DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        $totalbarang = Barang::count();
        $totaluser = User::count();
        $totalpesanan = Pesanan::count();
        return view('admin.dashboard.index', compact('totalbarang', 'totaluser', 'totalpesanan'), $data);
    }
}
