<?php

namespace App\Http\Controllers;

use App\Models\Pent;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PentController extends Controller
{
    public function index()
    {
        $pents = Pent::with('user')->latest()->paginate(2);
        return view('pents.index', compact('pents'));
    }

    public function create()
    {
        return view('pents.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'pent_length' => 'required|numeric',
            'waist' => 'required|numeric',
            'hips' => 'required|numeric',
            'inseam' => 'required|numeric',
            'pensa' => 'required|numeric',
            'pocket_type' => 'required|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Pent::create($validated);

        return redirect()->route('pents.index')
            ->with('success', 'Pent created successfully.');
    }

    public function show(Pent $pent)
    {
        return view('pents.show', compact('pent'));
    }

    public function edit(Pent $pent)
    {
        return view('pents.edit', compact('pent'));
    }

    public function update(Request $request, Pent $pent)
    {
        $validated = $request->validate([
            'pent_length' => 'required|numeric',
            'waist' => 'required|numeric',
            'hips' => 'required|numeric',
            'inseam' => 'required|numeric',
            'pensa' => 'required|numeric',
            'pocket_type' => 'required|string|max:255',
        ]);

        $pent->update($validated);

        return redirect()->route('pents.index')
            ->with('success', 'Pent updated successfully.');
    }

    public function destroy(Pent $pent)
    {
        $pent->delete();

        return redirect()->route('pents.index')
            ->with('success', 'Pent deleted successfully.');
    }
}
