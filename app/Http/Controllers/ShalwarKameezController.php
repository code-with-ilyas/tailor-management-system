<?php

namespace App\Http\Controllers;

use App\Models\ShalwarKameez;
use Illuminate\Http\Request;

class ShalwarKameezController extends Controller
{
    public function index()
    {
        // Get the measurements for the authenticated user
        $measurements = ShalwarKameez::where('user_id', auth()->id())->get();
        return view('shalwar-kameez.index', compact('measurements'));
    }

    public function create()
    {
        // Show the create form
        return view('shalwar-kameez.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'length' => 'required|numeric',
            'collar' => 'required|numeric',
            'shoulder' => 'required|numeric',
            'back_type' => 'required|string',
            'back' => 'required|numeric',
            'cuff_type' => 'required|string',
            'sleeves' => 'required|numeric',
            'chest' => 'required|numeric',
            'bottom_collar_type' => 'required|string',
            'shalwar_type' => 'required|string',
            'pensa' => 'required|numeric',
            'pocket_type' => 'required|string',
            'bottom_type' => 'required|string',
            'bottom' => 'required|numeric',
        ]);

        // Add user_id to the validated data
        $validated['user_id'] = auth()->id();

        // Create a new ShalwarKameez record
        ShalwarKameez::create($validated);

        return redirect()->route('shalwar-kameez.index')->with('success', 'Measurement saved successfully!');
    }

    public function show(ShalwarKameez $shalwarKameez)
    {
        // Show the details of the ShalwarKameez record
        return view('shalwar-kameez.show', compact('shalwarKameez'));
    }

    public function edit(ShalwarKameez $shalwarKameez)
    {
        // Show the edit form for the ShalwarKameez record
        return view('shalwar-kameez.edit', compact('shalwarKameez'));
    }

    public function update(Request $request, ShalwarKameez $shalwarKameez)
    {
        // Validate the request data
        $validated = $request->validate([
            'length' => 'required|numeric',
            'collar' => 'required|numeric',
            'shoulder' => 'required|numeric',
            'back_type' => 'required|string',
            'back' => 'required|numeric',
            'cuff_type' => 'required|string',
            'sleeves' => 'required|numeric',
            'chest' => 'required|numeric',
            'bottom_collar_type' => 'required|string',
            'shalwar_type' => 'required|string',
            'pensa' => 'required|numeric',
            'pocket_type' => 'required|string',
            'bottom_type' => 'required|string',
            'bottom' => 'required|numeric',
        ]);

        // Update the ShalwarKameez record
        $shalwarKameez->update($validated);

        return redirect()->route('shalwar-kameez.index')->with('success', 'Measurement updated successfully!');
    }

    public function destroy(ShalwarKameez $shalwarKameez)
    {
        // Delete the ShalwarKameez record
        $shalwarKameez->delete();

        return redirect()->route('shalwar-kameez.index')->with('success', 'Measurement deleted successfully!');
    }
}
