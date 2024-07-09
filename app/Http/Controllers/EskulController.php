<?php
// app/Http/Controllers/EskulController.php

namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    /**
     * Menampilkan daftar eskul.
     */
    public function index()
    {
        $eskuls = Eskul::all();
        return view('eskuls.index', compact('eskuls'));
    }

    /**
     * Menampilkan formulir untuk membuat eskul baru.
     */
    public function create()
    {
        return view('eskuls.create');
    }

    /**
     * Menyimpan eskul baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Eskul::create($request->all());
        return redirect()->route('eskuls.index')->with('success', 'Eskul berhasil dibuat.');
    }

    /**
     * Menampilkan detail eskul.
     */
    public function show(Eskul $eskul)
    {
        return view('eskuls.show', compact('eskul'));
    }

    /**
     * Menampilkan formulir untuk mengedit eskul.
     */
    public function edit(Eskul $eskul)
    {
        return view('eskuls.edit', compact('eskul'));
    }

    /**
     * Memperbarui eskul di dalam database.
     */
    public function update(Request $request, Eskul $eskul)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $eskul->update($request->all());
        return redirect()->route('eskuls.index')->with('success', 'Eskul berhasil diperbarui.');
    }

    /**
     * Menghapus eskul dari database.
     */
    public function destroy(Eskul $eskul)
    {
        $eskul->delete();
        return redirect()->route('eskuls.index')->with('success', 'Eskul berhasil dihapus.');
    }
}
