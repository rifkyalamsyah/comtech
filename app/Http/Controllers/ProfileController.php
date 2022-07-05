<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isMember');
    }

    public function index()
    {
        $data =
            [
                'title' => 'Profile',
            ];
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'), $data);
    }


    public function update(Request $request)
    {
        // dd($request);


        $this->validate($request, [
            'password' => 'confirmed'
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        // validasi
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        // sweet alert
        Alert::success('Success', 'Data Berhasil di Update');
        return redirect('profile');
    }
}
