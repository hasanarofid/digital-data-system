<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        Trainer::create($validated);

        return redirect()->route('trainers.index')->with('success', 'Trainer added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $trainer->update($validated);

        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
    }

    public function destroy(Trainer $trainer)
    {
        // Handle deletion - might need to check for existing classes
        $trainer->delete();
        return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}
