<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Hasil_penelitian extends Model
{
    use Uuid;

    protected $fillable = [
        'judul', 'penelitian_id',
    ];

    public function penelitian()
    {
        return $this->belongsTo(Penelitian::class);
    }


}
