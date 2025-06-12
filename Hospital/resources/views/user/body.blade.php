<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="p-6 md:ml-64 mt-16 bg-gray-100 min-h-screen space-y-8">

  <!-- Welcome -->
  <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}</h1>

  <!-- Profile Summary -->
  <div class="bg-white p-6 rounded-xl shadow-md grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <h2 class="text-xl font-semibold text-gray-700 mb-2">Profile Summary</h2>
      <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
      <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
      <p><strong>Member Since:</strong> {{ Auth::user()->created_at->format('F Y') }}</p>
    </div>
    <div class="flex items-center justify-center">
      <img src="https://cdn-icons-png.flaticon.com/512/2922/2922510.png" alt="User Avatar" class="w-24 h-24 rounded-full border border-gray-300 shadow-md">
    </div>
  </div>

  <!-- Upcoming Appointments -->
  <div class="bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Upcoming Appointments</h2>

    @if($upcoming->count())
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600 uppercase tracking-wider">
          <tr>
            <th class="py-3 px-4">Date</th>
            <th class="py-3 px-4">Doctor</th>
            <th class="py-3 px-4">Status</th>
          </tr>
        </thead>
        <tbody class="text-gray-700 divide-y divide-gray-200">
          @foreach($upcoming as $appointment)
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($appointment->date)->format('F j, Y') }}</td>
            <td class="py-3 px-4">{{ $appointment->doctor }}</td>
            <td class="py-3 px-4">
              <span class="px-2 py-1 text-sm rounded-full text-white
                {{ $appointment->status == 'confirmed' ? 'bg-green-500' : ($appointment->status == 'pending' ? 'bg-yellow-500' : 'bg-gray-400') }}">
                {{ ucfirst($appointment->status) }}
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
      <p class="text-gray-500">No upcoming appointments.</p>
    @endif
  </div>


  <!-- Past Appointments -->
<div class="bg-white p-6 rounded-xl shadow-md">
  <h2 class="text-2xl font-semibold text-gray-700 mb-4">Past Appointments</h2>

  @if($past->count())
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm text-left">
      <thead class="bg-gray-100 text-gray-600 uppercase tracking-wider">
        <tr>
          <th class="py-3 px-4">Date</th>
          <th class="py-3 px-4">Doctor</th>
          <th class="py-3 px-4">Status</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 divide-y divide-gray-200">
        @foreach($past as $appointment)
<tr class="hover:bg-gray-50">
  <td class="py-3 px-4">{{ \Carbon\Carbon::parse($appointment->date)->format('F j, Y') }}</td>
  <td class="py-3 px-4">{{ $appointment->doctor }}</td>
  <td class="py-3 px-4">
    @php
      $badgeColor = match($appointment->status) {
          'confirmed' => 'bg-green-500',
          'pending' => 'bg-yellow-500',
          'cancelled' => 'bg-red-500',
          'completed' => 'bg-blue-500',
          default => 'bg-gray-400',
      };
    @endphp
    <span class="px-2 py-1 text-sm rounded-full text-white {{ $badgeColor }}">
        {{ ucfirst($appointment->status) }}
    </span>
  </td>
</tr>

        @endforeach
      </tbody>
    </table>
  </div>
  @else
    <p class="text-gray-500">No past appointments yet.</p>
  @endif
</div>

