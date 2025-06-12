<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Doctor;

class AppointmentController extends Controller
{
public function store(Request $request)
{
    $data = new appointment;
    $data->name=$request->name;
    $data->phone=$request->phone;
    $data->email=$request->email;
    $data->doctor=$request->doctor;
    $data->date=$request->date;
    $data->message=$request->message;
    $data->status='In progress';
    $data->time = $request->time;
    if(Auth::id())
    {
        $data->user_id=Auth::user()->id;
    }

$data->save();
    return back()->with('success', 'Appointment submitted!');
}
            public function add()
    {
        $doctors = Doctor::all(); // fetch all doctors
    return view('user.add-appointment', compact('doctors')); // pass to the about view
    }
public function index()
{
    $data = Appointment::all();
    return view('appointment', compact('data'));
}

public function update(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);

    $request->validate([
        'patient_name' => 'required',
        'date' => 'required|date',
        'time' => 'required',
    ]);

    $appointment->update($request->all());

    return redirect('/appointments')->with('success', 'Appointment updated successfully!');
}
public function destroy($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();

    return redirect('/appointments')->with('success', 'Appointment deleted successfully!');
}
public function dashboard()
{
    $userId = auth()->id();

    $upcoming = Appointment::where('user_id', $userId)
        ->whereDate('date', '>=', now())
        ->orderBy('date', 'asc')
        ->get();

    $latestAppointment = $upcoming->first(); // This will be passed as $appointment

    $past = Appointment::where('user_id', $userId)
        ->whereDate('date', '<', now())
        ->orderBy('date', 'desc')
        ->get();

    return view('user.dashboard', [
        'upcoming' => $upcoming,
        'past' => $past,
        'appointment' => $latestAppointment, // To match your blade code
    ]);
}
public function checkAvailability(Request $request)
{
    $doctorName = $request->doctor;
    $date = $request->date;
    $time = $request->time;

    // Check if an appointment already exists for the doctor at the given date and time
    $appointmentExists = Appointment::where('doctor', $doctorName)
        ->where('date', $date)
        ->where('time', $time)
        ->exists();

    return response()->json([
        'available' => !$appointmentExists
    ]);
}




}
