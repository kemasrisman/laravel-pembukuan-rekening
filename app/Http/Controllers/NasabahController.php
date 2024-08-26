<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNasabahRequest;
use App\Models\Nasabah;
use App\Models\Pekerjaan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class NasabahController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            // nasabah yang id kc nya sama dengan id user
            $data = Nasabah::where('id_kc', Auth::user()->id_kc)
                            ->orderBy('created_at', 'desc')
                            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if (Auth::user()->can('nasabah.approve')) {
                            if($row->status == 'Disetujui') {
                                return '<button type="button" class="btn btn-success" disabled>
                                            Approved
                                        </button>';
                            } else {
                                return '<button type="button" class="btn btn-success approve" data-toggle="modal" data-id-nasabah="'. $row->id .'" data-target="#staticBackdrop">
                                            Approve
                                        </button>';
                            }
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('admin.pages.pembukaan-rekening.index');
    }

    public function create()
    {
        $pekerjaan = Pekerjaan::all();
        $provinsis = Provinsi::all();

        return view('admin.pages.pembukaan-rekening.create', compact('pekerjaan', 'provinsis'));
    }

    public function store(CreateNasabahRequest $request)
    {
        $existing = Nasabah::whereRaw('LOWER(nama) = ?', [strtolower($request->input('nama'))])->first();

        if ($existing) {
            return back()->withErrors(['nama' => 'The name has already been taken.']);
        }
        $transaction = DB::transaction(function () use ($request) {
            $nasabah = Nasabah::create([
                'nama' => $request->nama,
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
                'id_kc' => Auth::user()->id_kc,
                'id_pekerjaan' => $request->id_pekerjaan,
                'approved_by' => null,
            ]);

            $nasabah->rekening()->create([
                'saldo' => $request->nominal_setor,
                'status' => 'aktif',
                'id_kantor_cabang' => Auth::user()->id_kc,
                'id_user' => auth()->id(),
                'id_nasabah' => $nasabah->id,
                'no_rekening' => rand(1000000000, 9999999999),
            ]);

            return $nasabah;
        });

        if ($transaction) {
            return redirect()->route('nasabah.list')->with('success', 'Nasabah berhasil ditambahkan');
        } else {
            Log::error('Nasabah gagal ditambahkan');
            return back()->with('error', 'Nasabah gagal ditambahkan');
        }
    }

    public function approve(Request $request)
    {
        $nasabah = Nasabah::findOrFail($request->id_nasabah);
        $nasabah->update([
            'status' => 'Disetujui',
            'approved_by' => auth()->id(),
        ]);
        
        if(!$nasabah) {
            Log::error('Nasabah gagal disetujui');
            return back()->with('error', 'Nasabah gagal disetujui');
        } else {
            return back()->with('success', 'Nasabah berhasil disetujui');
        }
    }
}
