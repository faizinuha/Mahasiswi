<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Department;
use App\Models\Organination; // Pastikan ini sesuai dengan nama model yang benar
use App\Models\Eskul; // Tambahkan model Eskul
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('department', 'organination', 'eskul')->get(); // Perbaiki penulisan relasi Eskul
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $departments = Department::all();
        $organinations = Organination::all();
        $eskuls = Eskul::all(); // Tambahkan Eskul pada create
        return view('mahasiswa.create', compact('departments', 'organinations', 'eskuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20|unique:mahasiswas|regex:/^[0-9]+$/', // Pastikan nomor telepon hanya terdiri dari angka dan tidak negatif
            'department_id' => 'required',
            'organination_id' => 'required',
            'eskul_id' => 'nullable' // Eskul bisa null

             // department_id => 'nullable
            // organination_id => 'nullable
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
        $eskuls = Eskul::all(); // Tambahkan Eskul pada edit
        return view('mahasiswa.edit', compact('mahasiswa', 'departments', 'organinations', 'eskuls'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20|unique:mahasiswas,no_telp,' . $mahasiswa->id . '|regex:/^[0-9]+$/', // Pastikan nomor telepon hanya terdiri dari angka dan tidak negatif
            'department_id' => 'required',
            'organination_id' => 'required',
            'eskul_id' => 'nullable' // Eskul bisa null

            // department_id => 'nullable
            // organination_id => 'nullable
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
