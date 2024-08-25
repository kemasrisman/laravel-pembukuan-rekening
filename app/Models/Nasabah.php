<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $fillable = [
        'nama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'nama_jalan',
        'rt',
        'rw',
        'id_user',
        'status',
        'id_kc',
        'id_pekerjaan',
        'approved_by',
    ];

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class, 'id_kc');
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function rekening()
    {
        return $this->hasOne(Rekening::class, 'id_nasabah');
    }
}
