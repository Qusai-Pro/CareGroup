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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" >
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<header>
    <!--? Header Start -->
        <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('about')}}">About</a></li>
                                        <li><a href="{{url('doctor')}}">Doctors</a></li>
                                        <li><a href="{{url('department')}}">Department</a></li>
                                        <li><a href="{{url('blog')}}">Blog</a></li>
                                        <li><a href="{{url('contact')}}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                              
                                              @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        @auth
            @if (auth()->user()->usertype === '1')
                <a href="{{ url('/home') }}" class="btn header-btn font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Admin Dashboard
                </a>
            @elseif (auth()->user()->usertype === '2')
                <a href="{{ route('Doctor.dashboard') }}" class="btn header-btn font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Doctor Dashboard
                </a>
            @else
                <a href="{{ url('/dashboard') }}" class="btn header-btn font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Dashboard
                </a>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn header-btn font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Log in
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn header-btn ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Register
                </a>
            @endif
        @endauth
    </div>
@endif


                            </div>
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>Mental Wellness</b>
                                        <b>Physical Fitness</b>
                                       
                                        <b>Preventive Care</b>
                                        <b>Chronic Illness</b>
                                    <b>Healthcare Access</b>    
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">
A health care group is a team of medical professionals working together to provide coordinated and comprehensive care to patients. Their goal is to improve health outcomes through collaboration, efficiency, and patient-centered services.
</p>
                                <a href="#contact-form-main" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>Mental Wellness</b>
                                        <b>Physical Fitness</b>
                                       
                                        <b>Preventive Care</b>
                                        <b>Chronic Illness</b>
                                    <b>Healthcare Access</b> 
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">A health care group is a team of medical professionals working together to provide coordinated and comprehensive care to patients. Their goal is to improve health outcomes through collaboration, efficiency, and patient-centered services.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>About Our Company</span>
                            <h2>Welcome To Our Hospital</h2>
                        </div>
                        <p>A health care group is a team of medical professionals working together to provide coordinated and comprehensive care to patients. Their goal is to improve health outcomes through collaboration, efficiency, and patient-centered services.
