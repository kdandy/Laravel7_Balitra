<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Peneliti extends Model
{
    use Uuid;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penelitian()
    {
        return $this->hasMany(Penelitian::class);
    }
}
