<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\User;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index()
    {
        $checkins = CheckIn::with('user')->latest()->take(50)->get();
        return view('check-ins.index', compact('checkins'));
    }

    public function create()
    {
        $members = User::where('role', 'member')->get();
        return view('check-ins.create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        CheckIn::create([
            'user_id' => $validated['user_id'],
            'checked_at' => now(),
        ]);

        return redirect()->route('check-ins.index')->with('success', 'Member checked in successfully.');
    }
}
