<?php

namespace App\Http\Controllers;

use App\Models\DigitalData;
use App\Models\Program;
use Illuminate\Http\Request;

use Illuminate\View\View;

class DigitalDataController extends Controller
{
    public function index(): View
    {
        $data = auth()->user()->digitalData()->with('program')->latest()->paginate(10);
        return view('digital-data.index', compact('data'));
    }

    public function create(): View
    {
        $programs = Program::all();
        return view('digital-data.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'ktp_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('ktp_photo')->store('ktp_photos', 'public');

        auth()->user()->digitalData()->create([
            'program_id' => $request->program_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'region' => $request->region,
            'occupation' => $request->occupation,
            'activity' => $request->activity,
            'ktp_photo' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('digital-data.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(DigitalData $digitalDatum): View
    {
        // Ensure user can only see their own data or is admin
        if (auth()->user()->role !== 'admin' && $digitalDatum->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('digital-data.show', ['item' => $digitalDatum]);
    }
}
