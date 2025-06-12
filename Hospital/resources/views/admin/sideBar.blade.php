<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="p-4">
  
  <a href="../" class="text-nowrap">
    <img
      src="{{ asset('assets/img/logo/logo.png') }}"
      alt="Logo-Dark"
    />
  </a>


</div>
<div class="scroll-sidebar" data-simplebar="">
<nav class="w-full flex flex-col sidebar-nav px-4 mt-5">
  <ul id="sidebarnav" class="text-gray-600 text-sm">
    <li class="text-xs font-bold pb-[5px]">
      <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
      <span class="text-xs text-gray-400 font-semibold">HOME</span>
    </li>
    <li class="sidebar-item">
      <a href="{{ url('home') }}"
         class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full">
        <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>🚨Dashboard</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{ route('doctors.create') }}"
         class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full">
        <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>➕ Add Doctors</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="{{ route('admin.doctors') }}"
         class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full">
        <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>👨‍⚕️ Manage Doctors</span>
      </a>
    </li>
       <li class="sidebar-item">
        <a href="{{ route('admin.report') }}" class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"><i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>🗂️Manage Reports</span></a>
    </li>

    <li class="sidebar-item">
      <a href="{{ route('admin.appointments') }}"
         class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full">
        <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>📅 Manage Appointments</span>
      </a>
    </li>
                <li class="sidebar-item">
<a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
   href="{{ url('/adminChat') }}">
   <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>💬chat with bot</span>
</a>
      </li>
  </ul>
</nav>

</div>