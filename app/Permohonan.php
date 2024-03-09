<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use Uuid;

    public function objek_penelitian()
    {
        return $this->belongsTo(Objek_penelitian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
