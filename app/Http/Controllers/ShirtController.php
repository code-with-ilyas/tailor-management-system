<?php

namespace App\Http\Controllers;

use App\Models\Shirt;
use App\Models\User;
use Illuminate\Http\Request;

class ShirtController extends Controller
{
    public function index()
    {
        $shirts = Shirt::with('user')->latest()->paginate(3);
        return view('shirts.index', compact('shirts'));
    }

    public function create()
    {
        $users = User::all();
        return view('shirts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'length' => 'required|numeric',
            'shoulder' => 'required|numeric',
            'sleeve' => 'required|numeric',
            'chest' => 'required|numeric',
            'collar' => 'required|numeric',
            'collar_type' => 'required|string|in:regular,button-down,spread,wingtip,mandarin',
            'waist' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        Shirt::create($validated);

        return redirect()->route('shirts.index')
            ->with('success', 'Measurement added successfully.');
    }

    public function show(Shirt $shirt)
    {
        return view('shirts.show', compact('shirt'));
    }

    public function edit(Shirt $shirt)
    {
        $users = User::all();
        return view('shirts.edit', compact('shirt', 'users'));
    }

    public function update(Request $request, Shirt $shirt)
    {
        $validated = $request->validate([
            'length' => 'required|numeric',
            'shoulder' => 'required|numeric',
            'sleeve' => 'required|numeric',
            'chest' => 'required|numeric',
            'collar' => 'required|numeric',
            'collar_type' => 'required|string|in:regular,button-down,spread,wingtip,mandarin',
            'waist' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $shirt->update($validated);

        return redirect()->route('shirts.index')
            ->with('success', 'Shirt updated successfully.');
    }

    public function destroy(Shirt $shirt)
    {
        $shirt->delete();
        return redirect()->route('shirts.index')
            ->with('success', 'Shirt deleted successfully.');
    }
}