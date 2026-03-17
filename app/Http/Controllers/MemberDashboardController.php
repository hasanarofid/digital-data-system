<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\GymClass;
use App\Models\Membership;
use App\Models\Booking;
 
class MemberDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $membership = $user->membership()->with('package')->first();
        
        $activeClasses = GymClass::with('trainer')
            ->where('status', 'scheduled')
            ->latest()
            ->take(3)
            ->get();
            
        $myBookings = Booking::where('user_id', $user->id)
            ->with('gymClass.trainer')
            ->latest()
            ->take(5)
            ->get();

        return view('member.dashboard', compact('user', 'membership', 'activeClasses', 'myBookings'));
    }
}
