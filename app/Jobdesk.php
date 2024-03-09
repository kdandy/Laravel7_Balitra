<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Jobdesk extends Model
{
    use Uuid;

    protected $fillable = [
        'penelitian_id', 'uraian', 'batas_pengerjaan',
    ];

    public function penelitian()
    {
        return $this->belongsTo(Penelitian::class);
    }

    public function jobdesk_peneliti()
    {
        return $this->hasOne(Jobdesk_peneliti::class);
    }

}
