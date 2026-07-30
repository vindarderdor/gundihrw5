<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['nama_pengirim', 'email', 'isi_pesan', 'status_dibaca'];
}
