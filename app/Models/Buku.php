<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = ['title', 'kategori_id', 'penulis_id', 'stock'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

   

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class);
    }

}
