<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Organination;

class dataController extends Controller
{
    //
    public function index()
    {
        $mahasiswaCount = Mahasiswa::count();
        $dosenCount = Dosen::count();
        $OrganinationCount = Organination::count();
        $departmentsCount = Department::count();

        return view('data.dataLaporan', compact('mahasiswaCount', 'dosenCount', 'OrganinationCount', 'departmentsCount'));
    }
}
