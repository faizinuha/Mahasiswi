<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Department;
use App\Models\Organination; // Pastikan ini sesuai dengan nama model yang benar
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('department', 'organination')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $departments = Department::all();
        $organinations = Organination::all();
        return view('mahasiswa.create', compact('departments', 'organinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'department_id' => 'required',
            'organination_id' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa berhasil dibuat.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $departments = Department::all();
        $organinations = Organination::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'departments', 'organinations'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'department_id' => 'required',
            'organination_id' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
