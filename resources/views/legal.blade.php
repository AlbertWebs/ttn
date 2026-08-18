<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="{{asset('theme/assets/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('theme/assets/css/bootstrap-icons.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('theme/assets/css/swiper-bundle.min.css')}}">
      <link rel="stylesheet" href="{{asset('theme/assets/css/slick.css')}}">
      <link rel="stylesheet" href="{{asset('theme/assets/css/slick-theme.css')}}">
      <link rel="stylesheet" href="{{asset('theme/assets/css/animate.min.css')}}">
      <link rel="stylesheet" href="{{asset('theme/assets/css/jquery.fancybox.min.css')}}">
      <link href="{{asset('theme/assets/css/boxicons.min.css')}}" rel="stylesheet">
      <link href="{{asset('theme/assets/css/aos.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('theme/assets/css/style.css')}}">
      <title>{{ $page->title }} | {{ setting('site_name', 'Trusted Touch Nursing') }}</title>
      <link rel="icon" href="{{ media_url(setting('favicon'), 'uploads/favicon.png') }}" type="image/gif" sizes="20x20">
   </head>
   <body id="body" class="tt-smooth-scroll tt-magic-cursor">
      <div id="magic-cursor"><div id="ball"></div></div>
      @include('header')
      <div class="breadcrumb-section" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .55), rgba(0, 0, 0, 0.55) 101.02%), url({{ asset('theme/assets/img/inner-pages/braadcrumb-bg5.jpg') }});">
        <div class="company-name">{{ setting('site_name') }}</div>
        <div class="container-fluid one pl--95">
           <div class="row">
              <div class="col-lg-12">
                 <div class="banner-content">
                    <h1>{{ $page->title }}</h1>
                    <ul class="breadcrumb-list">
                       <li><a href="{{ url('/') }}">Home</a></li>
                       <li>{{ $page->title }}</li>
                    </ul>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="terms-and-conditions-pages pt-130 mb-130">
        <div class="container">
           <div class="row">
              @if ($page->effective_date)
              <div class="col-lg-12">
                 <div class="update-date mb-30">
                    <h6><i class="bi bi-caret-right-fill"></i> Last Updated</h6>
                    <p><strong>Effective Date:</strong> {{ $page->effective_date }}</p>
                 </div>
              </div>
              @endif
              <div class="col-lg-12 mb-40">
                 <div class="terms-and-conditions">
                    {!! $page->content !!}
                 </div>
              </div>
           </div>
        </div>
     </div>
      @include('footer')
      <script src="{{asset('theme/assets/js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/popper.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/swiper-bundle.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/slick.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/waypoints.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/aos.js')}}"></script>
      <script src="{{asset('theme/assets/js/jquery.counterup.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/jquery.fancybox.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/gsap.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/ScrollTrigger.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/simpleParallax.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/SmoothScroll.js')}}"></script>
      <script src="{{asset('theme/assets/js/TweenMax.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/jquery.marquee.min.js')}}"></script>
      <script src="{{asset('theme/assets/js/main.js')}}"></script>
   </body>
</html>
