<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'alamat_dosen' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20|unique:dosens,no_telp',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dosen = new Dosen([
            'nama_dosen' => $request->get('nama_dosen'),
            'alamat_dosen' => $request->get('alamat_dosen'),
            'no_telp' => $request->get('no_telp'),
            'foto_dosen' => $request->file('foto_dosen') ? $request->file('foto_dosen')->store('images', 'public') : null,
        ]);

        $dosen->save();

        return redirect()->route('dosens.index')->with('success', 'Dosen created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('dosens.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'alamat_dosen' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20|unique:dosens,no_telp,' . $dosen->id,
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dosen->nama_dosen = $request->get('nama_dosen');
        $dosen->alamat_dosen = $request->get('alamat_dosen');
        $dosen->no_telp = $request->get('no_telp');

        if ($request->file('foto_dosen')) {
            // Menghapus foto lama jika ada
            if ($dosen->foto_dosen) {
                Storage::disk('public')->delete($dosen->foto_dosen);
            }
            $dosen->foto_dosen = $request->file('foto_dosen')->store('images', 'public');
        }

        $dosen->save();

        return redirect()->route('dosens.index')->with('success', 'Dosen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        if ($dosen->foto_dosen) {
            Storage::disk('public')->delete($dosen->foto_dosen);
        }

        $dosen->delete();

        return redirect()->route('dosens.index')->with('success', 'Dosen deleted successfully.');
    }
}
