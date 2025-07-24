<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrats = Contrat::all();
        return Inertia::render('Contrats/Index', [
            'contrats' => $contrats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Contrats/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:active,expired',
            'user_id' => 'required|exists:users,id',
        ]);

        Contrat::create($request->all());

        return redirect()->route('contrats.index')->with('success', 'Contrat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrat $contrat)
    {
        return Inertia::render('Contrats/Show', [
            'contrat' => $contrat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrat $contrat)
    {
        return Inertia::render('Contrats/Edit', [
            'contrat' => $contrat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrat $contrat)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:active,expired',
            'user_id' => 'required|exists:users,id',
        ]);

        $contrat->update($request->all());

        return redirect()->route('contrats.index')->with('success', 'Contrat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrat $contrat)
    {
        $contrat->delete();

        return redirect()->route('contrats.index')->with('success', 'Contrat deleted successfully.');
    }
}
