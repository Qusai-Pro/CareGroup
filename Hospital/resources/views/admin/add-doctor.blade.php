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
  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-fade-in-up {
      animation: fadeInUp 0.7s ease-out;
    }
    .form-hover:hover {
      transform: scale(1.01);
      transition: transform 0.3s ease;
    }
  </style>
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

          <div class="flex justify-center items-center min-h-screen">
            <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-xl animate-fade-in-up form-hover">
                      @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
            <h1 class="text-2xl font-semibold mb-6 text-center">Add New Doctor</h1>
              <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="mb-4">
                  <label for="name" class="block font-medium mb-1">Doctor Name:</label>
                  <input type="text" id="name" name="name" required class="w-full border border-blue-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                  <label for="specialization" class="block font-medium mb-1">Specialization:</label>
                  <input type="text" id="specialization" name="specialization" required class="w-full border border-blue-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                  <label for="email" class="block font-medium mb-1">Email:</label>
                  <input type="email" id="email" name="email" required class="w-full border border-blue-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                  <label for="phone" class="block font-medium mb-1">Phone Number:</label>
                  <input type="tel" id="phone" name="phone" required class="w-full border border-blue-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                  <label for="contact" class="block font-medium mb-1">Contact:</label>
                  <input type="text" id="contact" name="contact" required class="w-full border border-blue-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                  <label for="city" class="block font-medium mb-1">City:</label>
                  <input type="text" id="city" name="city" required class="w-full border border-blue-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                  <label for="district" class="block font-medium mb-1">District:</label>
                  <input type="text" id="district" name="district" required class="w-full border border-blue-300 rounded-md p-2">
                </div>
                <div class="mb-4">
    <label for="image" class="block font-medium mb-1">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required class="w-full border border-blue-300 rounded-md p-2">
  </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded-md w-full transition duration-300">Add Doctor</button>
              </form>
            </div>
          </div>

        </div>

      </main>
    </div>
  </div>
  @include('admin.js')
</body>
</html>
