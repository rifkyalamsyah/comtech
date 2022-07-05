<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Comtech - Home'
        ];
        return view('landing', $data);
    }
}
