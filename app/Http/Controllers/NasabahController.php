<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNasabahRequest;
use App\Models\Nasabah;
use App\Models\Pekerjaan;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NasabahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // nasabah yang id kc nya sama dengan id user
            $data = Nasabah::where('id_kc', auth()->user()->id_kc)->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('admin.pages.pembukaan-rekening.index');
    }

    public function create()
    {
        $pekerjaan = Pekerjaan::all();
        return view('admin.pages.pembukaan-rekening.create', compact('pekerjaan'));
    }

    public function store(CreateNasabahRequest $request)
    {
        // dd($request->all());
        $nasabah = Nasabah::create([
            'nama' => $request->nama,
            // 'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nama_jalan' => $request->nama_jalan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'id_user' => auth()->id(),
            'id_kc' => auth()->user()->id_kc,
            'id_pekerjaan' => $request->id_pekerjaan,
            'approved_by' => null,
        ]);

        return redirect()->route('nasabah.list')->with('success', 'Nasabah berhasil ditambahkan');
    }
}
