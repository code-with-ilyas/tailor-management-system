<?php

namespace App\Http\Controllers;

use App\Models\Waistcoat;
use Illuminate\Http\Request;

class WaistcoatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $waistcoats = Waistcoat::latest()->paginate(3);
        return view('waistcoats.index', compact('waistcoats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('waistcoats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'length' => 'required|numeric|min:0',
            'waist' => 'required|numeric|min:0',
            'chest' => 'required|numeric|min:0',
            'shoulder' => 'required|numeric|min:0',
            'pocket_type' => 'required|string|max:255',
            
        ]);

        $validated['user_id'] = auth()->id();

        Waistcoat::create($validated);

        return redirect()->route('waistcoats.index')
            ->with('success', 'Waistcoat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Waistcoat $waistcoat)
    {
        return view('waistcoats.show', compact('waistcoat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Waistcoat $waistcoat)
    {
        return view('waistcoats.edit', compact('waistcoat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Waistcoat $waistcoat)
    {
        $validated = $request->validate([
            'length' => 'required|numeric|min:0',
            'waist' => 'required|numeric|min:0',
            'chest' => 'required|numeric|min:0',
            'shoulder' => 'required|numeric|min:0',
            'pocket_type' => 'required|string|max:255',
            
        ]);

        $waistcoat->update($validated);

        return redirect()->route('waistcoats.index')
            ->with('success', 'Waistcoat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Waistcoat $waistcoat)
    {
        $waistcoat->delete();

        return redirect()->route('waistcoats.index')
            ->with('success', 'Waistcoat deleted successfully');
    }
}