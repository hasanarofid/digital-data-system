<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Payment;
use App\Models\CheckIn;
use App\Models\GymClass;
 
class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->isMember()) {
            return redirect()->route('member.dashboard');
        }

        $stats = [
            'members_count' => User::where('role', 'member')->count(),
            'revenue' => Payment::where('status', 'paid')->sum('amount'),
            'checkins_today' => CheckIn::whereDate('checked_at', today())->count(),
            'active_classes' => GymClass::where('day_of_week', now()->format('l'))->count(),
        ];

        $recentCheckins = CheckIn::with('user')->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentCheckins'));
    }
}
