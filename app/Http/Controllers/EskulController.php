<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eskul;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data Eskul
        $eskuls = Eskul::all();
        return view('eskuls.index', compact('eskuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat Eskul baru
        return view('eskuls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi dan simpan data Eskul baru
        $request->validate([
            'name' => 'required|string|max:255|unique:eskuls', // Tambahkan aturan unique
        ]);

        Eskul::create($request->all());
        return redirect()->route('eskuls.index')
            ->with('success', 'Eskul berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eskul $eskul)
    {
        // Menampilkan detail Eskul
        return view('eskuls.show', compact('eskul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eskul $eskul)
    {
        // Menampilkan form untuk mengedit Eskul
        return view('eskuls.edit', compact('eskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eskul $eskul)
    {
        // Validasi dan update data Eskul
        $request->validate([
            'name' => 'required|string|max:255|unique:eskuls,name,' . $eskul->id, // Tambahkan aturan unique
        ]);

        $eskul->update($request->all());
        return redirect()->route('eskuls.index')
            ->with('success', 'Eskul berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eskul $eskul)
    {
        // Hapus data Eskul
        $eskul->delete();
        
        return redirect()->route('eskuls.index')
            ->with('success', 'Eskul berhasil dihapus.');
    }
}
