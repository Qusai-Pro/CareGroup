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
                     <!-- Content Box -->
          <div class="bg-white p-6 rounded-xl shadow-xl mt-6">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">👨‍⚕️ Doctor Management</h2>
            <a href="{{ route('doctors.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              ➕ Add New Doctor
            </a>
<!-- Search Input -->
<div class="mb-6">

  <input
    type="text"
    id="doctorSearch"
    placeholder="Search by name, specialization, email, phone, or location..."
    class="w-full p-3 border border-blue-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
  />
</div>


<!-- Table Wrapper -->
<div class="overflow-x-auto bg-white rounded shadow-md">
  <table class="min-w-full text-sm text-left">
    <!-- Table Head -->
    <thead class="bg-blue-600 text-white">
      <tr>
        <th class="p-3 border">ID</th>
        <th class="p-3 border">Name</th>
        <th class="p-3 border">Specialization</th>
        <th class="p-3 border">Email</th>
        <th class="p-3 border">Phone</th>
        <th class="p-3 border">Contact</th>
        <th class="p-3 border">City</th>
        <th class="p-3 border">District</th>
        <th class="p-3 border">Image</th>
        <th class="p-3 border text-center">Actions</th>
      </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
      @foreach($doctors as $doctor)
      <tr class="hover:bg-blue-50 transition duration-200">
        <td class="p-3 border">{{ $doctor->id }}</td>
        <td class="p-3 border">{{ $doctor->name }}</td>
        <td class="p-3 border">{{ $doctor->specialization }}</td>
        <td class="p-3 border">{{ $doctor->email }}</td>
        <td class="p-3 border">{{ $doctor->phone }}</td>
        <td class="p-3 border">{{ $doctor->contact }}</td>
        <td class="p-3 border">{{ $doctor->city }}</td>
        <td class="p-3 border">{{ $doctor->district }}</td>
        <td class="p-3 border">
          <img src="{{ asset($doctor->image) }}" alt="Doctor Image" class="w-16 h-16 object-cover rounded">
        </td>
        <td class="p-3 border text-center">
          <!-- Edit Button -->
<button onclick="openEditModal(
  {{ $doctor->id }},
  '{{ addslashes($doctor->name) }}',
  '{{ addslashes($doctor->specialization) }}',
  '{{ addslashes($doctor->email) }}',
  '{{ addslashes($doctor->phone) }}',
  '{{ $doctor->image }}'
)">
  Edit
</button>

          <!-- Delete Form -->
          <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this doctor?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">
              <i class="fas fa-trash"></i> Delete
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

            </div>
          </div>

         <!-- Edit Doctor Modal -->
<div id="editDoctorModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white p-6 rounded-xl w-full max-w-md shadow-lg">
    <h3 class="text-xl font-semibold mb-4 text-blue-800">Edit Doctor</h3>
    <form id="editDoctorForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" id="edit_id" name="id">

      <div class="mb-4">
        <label class="block mb-1 font-medium">Name</label>
        <input type="text" name="name" id="edit_name" class="w-full p-2 border rounded">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">Specialization</label>
        <input type="text" name="specialization" id="edit_specialization" class="w-full p-2 border rounded">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" id="edit_email" class="w-full p-2 border rounded">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">Phone</label>
        <input type="text" name="phone" id="edit_phone" class="w-full p-2 border rounded">
      </div>

      <!-- 👇 Image Preview and Upload -->
<div class="mb-4">
  <label class="block mb-1 font-medium">Image</label>
  <input type="file" name="image" id="edit_image" class="w-full p-2 border rounded">
  <img id="edit_image_preview" src="" alt="Preview" class="mt-2 w-20 h-20 rounded object-cover hidden" />
</div>

      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
      </div>
    </form>
  </div>
</div>

        </div>

      </main>
    </div>
  </div>
<script>
  // Live search
  document.getElementById('doctorSearch').addEventListener('input', function () {
    const value = this.value.toLowerCase();
    const rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
      const text = row.innerText.toLowerCase();
      row.style.display = text.includes(value) ? '' : 'none';
    });
  });

  // Open modal with doctor data
  function openEditModal(id, name, specialization, email, phone, imageName) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_specialization').value = specialization;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_phone').value = phone;

    // Set form action
    document.getElementById('editDoctorForm').action = `/doctors/${id}`;

    // Show current image
    const preview = document.getElementById('edit_image_preview');
    if (imageName) {
      preview.src = `/uploads/doctors/${imageName}`;
      preview.classList.remove('hidden');
    } else {
      preview.src = '';
      preview.classList.add('hidden');
    }

    // Show modal
    document.getElementById('editDoctorModal').classList.remove('hidden');
  }

  // Close modal
  function closeEditModal() {
    document.getElementById('editDoctorModal').classList.add('hidden');
  }

  // Show preview of newly selected file
  document.getElementById('edit_image').addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('edit_image_preview');

    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  });
</script>


  @include('admin.js')
</body>
</html>

