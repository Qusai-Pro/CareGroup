<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function doctorView()
{
    $doctors = Doctor::all();
    $appointments = Appointment::all();

    return view('admin.home', compact('doctors', 'appointments'));
}
public function dashboardHome()
{
    $doctors = Doctor::all();
    $appointments = Appointment::all();

    return view('admin.home', compact('doctors', 'appointments'));
}


public function manageDoctors()
{
    $doctors = Doctor::all();
    return view('admin.doctors', compact('doctors'));
}

public function manageAppointments()
{
    $appointments = Appointment::all();
    return view('admin.appointments', compact('appointments'));

}
public function update(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    // Update basic fields
    $doctor->name = $request->name;
    $doctor->specialization = $request->specialization;
    $doctor->email = $request->email;
    $doctor->phone = $request->phone;

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($doctor->image && file_exists(public_path($doctor->image))) {
            unlink(public_path($doctor->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/doctors'), $imageName);

        // Save new image path
        $doctor->image = 'uploads/doctors/' . $imageName;
    }

    $doctor->save(); // Save all changes

    return redirect()->back()->with('success', 'Doctor updated successfully.');
}


public function destroy($id)
{
    $doctor = Doctor::findOrFail($id);
    $doctor->delete();

    return redirect()->back()->with('success', 'Doctor deleted successfully.');
}
public function updateAppointmentStatus(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = $request->status;
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment status updated.');
}
          public function chat()
    {
        return view('admin.chat');
    }
}
