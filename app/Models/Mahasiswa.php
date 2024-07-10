<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nim', 'alamat', 'no_telp', 'department_id', 'organination_id', 'eskuls_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function organination()
    {
        return $this->belongsTo(Organination::class);
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class);
    }
}
