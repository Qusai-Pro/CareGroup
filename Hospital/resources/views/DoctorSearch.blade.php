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
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
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
    <style>
        .care-form form {
            background-color: #ffffff;
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .care-form label {
            display: block;
            margin-bottom: 6px;
            color: #1e3a8a;
            font-weight: bold;
        }

        .care-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .care-form button {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .care-form button:hover {
            background-color: #1d4ed8;
        }

        .care-form ul {
            max-width: 500px;
            margin: 20px auto;
            padding: 0;
            list-style: none;
        }

        .care-form li {
            background-color: #e0f2fe;
            margin-bottom: 10px;
            padding: 15px;
            border-left: 5px solid #2563eb;
            border-radius: 6px;
        }

        .care-form li:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body class="bg-blue-50 text-blue-900 min-h-screen flex flex-col items-center justify-center p-4">

    <div class="care-form w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Find a Doctor</h2>

       <form action="{{ route('search.doctor') }}" method="POST">
            @csrf

            <div>
                <label>City:</label>
                <input type="text" name="city" >
            </div>

            <div>
                <label>District:</label>
                <input type="text" name="district" >
            </div>
            <div>
                <label>Specialization:</label>
                <input type="text" name="specialization">
            </div>

            <button type="submit">Search</button>
        </form>

@if(request()->isMethod('post') && isset($doctors) && $doctors->count())
<div class="team-area section-padding30">
    <div class="container">
        <!-- Section Title -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <span>Search Results</span>
                    <h2>Doctors Found</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($doctors as $doctor)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-team mb-30">
                                <div class="team-img" style="height:400px; display:flex; align-items:center; justify-content:center;">
                                    <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name }}" style="max-height:100%; width:auto; object-fit:contain;">
                                </div>
                        <div class="team-caption">
                            <h3><a href="#">{{ $doctor->name }}</a></h3>
                            <span>{{ $doctor->specialization }}</span>
                            <div class="team-social">
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
    </div>
</div>
@endif

</body>
</html>
