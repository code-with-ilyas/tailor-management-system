<?php

namespace App\Http\Controllers;

use App\Models\Pent;
use Illuminate\Http\Request;

class PentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pents = Pent::with('user')->latest()->paginate(5);
        return view('pents.index', compact('pents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pent_length' => 'required|string|max:255',
            'waist' => 'required|string|max:255',
            'hips' => 'required|string|max:255',
            'inseam' => 'required|string|max:255',
            'pensa' => 'required|string|max:255',
            'pocket_type' => 'required|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Pent::create($validated);

        return redirect()->route('pents.index')
            ->with('success', 'Pants created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pent $pent)
    {
        return view('pents.show', compact('pent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pent $pent)
    {
        return view('pents.edit', compact('pent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pent $pent)
    {
        $validated = $request->validate([
            'pent_length' => 'required|string|max:255',
            'waist' => 'required|string|max:255',
            'hips' => 'required|string|max:255',
            'inseam' => 'required|string|max:255',
            'pensa' => 'required|string|max:255',
            'pocket_type' => 'required|string|max:255',
        ]);

        $pent->update($validated);

        return redirect()->route('pents.index')
            ->with('success', 'Pants updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pent $pent)
    {
        $pent->delete();

        return redirect()->route('pents.index')
            ->with('success', 'Pants deleted successfully.');
    }
}