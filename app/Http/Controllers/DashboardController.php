<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Organination;
use App\Models\Department;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaCount = Mahasiswa::count();
        $dosenCount = Dosen::count();
        $OrganinationCount = Organination::count();
        $departmentsCount = Department::count();

        return view('dashboard', compact('mahasiswaCount', 'dosenCount', 'OrganinationCount', 'departmentsCount'));
    }
}
