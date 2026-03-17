<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GymClass;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
 
class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('gymClass.trainer')
            ->latest()
            ->paginate(10);

        return view('member.bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $gymClass = GymClass::findOrFail($request->gym_class_id);

        // Check if already booked
        $exists = Booking::where('user_id', Auth::id())
            ->where('gym_class_id', $gymClass->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already booked this class.');
        }

        // Check capacity (simple check)
        if ($gymClass->bookings()->count() >= $gymClass->capacity) {
            return back()->with('error', 'This class is full.');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'gym_class_id' => $gymClass->id,
            'booking_date' => now(),
            'status' => 'confirmed',
        ]);

        return back()->with('success', 'Spot booked successfully! See you in class.');
    }
}
