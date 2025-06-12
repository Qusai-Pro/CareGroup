<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\PatientRecord;
use App\Models\User;


class DoctorController extends Controller
{
    
          
    // Show the Add Doctor Form
    public function create()
    {
        return view('admin.add-doctor'); // Adjust this path if needed
    }

    // Store Doctor Data with Image
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'specialization' => 'required',
            'email'          => 'required|email|unique:doctors',
            'phone'          => 'required',
            'contact'        => 'required',
            'city'           => 'required',
            'district'       => 'required',
            'image'          => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Save the image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/doctors'), $imageName);
            $imagePath = 'uploads/doctors/' . $imageName;
        }

        // Save to DB
        Doctor::create([
            'name'           => $request->name,
            'specialization' => $request->specialization,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'contact'        => $request->contact,
            'city'           => $request->city,
            'district'       => $request->district,
            'image'          => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Doctor added successfully!');
    }

    // Show all doctors (homepage or doctor list page)
// Show all doctors (homepage or doctor list page)
public function searchForm()
{
    return view('DoctorSearch'); // make sure this blade file exists
}
public function index()
{
    $doctors = Doctor::all();
    $isSearch = false;  // flag to know if it's a search or not
    return view('doctor', compact('doctors', 'isSearch'));
}

// Search Doctors by City and District
public function search(Request $request)
{
    $request->validate([
        'city'          => 'nullable|string',
        'district'      => 'nullable|string',
        'specialization'=> 'nullable|string',
    ]);

    $query = Doctor::query();

    if ($request->filled('city')) {
        $query->where('city', $request->city);
    }
    if ($request->filled('district')) {
        $query->where('district', $request->district);
    }
    if ($request->filled('specialization')) {
        $query->where('specialization', $request->specialization);
    }

    $doctors = $query->get();
    $isSearch = true;  // this is search result
    return view('doctor', compact('doctors', 'isSearch'));
}
//Doctor D
public function dashboardHome()
{
    $doctorName = auth()->user()->name;

    $today = now()->toDateString(); // Only the date, no time

    $upcoming = Appointment::where('doctor', $doctorName)
                            ->whereDate('date', '>=', $today)
                            ->orderBy('date')
                            ->get();

    $past = Appointment::where('doctor', $doctorName)
                        ->whereDate('date', '<', $today)
                        ->orderByDesc('date')
                        ->get();

    $appointments = Appointment::where('doctor', $doctorName)
                               ->orderBy('date')
                               ->get();

    return view('Doctor.dashboard', compact('upcoming', 'past', 'appointments'));
}


public function manageDoctors()
{
    $user = auth()->user(); // Get logged-in doctor
    $doctor = Doctor::where('email', $user->email)->first(); // Match doctor via email

    return view('Doctor.doctors', compact('doctor'));
}

public function manageAppointments()
{
    $user = auth()->user(); // Get logged-in user

    $doctor = Doctor::where('name', $user->name)->first(); // Find doctor by name

    if (!$doctor) {
        abort(403, 'No matching doctor found.');
    }

    // Fetch appointments by matching doctor's name (not id)
    $appointments = Appointment::where('doctor', $doctor->name)->get();

    return view('Doctor.appointments', compact('appointments'));
}



public function report()
{
    $users = User::all(); // This is for admin, no change here
    return view('Doctor.report', compact('users'));
}

public function reportstore(Request $request)
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
        $filename = time() . '_' . $file->getClientOriginalName();
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

public function dashboard()
{
    $doctorId = auth()->id();

    $upcoming = Appointment::where('doctor_id', $doctorId)
        ->whereDate('date', '>=', now())
        ->orderBy('date', 'asc')
        ->get();

    $latestAppointment = $upcoming->first();

    $past = Appointment::where('doctor_id', $doctorId)
        ->whereDate('date', '<', now())
        ->orderBy('date', 'desc')
        ->get();

    return view('doctor.dashboard', [
        'upcoming' => $upcoming,
        'past' => $past,
        'appointment' => $latestAppointment,
    ]);
}


public function viewAppointments()
{
    $doctor = Auth::user();
    $appointments = Appointment::where('doctor_id', $doctor->id)->get();

    return view('Doctor.appointments', compact('appointments'));
}

public function showProfile()
{
    $user = Auth::user(); // Get currently logged-in user
    $doctor = Doctor::where('email', $user->email)->first(); // Match based on email

    return view('Doctor.doctor', compact('doctor'));
}

    // 🔄 Update Doctor Profile
    public function update(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    // Update basic fields
    $doctor->name = $request->name;
    $doctor->specialization = $request->specialization;
    $doctor->email = $request->email;
    $doctor->phone = $request->phone;
    $doctor->contact = $request->contact;
$doctor->city = $request->city;
$doctor->district = $request->district;

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
public function updateAppointmentStatus(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = $request->status;
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment status updated.');
}

public function chat()
{
    return view('Doctor.chat');
}
public function destroy($id)
{
    $doctor = Doctor::findOrFail($id);
    $doctor->delete();

    return redirect()->back()->with('success', 'Doctor deleted successfully.');
}

}


