<?php

namespace App\Http\Controllers;

use App\Models\GymClass;
use App\Models\Trainer;
use Illuminate\Http\Request;

class GymClassController extends Controller
{
    public function index()
    {
        $classes = GymClass::with('trainer')->get();
        return view('gym-classes.index', compact('classes'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        return view('gym-classes.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'capacity' => 'required|integer|min:1',
        ]);

        GymClass::create($validated);

        return redirect()->route('gym-classes.index')->with('success', 'Class scheduled successfully.');
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
    public function edit(GymClass $gymClass)
    {
        $trainers = Trainer::all();
        return view('gym-classes.edit', compact('gymClass', 'trainers'));
    }

    public function update(Request $request, GymClass $gymClass)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'capacity' => 'required|integer|min:1',
        ]);

        $gymClass->update($validated);

        return redirect()->route('gym-classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(GymClass $gymClass)
    {
        $gymClass->delete();
        return redirect()->route('gym-classes.index')->with('success', 'Class deleted successfully.');
    }
}
