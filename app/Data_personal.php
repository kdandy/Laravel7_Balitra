<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Data_personal extends Model
{
    use Notifiable;
    use Uuid;

    protected $fillable = [
        'user_id', 'NIP', 'jabatan', 'no_hp', 'tempat_lahir', 'tanggal_lahir', 'alamat',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
