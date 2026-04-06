<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DigitalData;
use App\Models\Program;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalData = DigitalData::count();
        $totalPrograms = Program::count();
        
        $dataByProgram = DigitalData::selectRaw('program_id, count(*) as count')
            ->with('program')
            ->groupBy('program_id')
            ->get();

        $recentData = DigitalData::with(['user', 'program'])->latest()->take(10)->get();

        return view('admin.dashboard', compact('totalData', 'totalPrograms', 'dataByProgram', 'recentData'));
    }

    public function list()
    {
        $data = DigitalData::with(['user', 'program'])->latest()->paginate(25);
        return view('admin.data-list', compact('data'));
    }

    public function updateStatus(Request $request, DigitalData $digitalDatum)
    {
        $request->validate([
            'status' => 'required|in:pending,verified',
        ]);

        $digitalDatum->update(['status' => $request->status]);

        return back()->with('success', 'Status data berhasil diperbarui.');
    }

    public function report()
    {
        $data = DigitalData::with(['user', 'program'])->latest()->get();
        return view('admin.report', compact('data'));
    }
}
