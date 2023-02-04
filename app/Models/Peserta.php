<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'tlp',
        'alamat',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'desa_id',
        'kelas_id',
        'kaos_id',
    ];

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi', 'provinsi_id');
    }

    public function kota()
    {
        return $this->belongsTo('App\Models\Kota', 'kota_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'kecamatan_id');
    }

    public function desa()
    {
        return $this->belongsTo('App\Models\Desa', 'desa_id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kelas_id');
    }

    public function kaos()
    {
        return $this->belongsTo('App\Models\Kaos', 'kaos_id');
    }
}
