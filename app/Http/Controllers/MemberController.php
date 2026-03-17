<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'member')->with('membership.package')->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('members.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make('password123'), // Default password
            'role' => 'member',
            'status' => 1,
        ]);

        $package = Package::find($validated['package_id']);
        $user->membership()->create([
            'package_id' => $package->id,
            'start_date' => $validated['start_date'],
            'end_date' => \Carbon\Carbon::parse($validated['start_date'])->addDays($package->duration_days),
            'status' => 'active',
        ]);

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
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
    public function edit(User $member)
    {
        $packages = Package::all();
        $member->load('membership');
        return view('members.edit', compact('member', 'packages'));
    }

    public function update(Request $request, User $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $member->id,
            'phone' => 'nullable|string|max:20',
            'package_id' => 'required|exists:packages,id',
            'status' => 'required|boolean',
        ]);

        $member->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'status' => $validated['status'],
        ]);

        $package = Package::find($validated['package_id']);
        
        // Update or create membership
        $member->membership()->updateOrCreate(
            ['user_id' => $member->id],
            [
                'package_id' => $package->id,
                'end_date' => $member->membership->start_date->addDays($package->duration_days),
                'status' => $validated['status'] ? 'active' : 'inactive',
            ]
        );

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(User $member)
    {
        $member->membership()->delete();
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
