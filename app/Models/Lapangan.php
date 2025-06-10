<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'harga_per_jam'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}