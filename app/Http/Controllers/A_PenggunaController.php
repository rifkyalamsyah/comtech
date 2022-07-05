<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class A_PenggunaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    // Admin Controller

    public function admin()
    {
        $data = [
            'title' => 'Daftar Admin',
        ];
        $users = User::where('is_admin', true)->get();

        return view('admin.pengguna.admin.index', compact('users'), $data);
    }


    public function tambah_admin()
    {
        $data = [
            'title' => 'Tambah Admin',
        ];

        return view('admin.pengguna.admin.tambah', $data);
    }


    public function add_admin()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = [
            'name' => request('name'),
            'email' => request('email'),
            'no_hp' => request('no_hp'),
            'password' => bcrypt(request('password')),
            'is_admin' => true,
        ];

        User::create($user);

        // sweet alert
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('admin/list-admin');
    }


    public function edit_admin()
    {
        $data = [
            'title' => 'Edit Admin',
        ];
        $user = User::find(request('id'));
        return view('admin.pengguna.admin.edit', compact('user'), $data);
    }

    public function update_admin($id, Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $id,
            'no_hp' => 'required|string|max:255',
        ]);

        //if condition for input password
        if (request('password') == '') {
            $user = User::find($id);
            $user->name = request('name');
            $user->email = request('email');
            $user->no_hp = request('no_hp');
            $user->save();
        } else {
            //validasi input password
            $this->validate(request(), [
                'password' => 'required|string|min:8',
            ]);
            $user = User::find($id);
            $user->name = request('name');
            $user->email = request('email');
            $user->no_hp = request('no_hp');
            $user->password = bcrypt(request('password'));
            $user->save();
        }

        // sweet alert
        Alert::success('Success', 'Data berhasil diupdate');
        return redirect('admin/list-admin');
    }


    public function delete_admin()
    {
        $user = User::find(request('id'));
        $user->delete();

        // sweet alert
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect('admin/list-admin')->with('success', 'Admin berhasil dihapus');
    }


    //Member Controller

    public function member()
    {
        $data = [
            'title' => 'Daftar Member',
        ];
        $users = User::where('is_admin', false)->get();

        return view('admin.pengguna.member.index', compact('users'), $data);
    }


    public function delete_member()
    {
        $user = User::find(request('id'));
        $user->delete();

        // sweet alert
        Alert::success('Delete', 'Data Berhasil Dihapus');
        return redirect('admin/list-member');
    }
}
