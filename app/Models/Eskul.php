<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;
    protected  $fillable = ['name'];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
