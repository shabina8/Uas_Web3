<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // protected $table = 'anggotas';
    protected $fillable = ['name', 'email', 'no_telpon'];

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class);
    }

}
