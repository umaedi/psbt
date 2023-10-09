<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mutasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'lampiran1',
        'lampiran2',
        'lampiran3',
        'lampiran4',
        'lampiran5',
        'status',
        'suratizin',
        'pesan'
    ];
}
