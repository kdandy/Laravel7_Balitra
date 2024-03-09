<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use Uuid;

    protected $fillable = [
        'objek_penilaian',
    ];

    public function hasil_penilaian()
    {
        return $this->hasMany(Hasil_penilaian::class);
    }
}
