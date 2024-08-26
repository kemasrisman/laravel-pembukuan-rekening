<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalNasabah = Nasabah::count();

        return view('admin.pages.beranda', compact('totalUsers', 'totalNasabah'));
    }
}
