<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return redirect()->route('login');
    }

    public function tables()
    {
        return view('dashboard.tables');
    }
}
