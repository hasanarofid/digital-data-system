<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberDashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        
        $stats = [
            'total' => $user->digitalData()->count(),
            'pending' => $user->digitalData()->where('status', 'pending')->count(),
            'verified' => $user->digitalData()->where('status', 'verified')->count(),
        ];

        $recentData = $user->digitalData()->with('program')->latest()->take(5)->get();

        return view('member.dashboard', compact('stats', 'recentData'));
    }
}
