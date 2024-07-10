<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function organination()
    {
        return $this->belongsTo(Organination::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    // public function eskuls()
    // {
    //     return $this->belongTo(eskul::class);
    // }
}
