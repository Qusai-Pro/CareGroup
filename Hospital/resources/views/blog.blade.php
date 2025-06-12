<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Care For Group</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <!--? Preloader Start -->
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
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>News</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--================Blog Area =================-->
       <section class="blog_area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="blog_left_sidebar" id="blogPosts">

          <!-- Blog Post 1 -->
          <article class="blog_item" data-category="Cardiology" data-tags="heart research">
            <div class="blog_item_img">
              <img class="card-img rounded-0" src="assets/img/gallery/cardio.jpg" alt="">
              <a href="#" class="blog_item_date"><h3>26</h3><p>May</p></a>
            </div>
            <div class="blog_details">
              <a class="d-inline-block" href="#"><h2 class="blog-head" style="color: #2d2d2d;">New Advances in Cardiology Treatments</h2></a>
              <p>Researchers have developed innovative procedures that reduce recovery time and improve heart health outcomes significantly.</p>
              <ul class="blog-info-link">
                <li><a href="#"><i class="fa fa-user"></i> Cardiology, Research</a></li>
                <li><a href="#"><i class="fa fa-comments"></i> 08 Comments</a></li>
              </ul>
            </div>
          </article>

          <!-- Blog Post 2 -->
          <article class="blog_item" data-category="Mental Health" data-tags="mental wellness therapy">
            <div class="blog_item_img">
              <img class="card-img rounded-0" src="assets/img/gallery/blog1.png" alt="">
              <a href="#" class="blog_item_date"><h3>24</h3><p>May</p></a>
            </div>
            <div class="blog_details">
              <a class="d-inline-block" href="#"><h2 class="blog-head" style="color: #2d2d2d;">The Importance of Mental Health Awareness</h2></a>
              <p>Healthcare professionals are stressing the need to prioritize mental wellness alongside physical health.</p>
              <ul class="blog-info-link">
                <li><a href="#"><i class="fa fa-user"></i> Mental Health</a></li>
                <li><a href="#"><i class="fa fa-comments"></i> 12 Comments</a></li>
              </ul>
            </div>
          </article>

          <!-- Page 2 Blog Posts (Initially hidden) -->
          <div id="page2Posts" style="display:none;">
            <!-- Blog Post 3 -->
            <article class="blog_item" data-category="Nutrition" data-tags="nutrition wellness">
              <div class="blog_item_img">
                <img class="card-img rounded-0" src="assets/img/gallery/about1.png" alt="">
                <a href="#" class="blog_item_date"><h3>22</h3><p>May</p></a>
              </div>
              <div class="blog_details">
                <a class="d-inline-block" href="#"><h2 class="blog-head" style="color: #2d2d2d;">Top 10 Nutrition Tips for a Healthy Life</h2></a>
                <p>Nutritionists suggest a balanced diet and regular meals to maintain a healthy lifestyle.</p>
                <ul class="blog-info-link">
                  <li><a href="#"><i class="fa fa-user"></i> Nutrition</a></li>
                  <li><a href="#"><i class="fa fa-comments"></i> 05 Comments</a></li>
                </ul>
              </div>
            </article>

            <!-- Blog Post 4 -->
            <article class="blog_item" data-category="Medical Technology" data-tags="research technology">
              <div class="blog_item_img">
                <img class="card-img rounded-0" src="assets/img/gallery/blog3.png" alt="">
                <a href="#" class="blog_item_date"><h3>21</h3><p>May</p></a>
              </div>
              <div class="blog_details">
                <a class="d-inline-block" href="#"><h2 class="blog-head" style="color: #2d2d2d;">How AI is Changing the Face of Medical Diagnostics</h2></a>
                <p>Artificial Intelligence in diagnostics is reducing human error and improving results.</p>
                <ul class="blog-info-link">
                  <li><a href="#"><i class="fa fa-user"></i> Medical Technology</a></li>
                  <li><a href="#"><i class="fa fa-comments"></i> 10 Comments</a></li>
                </ul>
              </div>
            </article>
          </div>

          <!-- Pagination -->
          <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
              <li class="page-item"><a href="#" class="page-link" onclick="switchPage(1)" aria-label="Previous"><i class="ti-angle-left"></i></a></li>
              <li class="page-item active"><a href="#" class="page-link" onclick="switchPage(1)">1</a></li>
              <li class="page-item"><a href="#" class="page-link" onclick="switchPage(2)">2</a></li>
              <li class="page-item"><a href="#" class="page-link" onclick="switchPage(2)" aria-label="Next"><i class="ti-angle-right"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="blog_right_sidebar">

          <!-- Search Widget -->
          <aside class="single_sidebar_widget search_widget">
            <form onsubmit="event.preventDefault(); searchPosts();">
              <div class="form-group">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="searchInput" placeholder='Search Topics'>
                  <div class="input-group-append">
                    <button class="btns" type="button" onclick="searchPosts()"><i class="ti-search"></i></button>
                  </div>
                </div>
              </div>
              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
            </form>
          </aside>

          <!-- Category Widget -->
          <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Categories</h4>
            <ul class="list cat-list">
              <li><a href="#" onclick="filterCategory('Cardiology')" class="d-flex"><p>Cardiology</p><p>(12)</p></a></li>
              <li><a href="#" onclick="filterCategory('Mental Health')" class="d-flex"><p>Mental Health</p><p>(8)</p></a></li>
              <li><a href="#" onclick="filterCategory('Nutrition')" class="d-flex"><p>Nutrition</p><p>(14)</p></a></li>
              <li><a href="#" onclick="filterCategory('General Health')" class="d-flex"><p>General Health</p><p>(20)</p></a></li>
              <li><a href="#" onclick="filterCategory('Medical Technology')" class="d-flex"><p>Medical Technology</p><p>(5)</p></a></li>
            </ul>
          </aside>

          <!-- Tag Widget -->
          <aside class="single_sidebar_widget tag_cloud_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Tags</h4>
            <ul class="list">
              <li><a href="#" onclick="filterTag('heart')">heart</a></li>
              <li><a href="#" onclick="filterTag('mental')">mental</a></li>
              <li><a href="#" onclick="filterTag('wellness')">wellness</a></li>
              <li><a href="#" onclick="filterTag('nutrition')">nutrition</a></li>
              <li><a href="#" onclick="filterTag('covid')">covid</a></li>
              <li><a href="#" onclick="filterTag('research')">research</a></li>
              <li><a href="#" onclick="filterTag('therapy')">therapy</a></li>
            </ul>
          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
        <!--================Blog Area =================-->
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
     <!-- Place this at the end of your existing code, just before </body> -->
<script>
function switchPage(page) {
  const page2 = document.getElementById('page2Posts');
  const posts = document.querySelectorAll('#blogPosts > article');

  if (page === 2) {
    posts.forEach(p => p.style.display = 'none');
    page2.style.display = 'block';
  } else {
    posts.forEach(p => p.style.display = 'block');
    page2.style.display = 'none';
  }
}

function searchPosts() {
  const search = document.getElementById('searchInput').value.toLowerCase();
  const posts = document.querySelectorAll('.blog_item');

  posts.forEach(post => {
    const title = post.querySelector('.blog-head').innerText.toLowerCase();
    const content = post.querySelector('p').innerText.toLowerCase();
    post.style.display = (title.includes(search) || content.includes(search)) ? 'block' : 'none';
  });
}

function filterCategory(category) {
  const posts = document.querySelectorAll('.blog_item');
  posts.forEach(post => {
    post.style.display = post.dataset.category === category ? 'block' : 'none';
  });
}

function filterTag(tag) {
  const posts = document.querySelectorAll('.blog_item');
  posts.forEach(post => {
    const tags = post.dataset.tags.split(' ');
    post.style.display = tags.includes(tag) ? 'block' : 'none';
  });
}
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
    
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
    </body>
</html>