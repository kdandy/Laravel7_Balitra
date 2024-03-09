<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Jobdesk_peneliti extends Model
{
    use Uuid;

    protected $fillable = [
        'jobdesk_id', 'uraian',
    ];

    public function jobdesk()
    {
        return $this->belongsTo(Jobdesk::class);
    }
}
