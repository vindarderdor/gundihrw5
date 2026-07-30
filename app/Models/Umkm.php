<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_usaha', 'pemilik', 'deskripsi', 
        'alamat', 'no_telepon', 'jam_operasional', 'link_sosmed', 
        'foto', 'status', 'peta_embed'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
