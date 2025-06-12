<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

</html>
<header class="bg-white shadow-md rounded-md w-full text-sm py-4 px-6">
    <!-- ========== HEADER ========== -->
    <nav class="w-full flex items-center justify-between" aria-label="Global">

        <!-- Left Side: Menu Icon -->
        <ul class="icon-nav flex items-center gap-4">
            <li class="relative xl:hidden">
                <a class="text-xl icon-hover cursor-pointer text-heading"
                   id="headerCollapse"
                   data-hs-overlay="#application-sidebar-brand"
                   aria-controls="application-sidebar-brand"
                   aria-label="Toggle navigation"
                   href="javascript:void(0)">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>
        </ul>

        <!-- Right Side: Notification & Profile -->
        <div class="flex items-center gap-4">

            <!-- Notification Bell -->
            <div class="hs-dropdown relative inline-flex [--placement:bottom-left] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle inline-flex hover:text-gray-500 text-gray-300" href="#">
                    <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                    <div class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]"></div>
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 w-[300px] hidden z-[12]">
                    <h3 class="text-gray-500 font-semibold text-base px-6 py-3">Notifications</h3>
                    <ul class="list-none flex flex-col">

                        {{-- ✅ Session Success Message --}}
                        @if(session('success'))
                            <li class="py-3 px-6">
                                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded-md shadow-sm animate-pulse">
                                    {{ session('success') }}
                                </div>
                            </li>
                        @endif

                        {{-- ✅ Appointment Status Notification --}}
                        @isset($appointment)
                            <li class="py-3 px-6">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-700 font-medium">Appointment Status:</span>
                                    <span class="
                                        px-2 py-1 text-xs font-semibold rounded-full text-white
                                        @if($appointment->status === 'Confirmed') bg-green-500
                                        @elseif($appointment->status === 'Pending') bg-yellow-500
                                        @elseif($appointment->status === 'Cancelled') bg-red-500
                                        @elseif($appointment->status === 'Completed') bg-green-500
                                        @else bg-gray-400
                                        @endif
                                    ">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </div>
                            </li>
                        @endisset

                    </ul>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    <img class="object-cover w-9 h-9 rounded-full" src="./assets-admin/images/profile/user-1.jpg" alt="Profile">
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 w-[200px] hidden z-[12]">
                    <div class="card-body p-0 py-2">
                        <a href="{{ route('profile.show') }}" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-user text-xl"></i>
                            <span class="text-sm">My Profile</span>
                        </a>
                        <a href="javascript:void(0)" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-mail text-xl"></i>
                            <span class="text-sm">My Account</span>
                        </a>
                        <a href="javascript:void(0)" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-list-check text-xl"></i>
                            <span class="text-sm">My Task</span>
                        </a>
                        <div class="px-4 mt-2 grid">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <!-- ========== END HEADER ========== -->
</header>


