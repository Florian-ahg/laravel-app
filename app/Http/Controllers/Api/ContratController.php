<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrats = Contrat::all();
        
        return response()->json([
            'success' => true,
            'data' => $contrats,
            'message' => 'Contrats retrieved successfully.',
        ]);
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

        $contrat = Contrat::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Contrat created successfully.',
            'data' => $contrat,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrat $contrat)
    {
        return response()->json([
            'success' => true,
            'data' => $contrat,
            'message' => 'Contrat retrieved successfully.',
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

        return response()->json([
            'success' => true,
            'message' => 'Contrat updated successfully.',
            'data' => $contrat,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrat $contrat)
    {
        $contrat->delete();

        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Contrat deleted successfully.',
        ]);
    }
}
