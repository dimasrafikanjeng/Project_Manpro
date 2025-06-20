<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'nama_peserta',
        'nim',
        'keterangan',
        'kelompok_id',
        'mentor_id',
    ];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}
