<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


    class PatientRecordController extends Controller
{
    public function create()
    {
        $users = User::all(); // for admin dropdown
        return view('admin.report', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'report_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'medications' => 'nullable|string',
            'past_record' => 'nullable|string',
        ]);

        $filePath = null;
        if ($request->hasFile('report_file')) {
            $file = $request->file('report_file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/reports'), $filename);
            $filePath = 'uploads/reports/' . $filename;
        }

        PatientRecord::create([
            'user_id' => $request->user_id,
            'report_file' => $filePath,
            'medications' => $request->medications,
            'past_record' => $request->past_record,
        ]);

        return redirect()->back()->with('success', 'Patient record added successfully.');
    }

    public function userRecords()
    {
        $records = PatientRecord::where('user_id', Auth::id())->latest()->get();
        return view('user.report', compact('records'));
    }
}

