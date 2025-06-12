<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Doctor Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <script src="https://cdn.tailwindcss.com"></script>
    @include('user.css');

<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes scale-in {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.5s ease-out forwards;
    }

    .animate-scale-in {
        animation: scale-in 0.3s ease-in-out forwards;
    }
</style>

</head>
<body class="bg-blue-50 text-blue-900">
  <!-- Start the project -->
  <div id="main-wrapper" class="flex p-5 xl:pr-0">
    <aside id="application-sidebar-brand"
      class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[90px] xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0 w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300">
      <!-- ---------------------------------- -->
      @include('user.sideBar')
    </aside>
    <div class="w-full page-wrapper xl:px-6 px-0">
      <!-- Main Content -->
      <main class="h-full max-w-full">
        <div class="container full-container p-0 flex flex-col gap-6">
          <!-- Header Start -->
          @include('user.header')
          <!-- Header End -->

          <!-- Doctor Form -->

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-3xl animate-fade-in-up transition-all duration-500 ease-in-out">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Appointments</h2>

        {{-- Appointments Table --}}
        <table class="w-full table-auto text-left border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">Patient</th>
                    <th class="py-3 px-6">Date</th>
                    <th class="py-3 px-4">Doctor</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($data as $appointment)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-all duration-300">
                        <td class="py-3 px-6">{{ $appointment->name }}</td>
                        <td class="py-3 px-6">{{ $appointment->date }}</td>
                        <td class="py-3 px-4">{{ $appointment->doctor }}</td>
                        <td class="py-3 px-6 text-center">
                            <button onclick="openEditModal({{ $appointment->id }}, '{{ $appointment->patient_name }}', '{{ $appointment->date }}', '{{ $appointment->time }}')" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded transition-all duration-200 mr-2">Edit</button>

                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded transition-all duration-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Edit Modal --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative animate-scale-in">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Edit Appointment</h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="editId">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Patient Name</label>
                    <input type="text" name="name" id="editPatientName" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="date" id="editDate" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Doctor</label>
                    <input type="time" name="doctor" id="editTime" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">Update</button>
                    <button type="button" onclick="closeEditModal()" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded shadow">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>








      </main>
    </div>
  </div>
  <script>
    function openEditModal(id, name, date, time) {
        document.getElementById('editId').value = id;
        document.getElementById('editPatientName').value = name;
        document.getElementById('editDate').value = date;
        document.getElementById('editTime').value = time;

        document.getElementById('editForm').action = `/appointments/${id}`;
        document.getElementById('editModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }
</script>

  @include('user.js')
</body>
</html>
