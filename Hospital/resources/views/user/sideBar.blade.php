<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="p-4">
  
  <a href="../" class="text-nowrap">
    <img
      src="assets/img/logo/logo.png"
      alt="Logo-Dark"
    />
  </a>


</div>
<div class="scroll-sidebar" data-simplebar="">
  <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
    <ul id="sidebarnav" class="text-gray-600 text-sm">
      <li class="text-xs font-bold pb-[5px]">
        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
        <span class="text-xs text-gray-400 font-semibold">HOME</span>
      </li>
      <li class="sidebar-item">
<a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
   href="{{ url('/dashboard') }}">
   <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>🏠︎Dashboard</span>
</a>
      </li>

      <li class="sidebar-item">
<a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
   href="{{ route('appointments.index') }}">
   <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>📅Appointments</span>
</a>
      </li>
            <li class="sidebar-item">
<a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
   href="{{ url('/add-appointment') }}">
   <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>➕Add-Appointments</span>
</a>
      </li>
             <li class="sidebar-item">
        <a href="{{ route('user.report') }}" class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"><i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>🗂️Reports</span></a>
    </li>
            <li class="sidebar-item">
<a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
   href="{{ url('/chat') }}">
   <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>💬chat with bot</span>
</a>
      </li>


    </ul>
  </nav>
</div>