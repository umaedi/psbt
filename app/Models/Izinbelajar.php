<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izinbelajar extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lampiran1',
        'lampiran2',
        'lampiran3',
        'lampiran4',
        'status',
        'suratizin',
        'pesan'
    ];
}
