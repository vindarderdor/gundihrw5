<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelurahanProfile extends Model
{
    protected $fillable = ['deskripsi', 'visi', 'misi', 'logo', 'alamat_kantor', 'kontak', 'peta_embed'];
}
