<?php

namespace App\Http\Controllers;

use App\Models\ShalwarKameez;
use Illuminate\Http\Request;

class ShalwarKameezController extends Controller
{
    public function index()
    {
        $measurements = ShalwarKameez::where('user_id', auth()->id())->paginate(2);
        return view('shalwar-kameez.index', compact('measurements'));
    }

    public function create()
    {
        return view('shalwar-kameez.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'length' => 'required|numeric',
            'collar' => 'required|string',
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

        $validated['user_id'] = auth()->id();

        ShalwarKameez::create($validated);

        return redirect()->route('shalwar-kameez.index')->with('success', 'Measurement saved successfully!');
    }

    public function show(ShalwarKameez $shalwarKameez)
    {
        return view('shalwar-kameez.show', compact('shalwarKameez'));
    }

    public function edit(ShalwarKameez $shalwarKameez)
    {
        return view('shalwar-kameez.edit', compact('shalwarKameez'));
    }

    public function update(Request $request, ShalwarKameez $shalwarKameez)
    {
        $validated = $request->validate([
            'length' => 'required|numeric',
            'collar' => 'required|string',
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

        $shalwarKameez->update($validated);

        return redirect()->route('shalwar-kameez.index')->with('success', 'Measurement updated successfully!');
    }

    public function destroy(ShalwarKameez $shalwarKameez)
    {
        $shalwarKameez->delete();

        return redirect()->route('shalwar-kameez.index')->with('success', 'Measurement deleted successfully!');
    }
}