</p>
                        <div class="about-btn1 mb-30">
                            <a href="{{url('DoctorSearch')}}" class="btn about-btn">Find Doctors .<i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="#contact-form-main" class="btn about-btn2">Appointment <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="{{url('contact')}}" class="btn about-btn2">Emargency<i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="assets/img/gallery/about2.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="assets/img/gallery/about1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? department_area_start  -->
   <div class="department_area section-padding2">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-100">
                    <span>Our Departments</span>
                    <h2>Our Medical Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="depart_ment_tab mb-30">
                    <!-- Tabs Buttons -->
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                <i class="flaticon-teeth"></i>
                                <h4>Dentistry</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="flaticon-cardiovascular"></i>
                                <h4>Cardiology</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="flaticon-ear"></i>
                                <h4>ENT Specialists</h4>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="Blood-tab" data-toggle="tab" href="#Blood" role="tab" aria-controls="Blood" aria-selected="false">
                                <i class="flaticon-cell"></i>
                                <h4>Blood Screening</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="dept_main_info white-bg">
            <div class="tab-content" id="myTabContent">
                <!-- Dentistry -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Dentistry</h3>
                                <p>Dentistry is the branch of medicine focused on the diagnosis, prevention, and treatment of conditions affecting the teeth, gums, and mouth. Dentists help maintain oral health through regular check-ups, cleanings, fillings, and more complex procedures like root canals and tooth extractions. Good dental care is essential not only for a healthy smile but also for overall health, as poor oral hygiene can lead to serious issues like infections, gum disease, and even heart problems. Dentistry also includes cosmetic procedures such as teeth whitening and braces to improve appearance and confidence.</p>
                                <a href="#contact-form-main" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="assets/img/gallery/dentist.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cardiology -->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Cardiology</h3>
                                <p>Cardiology is the branch of medicine that deals with the diagnosis, treatment, and prevention of diseases related to the heart and blood vessels. Cardiologists specialize in managing conditions such as heart attacks, arrhythmias, high blood pressure, and heart failure. With advanced diagnostic tools like ECGs, echocardiograms, and stress tests, they assess heart health and create personalized treatment plans. Cardiology plays a crucial role in promoting heart health through lifestyle guidance, medication, and surgical interventions.</p>
                                <a href="#contact-form-main" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="assets/img/gallery/cardio.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ENT -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>ENT Specialists</h3>
                                <p>An ENT specialist, also known as an otolaryngologist, is a medical doctor who diagnoses and treats conditions related to the ear, nose, and throat. These specialists handle a wide range of issues, including hearing loss, sinus infections, allergies, and voice disorders. They are trained in both medical and surgical treatments and perform procedures like tonsillectomies and sinus surgeries, helping improve patients’ quality of life.</p>
                                <a href="#contact-form-main" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="assets/img/gallery/ent.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blood Screening -->
                <div class="tab-pane fade" id="Blood" role="tabpanel" aria-labelledby="Blood-tab">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Blood Screening</h3>
                                <p>Blood screening is a vital medical process used to detect diseases, deficiencies, and infections by analyzing a person's blood. It helps diagnose conditions like anemia, diabetes, hepatitis, and high cholesterol. This process supports early detection, treatment, and monitoring of health status, ensuring timely medical intervention.</p>
                                <a href="#contact-form-main" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="assets/img/gallery/blood.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- depertment area end  -->
     <!--? Gallery Area Start -->
     <div class="gallery-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Our Gellary</span>
                        <h2>Our Medical Camp</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Left -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img" style="background-image: url(assets/img/gallery/gallery1.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/img/gallery/gallery2.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/img/gallery/gallery3.png);"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/img/gallery/gallery4.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/img/gallery/gallery5.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img" style="background-image: url(assets/img/gallery/gallery6.png);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    <!--? All startups Start -->
    <div class="all-starups-area testimonial-area fix">
        <!-- left Contents -->
        <div class="starups">
            <!--? Testimonial Start -->
            <div class="h1-testimonial-active">
                <!-- Single Testimonial -->
                <div class="single-testimonial text-center">
                    <!-- Testimonial Content -->
                    <div class="testimonial-caption ">
                        <div class="testimonial-top-cap">
                            <img src="assets/img/gallery/testimonial.png" alt="">
                            <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for yout hard.”</p>
                        </div>
                        <!-- founder -->
                        <div class="testimonial-founder d-flex align-items-center justify-content-center">
                            <div class="founder-img">
                                <img src="assets/img/gallery/Homepage_testi.png" alt="">
                            </div>
                            <div class="founder-text">
                                <span>Margaret Lawson</span>
                                <p>Chif Photographer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
        </div>
        <!--Right Contents  -->
        <div class="starups-img"></div>
    </div>
    <!--All startups End -->
     <!--? Team Start -->
     <div class="team-area section-padding30">
    <div class="container">
        <!-- Section Title -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <span>Our Doctors</span>
                    <h2>Our Specialist</h2>
                </div>
            </div>
        </div>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($doctors as $doctor)
                    <div class="swiper-slide">
                        <div class="single-team mb-30 text-center p-4 shadow-md bg-white rounded-xl">
                            <div class="team-img">
                                <div class="team-img" style="height:400px; display:flex; align-items:center; justify-content:center;">
                                 <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name }}" style="max-height:100%; width:auto; object-fit:contain;">
                                </div>
                            </div>
                            <div class="team-caption mt-4">
                                <h3><a href="#">{{ $doctor->name }}</a></h3>
                                <span>{{ $doctor->specialization }}</span>
                                <div class="team-social mt-2">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Swiper Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
    <!-- Team End -->
     <!--? Contact form Start -->


     <section id="contact-form-main">
        <div class="contact-form-main">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="section-tittle section-tittle2">
                                        <span>Appointment Apply Form</span>
                                        <h2>Appointment Form</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="{{ url('appointments') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-box user-icon mb-30">
                <input type="text" name="name" placeholder="Name" required>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-box email-icon mb-30">
                <input type="text" name="phone" placeholder="Phone" required>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-30">
            <div class="select-itms">
                <select name="doctor" id="select2">
                    <option>Select Doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->name }}">{{ $doctor->name }} | {{ $doctor->specialization }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-box subject-icon mb-30">
                <input type="email" name="email" placeholder="Email" required>
            </div>
        </div>

        <!-- 🗓️ New Date Field -->
        <div class="col-lg-6 col-md-6">
            <div class="form-box mb-30">
                <input type="date" name="date" placeholder="Appointment Date" required>
                <p id="availability-message" class="mt-2 text-sm font-semibold"></p>
            </div>
        </div>
                <div class="col-lg-6 col-md-6">
            <div class="form-box mb-30">
                <input type="time" name="time" required class="border border-gray-300 rounded-md p-3 md:col-span-2">
                <p id="availability-message" class="mt-2 text-sm font-semibold"></p>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-box message-icon mb-65">
                <textarea name="message" id="message" placeholder="Message" required></textarea>
            </div>
            <div class="submit-info">
                <button class="btn" type="submit">Submit Now <i class="ti-arrow-right"></i> </button>
            </div>
        </div>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
        <!-- contact left Img-->
        <div class="from-left d-none d-lg-block">
            <img src="assets/img/gallery/contact_form.png" alt="">
        </div>
    </div>

     </section>
     
    <!-- Contact form End -->
    <!--? gallery Products Start -->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                             <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Products End -->
    <!--? Blog start -->
    <div class="home_blog-area section-padding30">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Oure recent news</span>
                        <h2>News</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="2020-12-22T211841Z_105255337_RC2ISK9OWK9V_RTRMADP_3_HEALTH-CORONAVIRUS-PERU.webp" alt="" style="height: 350px;">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Health</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="{{url('blog')}}">Corona</a></h4>
                            <p>The coronavirus pandemic affected millions worldwide, highlighting the need for strong healthcare systems and public awareness.</p>
                            <a href="{{url('blog')}}" class="read-more1">Read more</a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="assets/img/gallery/blog2.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Checkup</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="{{url('blog')}}">Common diseases</a></h4>
                            <p>From seasonal flu to hypertension, regular checkups help in the early detection and effective management of common ailments.</p>
                            <a href="{{url('blog')}}" class="read-more1">Read more</a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="assets/img/gallery/blog3.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Operation</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="{{url('blog')}}">Medical Innovation</a></h4>
                            <p>Cutting-edge technology in surgeries and treatments is transforming patient care and paving the way for a healthier future.</p>
                            <a href="{{url('blog')}}" class="read-more1">Read more</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/footer_bg.jpg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <div class="footer-pera">
                                        <p class="info1">We are a dedicated health care team committed to delivering quality, patient-centered care. Our goal is to promote wellness through personalized treatment and modern medical practices. Your health and comfort are always our top priorities. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-number mb-50">
                                    <h4><span>+92</span>336154821</h4>
                                    <p>zain2405d@aptechgdn.net</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                    Send
                                                </button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
     <script>
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
              target.scrollIntoView({
                  behavior: 'smooth'
              });
          }
      });
  });
  </script>
       <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
     <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        }
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const doctorSelect = document.querySelector('select[name="doctor"]');
    const dateInput = document.querySelector('input[name="date"]');
    const timeInput = document.querySelector('input[name="time"]');
    const messageBoxes = document.querySelectorAll('#availability-message');
    const form = document.getElementById('contact-form');

    let doctorAvailable = false;

    function checkAvailability() {
        const doctor = doctorSelect.value;
        const date = dateInput.value;
        const time = timeInput.value;

        if (!doctor || !date || !time) {
            messageBoxes.forEach(box => box.textContent = '');
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
                messageBoxes.forEach(box => {
                    box.textContent = 'Doctor is available on this date and time.';
                    box.className = 'mt-2 text-sm font-semibold text-green-600';
                });
                doctorAvailable = true;
            } else {
                messageBoxes.forEach(box => {
                    box.textContent = 'Doctor is NOT available on this date and time.';
                    box.className = 'mt-2 text-sm font-semibold text-red-600';
                });
                doctorAvailable = false;
            }
        });
    }

    doctorSelect.addEventListener('change', checkAvailability);
    dateInput.addEventListener('change', checkAvailability);
    timeInput.addEventListener('change', checkAvailability);

    form.addEventListener('submit', function (e) {
        if (!doctorAvailable) {
            e.preventDefault();
            alert('The selected doctor is not available on this date and time. Please choose another slot.');
        }
    });
});
</script>


    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    
</script>
    </body>
</html>