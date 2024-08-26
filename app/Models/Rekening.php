<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';

    protected $fillable = [
        'id_nasabah',
        'no_rekening',
        'saldo',
        'status',
        'id_kantor_cabang',
        'id_user',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class, 'id_kantor_cabang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
