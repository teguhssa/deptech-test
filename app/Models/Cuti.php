<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'alasan_cuti',
        'mulai_cuti',
        'selesai_cuti',
    ];
}
