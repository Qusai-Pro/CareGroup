<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Care For Group</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <script src="https://cdn.tailwindcss.com"></script>
         @include('user.css');
      
</head>

<body class="bg-blue-50 text-blue-900">



    <!-- Start the project -->
    <div id="main-wrapper" class="flex p-5 xl:pr-0">
        <!-- Sidebar -->
        <aside id="application-sidebar-brand"
            class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 fixed xl:top-[90px] top-0 left-0 h-screen z-[999] w-[270px] shadow-md rounded-md bg-white transition-all duration-300">
            @include('user.sideBar')
        </aside>

        <!-- Main Content Area -->
        <div class="w-full xl:px-6 px-0">
            <main class="h-full max-w-full">
                <div class="container p-0 flex flex-col gap-6">

                    <!-- Header -->
                    @include('user.header')

                    <!-- Appointment Form Section -->
                    <div class="flex justify-center items-center min-h-screen bg-gray-100">
                        <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-3xl animate-fade-in-up transition-all duration-500 ease-in-out">

                            <section id="contact-form-main">
                                <div class="form-wrapper">

                                    <!-- Section Title -->
                                    <div class="section-tittle mb-8 text-center">
                                        <span class="text-lg font-semibold text-blue-600">Appointment Apply Form</span>
                                        <h2 class="text-3xl font-bold text-blue-900">Appointment Form</h2>
                                    </div>

                                    <!-- Form -->
                                    <form id="contact-form" action="{{ url('appointments') }}" method="POST">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                            <input type="text" name="name" placeholder="Name" required class="border border-gray-300 rounded-md p-3">

                                            <input type="text" name="phone" placeholder="Phone" required class="border border-gray-300 rounded-md p-3">

                                            <select name="doctor" id="select2" required class="border border-gray-300 rounded-md p-3 bg-white w-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <option value="" disabled selected>Select Doctor</option>
    @foreach($doctors as $doctor)
        <option value="{{ $doctor->name }}">{{ $doctor->name }} | {{ $doctor->specialization }}</option>
    @endforeach
</select>


                                            <input type="email" name="email" placeholder="Email" required class="border border-gray-300 rounded-md p-3">
                                            <input type="time" name="time" required class="border border-gray-300 rounded-md p-3 md:col-span-2">


                                            <input type="date" name="date" required class="border border-gray-300 rounded-md p-3 md:col-span-2">
                                            <p id="availability-message" class="mt-2 text-sm font-semibold"></p>

                                            <textarea name="message" placeholder="Message" required class="border border-gray-300 rounded-md p-3 h-32 md:col-span-2"></textarea>
                                        </div>

                                        <div class="text-center mt-6">
                                            <button class="btn bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded" type="submit">
                                                Submit Now <i class="ti-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </section>

                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
      @include('user.js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const doctorSelect = document.querySelector('select[name="doctor"]');
    const dateInput = document.querySelector('input[name="date"]');
    const timeInput = document.querySelector('input[name="time"]');
    const messageBox = document.getElementById('availability-message');
    const form = document.getElementById('contact-form');

    let doctorAvailable = false;

    function checkAvailability() {
        const doctor = doctorSelect.value;
        const date = dateInput.value;
        const time = timeInput.value;

        if (!doctor || !date || !time) {
            messageBox.textContent = '';
            doctorAvailable = false;
            return;
        }

        fetch('/check-availability', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ doctor, date, time })
        })
        .then(response => response.json())
        .then(data => {
            if (data.available) {
                messageBox.textContent = 'Doctor is available on this date and time.';
                messageBox.className = 'mt-2 text-sm font-semibold text-green-600';
                doctorAvailable = true;
            } else {
                messageBox.textContent = 'Doctor is NOT available on this date and time.';
                messageBox.className = 'mt-2 text-sm font-semibold text-red-600';
                doctorAvailable = false;
            }
        });
    }

    doctorSelect.addEventListener('change', checkAvailability);
    dateInput.addEventListener('change', checkAvailability);
    timeInput.addEventListener('change', checkAvailability); // NEW: listen for time change

    form.addEventListener('submit', function (e) {
        if (!doctorAvailable) {
            e.preventDefault();
            alert('The selected doctor is not available on this date and time. Please choose another slot.');
        }
    });
});
</script>



     
    