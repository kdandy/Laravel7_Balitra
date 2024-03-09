<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Hasil_penilaian extends Model
{
    use Uuid;

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}
