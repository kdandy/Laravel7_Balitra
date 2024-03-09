<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use Uuid;

    protected $fillable = [
        'judul', 'isi',
    ];

}
