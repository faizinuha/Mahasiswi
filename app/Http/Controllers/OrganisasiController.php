<?php

namespace App\Http\Controllers;

use App\Models\Organination;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisations = Organination::all();
        return view('organisations.index', compact('organisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organisations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Organination::create($request->all());
        return redirect()->route('organisations.index')
            ->with('success', 'Organisasi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organination $organisasi)
    {
        return view('organisations.show', compact('organisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organination $organisasi)
    {
        return view('organisations.edit', compact('organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organination $organisasi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $organisasi->update($request->all());
        return redirect()->route('organisations.index')
            ->with('success', 'Organisasi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organination $organisasi)
    {
        $organisasi->delete();
        return redirect()->route('organisations.index')
            ->with('success', 'Organisasi berhasil dihapus.');
    }
}
