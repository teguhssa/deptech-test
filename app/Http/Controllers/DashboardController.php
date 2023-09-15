<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // menampilkan halaman dashboard
    public function index()
    {
        $title = 'Halaman Dashboard';

        return view("dashboard.index", compact('title'));
    }
}
