<!DOCTYPE html>
<html lang="en">

<head>
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



                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Doctor Management -->
                                <a href="{{ route('admin.doctors') }}"
                                    class="block p-6 bg-blue-100 hover:bg-blue-200 rounded-lg shadow-md text-center transition duration-300">
                                    <h2 class="text-xl font-semibold text-blue-800 mb-2">👨‍⚕️ Manage Doctors</h2>
                                    <p class="text-sm text-blue-700">Add, view, and edit doctor details.</p>
                                </a>

                                <!-- Appointment Management -->
                                <a href="{{ route('admin.appointments') }}"
                                    class="block p-6 bg-blue-100 hover:bg-blue-200 rounded-lg shadow-md text-center transition duration-300">
                                    <h2 class="text-xl font-semibold text-blue-800 mb-2">📅 Manage Appointments</h2>
                                    <p class="text-sm text-blue-700">View, update, and delete patient appointments.</p>
                                </a>
                            </div>
                        </div>
						<br>
												@php
    $appointments = $appointments ?? collect([]);
@endphp

@include('admin.body', ['appointments' => $appointments])

                    </div>

                </main>
            </div>
        </div>
    </main>

    @include('admin.js')
</body>

</html>
