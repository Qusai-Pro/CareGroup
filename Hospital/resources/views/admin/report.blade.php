<!DOCTYPE html>
<html lang="en">

<head>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <script src="https://cdn.tailwindcss.com"></script>

	<base href="{{ asset('') }}">
    @include('admin.css')
</head>

<body class="bg-blue-50 text-blue-900">
    <main>
        <div id="main-wrapper" class="flex p-5 xl:pr-0">
            <!-- Sidebar -->
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[90px] xl:left-auto top-0 left-0 h-screen z-[999] w-[270px] shadow-md bg-white rounded-md transition-all duration-300">
                @include('admin.sideBar')
            </aside>

            <!-- Page Content -->
            <div class="w-full page-wrapper xl:px-6 px-0">
                <main class="h-full max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <!-- Header -->
                        @include('admin.header')
                        <div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-2xl shadow-lg">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Add Patient Report</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg shadow">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.report.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Select Patient:</label>
            <select name="user_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Report File:</label>
            <input type="file" name="report_file" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Medications:</label>
            <textarea name="medications" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Past Record:</label>
            <textarea name="past_record" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Upload</button>
    </form>
</div>


                           


                    </div>

                </main>
            </div>
        </div>
    </main>

    @include('admin.js')
</body>

</html>