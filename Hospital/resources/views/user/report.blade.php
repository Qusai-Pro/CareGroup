<!DOCTYPE html>
<html   lang="en" >

<head>
      <title>Dashboard</title>
  @include('user.css')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<base href="{{ asset('') }}">

<body class="bg-gray-100 font-[Inter]">
    <main>
        <!-- Start the project -->
        <div id="main-wrapper" class="flex p-5 xl:pr-0">
            <!-- Sidebar -->
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[90px] xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0 w-[270px] shadow-md xl:rounded-md rounded-none bg-white transition-all duration-300">
                @include('user.sideBar')
            </aside>

            <!-- Main Page Content -->
            <div class="w-full page-wrapper xl:px-6 px-0">
                <main class="h-full w-full">
                    <div class="flex flex-col gap-6 p-0 h-full">
                        <!-- Header -->
                        @include('user.header')

                        <!-- Centered Content Area -->
                        <div class="flex flex-grow items-center justify-center min-h-[calc(100vh-90px)] px-4">
                            <div class="w-full max-w-3xl bg-white shadow-2xl rounded-3xl p-8 space-y-6 text-center">
                                <!-- Header -->
                                <h2 class="text-3xl font-bold text-gray-800">
                                    🗂️ Your Medical Records
                                </h2>

                                <!-- Record Loop -->
                                @forelse($records as $record)
                                    <div class="text-left p-6 bg-gray-50 rounded-xl border border-gray-200 shadow-sm space-y-3">
                                        <div class="text-sm text-gray-500">
                                            📅 Uploaded: {{ $record->created_at->format('d M Y') }}
                                        </div>

                                        @if($record->report_file)
                                            <div>
                                                <a href="{{ asset($record->report_file) }}" target="_blank"
                                                   class="inline-flex items-center text-blue-600 hover:underline">
                                                    <i class="fas fa-file-alt mr-2"></i>View Report File
                                                </a>
                                            </div>
                                        @endif

                                        <p>
                                            <span class="font-medium text-gray-700">💊 Medications:</span>
                                            <span class="text-gray-800">{{ $record->medications }}</span>
                                        </p>
                                        <p>
                                            <span class="font-medium text-gray-700">📚 Past Record:</span>
                                            <span class="text-gray-800">{{ $record->past_record }}</span>
                                        </p>
                                    </div>
                                @empty
                                    <p class="text-gray-500">No records found.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End of project -->
    </main>
</body>
