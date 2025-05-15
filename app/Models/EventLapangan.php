<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventLapangan extends Model
{
    //
    protected $fillable = [
        'nama_organizer',
        'tanggal_event',
        'gambar_event',
        'deskripsi_event',
    ];
}
