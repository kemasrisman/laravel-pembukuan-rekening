<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorCabang extends Model
{
    use HasFactory;

    protected $table = 'kantor_cabang';

    protected $fillable = [
        'nama',
        'alamat',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_kc');
    }

}
