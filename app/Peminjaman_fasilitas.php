<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_fasilitas extends Model
{
    use Uuid;

    protected $fillable = [
        'peneliti_id', 'fasilitas_id', 'tujuan_peminjaman', 'tanggal_mulai', 'tanggal_selesai',
    ];

    public function peneliti()
    {
        return $this->belongsTo(Peneliti::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
