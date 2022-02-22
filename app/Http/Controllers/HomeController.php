<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function showSuccessPage() {

        return view('success');
    }
}
