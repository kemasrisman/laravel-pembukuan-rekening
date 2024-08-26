<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('id_kc', Auth::user()->id_kc)->count();
        $totalNasabah = Nasabah::where('id_kc', Auth::user()->id_kc)->count();

        return view('admin.pages.beranda', compact('totalUsers', 'totalNasabah'));
    }
}
