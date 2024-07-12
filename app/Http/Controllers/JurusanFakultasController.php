<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class JurusanFakultasController extends Controller
{
    public function index()
    {
        $Department = Department::all();
        return view('jurusan_fakultas.index', compact('Department'));
    }

    public function create()
    {
        return view('jurusan_fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:departments', // Tambahkan aturan unique
        ]);

        Department::create($request->all());

        return redirect()->route('jurusan_fakultas.index')
            ->with('success', 'Jurusan Fakultas berhasil dibuat.');
    }

    public function show(Department $Department)
    {
        return view('jurusan_fakultas.show', compact('Department'));
    }

    public function edit($id)
    {
        $Department = Department::findOrFail($id);
        return view('jurusan_fakultas.edit', compact('Department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:departments,nama,' . $id, // Tambahkan aturan unique
        ]);

        $Department = Department::findOrFail($id);
        $Department->update($request->all());

        return redirect()->route('jurusan_fakultas.index')
            ->with('success', 'Jurusan Fakultas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $Department = Department::findOrFail($id);
        // Hapus semua mahasiswa yang terkait dengan department ini
        $Department->mahasiswas()->delete();
        // Hapus department
        $Department->delete();
    
        return redirect()->route('jurusan_fakultas.index')
            ->with('success', 'Jurusan Fakultas berhasil dihapus.');
    }
}
