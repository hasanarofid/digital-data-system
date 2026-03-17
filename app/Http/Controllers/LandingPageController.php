<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\GymClass;
use App\Models\Trainer;
use App\Models\Package;
 
class LandingPageController extends Controller
{
    public function index()
    {
        $stats = [
            'members' => User::where('role', 'member')->count(),
            'classes' => GymClass::count(),
            'trainers' => Trainer::count(),
        ];

        $packages = Package::where('status', true)->get();
        $trainers = Trainer::where('status', true)->latest()->take(4)->get();

        return view('welcome', compact('stats', 'packages', 'trainers'));
    }
}
