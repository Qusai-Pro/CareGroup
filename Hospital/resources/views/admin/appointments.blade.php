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


    @include('admin.css');

</head>
<body class="bg-blue-50 text-blue-900">
  <!-- Start the project -->
  <div id="main-wrapper" class="flex p-5 xl:pr-0">
    <aside id="application-sidebar-brand"
      class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[90px] xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0 w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300">
      <!-- ---------------------------------- -->
      @include('admin.sideBar')
    </aside>
    <div class="w-full page-wrapper xl:px-6 px-0">
      <!-- Main Content -->
      <main class="h-full max-w-full">
        <div class="container full-container p-0 flex flex-col gap-6">
          <!-- Header Start -->
         @include('admin.header')

          <!-- Header End -->
           <div class="bg-white p-6 rounded-xl shadow-xl mt-6">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">📅 Appointment Management</h2>
            <div class="mb-4">
  <input 
    type="text" 
    id="appointmentSearch" 
    placeholder="Search by patient, doctor, date, or status..." 
    class="w-full p-2 border rounded-lg shadow-sm"
    onkeyup="filterAppointments()"
  >
</div>

            <div class="overflow-x-auto">
              <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-blue-100 text-blue-800">
                  <tr>
                    <th class="p-3 border">Patient</th>
                    <th class="p-3 border">Doctor</th>
                    <th class="p-3 border">Date</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($appointments as $appointment)
                  <tr class="hover:bg-gray-50 appointment-row">
                    <td class="p-3 border">{{ $appointment->name }}</td>
                    <td class="p-3 border">{{ $appointment->doctor }}</td>
                    <td class="p-3 border">{{ $appointment->date }}</td>
                    <td class="p-3 border">{{ $appointment->status }}</td>
                    <td class="p-3 border">
                      <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 font-semibold">🗑 Delete</button>
                      </form>
                                           <button 
      onclick="openModal({{ $appointment->id }}, '{{ $appointment->status }}')" 
      class="text-blue-600 hover:text-blue-800 font-semibold"
    >
      ✏️ Edit
    </button>
  </div>
</td>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <div id="editModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-96 p-6">
    <h3 class="text-xl font-bold mb-4 text-blue-900">Update Appointment Status</h3>

    <form id="statusForm" method="POST">
      @csrf
      @method('PUT')

      <label class="block mb-2 font-semibold text-blue-800">Status</label>
      <select name="status" id="modalStatus" class="w-full p-2 border rounded">
        <option value="Pending">Pending</option>
        <option value="Confirmed">Confirmed</option>
        <option value="Cancelled">Cancelled</option>
        <option value="Completed">Completed</option>
      </select>

      <div class="mt-4 flex justify-end gap-2">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
      </div>
    </form>
  </div>
</div>

      </main>
    </div>
  </div>
  <script>
function filterAppointments() {
  const input = document.getElementById("appointmentSearch").value.toLowerCase();
  const rows = document.querySelectorAll(".appointment-row");

  rows.forEach(row => {
    const patient = row.children[0].textContent.toLowerCase();
    const doctor = row.children[1].textContent.toLowerCase();
    const date = row.children[2].textContent.toLowerCase();
    const status = row.children[3].textContent.toLowerCase();

    if (
      patient.includes(input) ||
      doctor.includes(input) ||
      date.includes(input) ||
      status.includes(input)
    ) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}
</script>
  <script>
  function openModal(id, currentStatus) {
    const modal = document.getElementById('editModal');
    const statusField = document.getElementById('modalStatus');
    const form = document.getElementById('statusForm');

    statusField.value = currentStatus;
    form.action = `/appointments/${id}/status`;

    modal.classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
  }
</script>
  @include('admin.js')
</body>
</html>
