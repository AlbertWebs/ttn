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
      <style>
         .people-section .people-card1 .people-img {
            aspect-ratio: 1 / 1;
            overflow: hidden;
         }
         .people-section .people-card1 .people-img img {
            min-height: 0 !important;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
         }
         .contect-section6 {
            background: linear-gradient(180deg, #fff7f1 0%, #ffffff 42%, #f4f9fd 100%);
            padding: 90px 0 110px;
         }
         .ttn-contact-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 18px 50px rgba(13, 23, 32, .08);
            border: 1px solid rgba(234, 133, 75, .18);
         }
         .ttn-contact-card::before {
            content: "";
            display: block;
            height: 6px;
            background: linear-gradient(90deg, #0D1720, #ea854b, #f4c430);
         }
         .ttn-contact-card .contact-form-area.two {
            padding: 42px 42px 36px;
            background: transparent;
         }
         .ttn-contact-head {
            margin-bottom: 28px;
         }
         .ttn-contact-head span {
            display: inline-block;
            letter-spacing: .14em;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            color: #ea854b;
            margin-bottom: 8px;
         }
         .ttn-contact-head h2 {
            color: #0D1720;
            font-size: 34px;
            margin: 0 0 10px;
         }
         .ttn-contact-head p {
            color: #566064;
            margin: 0 0 16px;
         }
         .ttn-contact-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
         }
         .ttn-contact-meta a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff7f1;
            color: #0D1720;
            border: 1px solid rgba(234, 133, 75, .28);
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
         }
         .ttn-contact-meta a:hover {
            background: #ea854b;
            color: #fff;
            border-color: #ea854b;
         }
         .contact-form-area.two .form-inner label,
         .ttn-human-check label {
            color: #0D1720;
            font-weight: 600;
            margin-bottom: 8px;
         }
         .contact-form-area.two .form-inner input,
         .contact-form-area.two .form-inner textarea,
         .ttn-human-check input {
            border: 1px solid #eadfd6 !important;
            border-radius: 12px !important;
            background: #fffdfb !important;
            color: #0D1720 !important;
            height: 54px;
            transition: border-color .2s, box-shadow .2s;
         }
         .contact-form-area.two .form-inner textarea {
            min-height: 140px;
            height: auto;
         }
         .contact-form-area.two .form-inner input:focus,
         .contact-form-area.two .form-inner textarea:focus,
         .ttn-human-check input:focus {
            outline: 0;
            border-color: #ea854b !important;
            box-shadow: 0 0 0 4px rgba(234, 133, 75, .16);
         }
         .ttn-human-check {
            margin-top: 8px;
         }
         .ttn-human-check input {
            width: 100%;
            padding: 10px 18px;
            font-size: 14px;
         }
         .ttn-form-error {
            background: #fff1f1;
            color: #9b1c1c;
            border-left: 4px solid #ea854b;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 18px;
         }
         .ttn-contact-card .primary-btn1 {
            width: 100%;
            justify-content: center;
            border-radius: 12px;
         }
         @media (max-width: 767px) {
            .ttn-contact-card .contact-form-area.two {
               padding: 28px 20px;
            }
         }
         .ttn-values-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 22px;
         }
         .ttn-value-item {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(234,133,75,.28);
            border-radius: 12px;
            padding: 14px 16px 12px;
         }
         .ttn-value-item strong {
            display: block;
            color: #ea854b;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 6px;
            letter-spacing: .01em;
         }
         .ttn-value-item p {
            margin: 0;
            color: rgba(255,255,255,.82);
            font-size: 13px;
            line-height: 1.5;
            font-weight: 400;
         }
         .ttn-values-row {
            align-items: stretch;
         }
         .ttn-values-col {
            display: flex;
            align-items: center;
         }
         .ttn-values-col .about-content {
            width: 100%;
            padding-top: 40px;
            padding-bottom: 40px;
         }
         .ttn-values-col .section-title1 {
            margin-top: 0;
            margin-bottom: 0;
         }
         @media (max-width: 767px) {
            .ttn-values-grid {
               grid-template-columns: 1fr;
            }
         }
         .ttn-consultants-section .people-left-content .section-title1 {
            margin-bottom: 0;
         }
         @media (min-width: 992px) {
            .ttn-consultants-row {
               align-items: stretch;
            }
            .ttn-consultants-media {
               position: relative;
               min-height: 100%;
            }
            .ttn-consultants-section .teams-image {
               position: absolute;
               inset: 0;
               height: 100%;
               width: 100%;
               overflow: hidden;
            }
            .ttn-consultants-section .teams-image img {
               width: 100%;
               height: 100%;
               object-fit: cover;
               object-position: center;
               display: block;
            }
         }
         .home6-about-section#why {
            background-color: #0D1720 !important;
            background-image: linear-gradient(115deg, #0D1720 0%, #1b3348 42%, #ea854b 100%) !important;
         }
         .home6-about-section#why .sub-title span {
            color: #fff;
            border-color: #ea854b;
         }
         .home6-about-section#why .explore-btn {
            color: #fff;
            border-color: #fff;
         }
         .home6-about-section#why .explore-btn:hover {
            color: #ea854b;
            border-color: #ea854b;
         }
         #values.feature-card-section {
            background: transparent;
         }
         #values .section-title1 h2 {
            position: relative;
            display: inline-block;
            padding-bottom: 12px;
         }
         #values .section-title1 h2::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 56px;
            height: 3px;
            background: #ea854b;
            border-radius: 2px;
         }
         #values .eg-card-2.style-3 {
            background: transparent;
            border-top: 2px solid #ea854b;
         }
         #values .eg-card-2.style-3 .sl-no h3 {
            color: rgba(234, 133, 75, .35);
         }
         #values .eg-card-2.style-3 .content h5 {
            color: #0D1720;
         }
         #values .eg-card-2.style-3:hover {
            background: rgba(234, 133, 75, .04);
         }
      </style>

      {{-- SEO --}}
        <!-- Meta Title -->
        <title>{{ setting('seo_title', 'Trusted Touch Nursing') }}</title>

        <!-- Meta Description -->
        <meta name="description" content="{{ setting('seo_description') }}">

        <!-- Canonical URL -->
        <link rel="canonical" href="{{ setting('seo_canonical', url('/')) }}">

        <!-- Keywords -->
        <meta name="keywords" content="{{ setting('seo_keywords') }}">

        <!-- Open Graph (OG) Tags -->
        <meta property="og:title" content="{{ setting('seo_title') }}">
        <meta property="og:description" content="{{ setting('seo_description') }}">
        <meta property="og:image" content="{{ media_url(setting('og_image'), 'uploads/favicon.png') }}">
        <meta property="og:url" content="{{ setting('seo_canonical', url('/')) }}">
        <meta property="og:type" content="website">

        <!-- Twitter Card Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ setting('seo_title') }}">
        <meta name="twitter:description" content="{{ setting('seo_description') }}">
        <meta name="twitter:image" content="{{ media_url(setting('og_image'), 'uploads/favicon.png') }}">

        <!-- Schema.org Structured Data -->
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "MedicalBusiness",
              "name": "{{ setting('site_name') }}",
              "url": "{{ setting('seo_canonical', url('/')) }}",
              "logo": "{{ media_url(setting('logo'), 'uploads/logo-ttn.png') }}",
              "description": "{{ setting('seo_description') }}",
              "address": {
                "@type": "PostalAddress",
                "addressLocality": "{{ setting('location', 'Nairobi') }}",
                "addressCountry": "Kenya"
              },
              "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "{{ setting('phone_primary') }}",
                "email": "{{ setting('contact_email') }}",
                "contactType": "customer service"
              },
              "sameAs": [
                "{{ setting('social_instagram') }}",
                "{{ setting('social_linkedin') }}",
                "{{ setting('social_facebook') }}"
              ]
            }
        </script>

        <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

      {{-- SEO END --}}
      <link rel="icon" href="{{ media_url(setting('favicon'), 'uploads/favicon.png') }}" type="image/gif" alt="TTN" sizes="20x20">

      <!--Floating WhatsApp css-->
     <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
   </head>
   <body id="body" class="tt-smooth-scroll tt-magic-cursor">
      <h1 style="display:none">Trusted Touch Nursing – Compassionate Newborn & Postnatal Care</h1>
      <h2 style="display:none">
        Expert Postnatal & Newborn Care Services in Kenya
      </h2>
      <h2 style="display:none">
        Lactation Support & Breastfeeding Guidance
      </h2>
      <h2 style="display:none">
        Professional Sleep Training & Sleep Consultant Services
      </h2>
      <h2 style="display:none">
        Reliable Home-Based Nursing & Night Nurse Support
      </h2>
      <h2 style="display:none">
        Travel Nurse Services for On-the-Go Care
      </h2>
      <!--Div where the WhatsApp will be rendered-->
      <div style="z-index:100000" id="WAButton"></div>
      <div id="magic-cursor">
         <div id="ball"></div>
      </div>
      <div class="circle-container">
         <svg class="circle-progress svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </div>
      @include('header')
      <div class="banner-area6">
         <div class="container-fluid one pl--95">
            <div class="row">
               <div class="col-lg-12 d-flex flex-lg-row flex-column align-items-xxl-end align-items-lg-center justify-content-between gap-5">
                  <div class="banner-left-content">
                     <h1 class="animate__animated animate__fadeInDown"><span>{{ setting('hero_title_accent') }} </span> <br> {{ setting('hero_title') }}</h1>
                     <h3 class="first-banner animate__animated animate__fadeInLeft">{{ setting('hero_subtitle') }}</h3>
                     <div class="quate-text">
                        {{-- <div class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M35.6529 3.71829L0 39.3693L2.63069 42L38.2817 6.34713V30.9976H42V0H11.0024V3.71829H35.6529Z"></path>
                           </svg>
                        </div> --}}
                        <div class="content animate__animated animate__fadeInUp">
                           <p>{{ setting('hero_body') }}</p>
                        </div>
                     </div>
                     {{-- <ul class="btn-group">
                        <li class="success-rate">Trust
                            <span>90%</span>
                        </li>
                        <li><a href="#">Compassion</a></li>
                        <li><a href="#">Cultural Sensitivity</a></li>
                        <li><a href="#">Professionalism</a></li>
                        <li><a href="#">Confidentiality</a></li>
                        <li><a href="#">Empathy and Care</a></li>
                        <li><a href="#">Integrity</a></li>
                        <li><a href="#">Respect</a></li>
                     </ul> --}}
                  </div>
                  <div class="banner-btn magnetic-item">
                    <a class="primary-btn1 btn-hover" href="#about">
                        {{ setting('hero_cta_label', 'Explore More') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"></path>
                        </svg>
                        <span style="top: 19px; left: 144.5px;"></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{--  --}}

      {{--  --}}
      <div class="mission-section mb-130 pt-130" id="about">
        <div class="container-fluid one pl--95">

           <div class="row g-lg-4 gy-5">
              <div class="col-lg-6">
                 <div class="mission-img">
                    <img class="border-gradient-right" src="{{ media_url(setting('about_image'), 'uploads/WhatsApp Image 2024-12-12 at 06.57.08_54de3197.jpg') }}" alt="{{ setting('site_name') }}">
                 </div>
              </div>
              <div class="col-lg-6">
                 <div class="mission-content-wrap">
                    <div class="mission-content-top" style="padding-bottom:1px;">
                       <div class="section-title1 w-890">
                          <h2>{{ setting('about_title') }}</h2>
                       </div>
                       <p>{!! nl2br(e(setting('about_body'))) !!}</p>


                       <a class="primary-btn1 btn-hover" href="#vis">
                             {{ setting('about_cta_label', 'More About') }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z">
                            </path>
                            </svg>
                            <span style="top: 0.21875px; left: 193.5px;"></span>
                        </a>
                    </div>

                 </div>
              </div>
              {{-- <h5 style="font-weight:600; text-align:center"><span>Registered & Licensed By </span>The Nursing Council Of Kenya</h5> --}}
           </div>
        </div>
     </div>
      {{--  --}}
      <div class="about-section2">
         <div class="about-top">
            <div class="container-fluid one pl--95">
               <div class="row ttn-values-row">
                  <div class="col-xxl-6 col-lg-7 ttn-values-col">
                     <div class="about-content pr--95">
                        <div class="section-title1 two white">
                           <h2>{{ setting('values_title') }}</h2>
                           <div class="ttn-values-grid">
                              @foreach($coreValues as $value)
                              <div class="ttn-value-item">
                                 <strong>{{ \Illuminate\Support\Str::title($value->title) }}</strong>
                                 <p>{{ $value->description }}</p>
                              </div>
                              @endforeach
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="col-xxl-6 col-lg-5" style="padding:0px">
                        <img alt="TTN Core Values" class="core-image" style="max-height:765px; height:100%; width:100%; object-fit:cover; padding:0px" src="{{ media_url(setting('values_image'), 'uploads/9.webp') }}" alt>
                  </div>
               </div>
            </div>
         </div>
         {{--  --}}

      </div>
      {{--  --}}
      <div class="company-activities-area mb-80" id="vis">
        <div class="container-fluid one pl--95">

           <div class="row">
              {{--  --}}
              <div class="col-lg-6 ">
                <div class="about-content">
                   <div class="section-title1 two mb-50">
                    <h1 class="mission">
                        {{ setting('vision_label') }}
                    </h1>
                      <h2 style="font-size:30px">{{ setting('vision_text') }}</h2>
                   </div>
                </div>
              </div>
              {{--  --}}
              <div class="col-lg-6 right">
                <div class="about-content">
                   <div class="section-title1 two mb-50">
                        <h1 class="mission">
                            {{ setting('mission_label') }}
                        </h1>
                      <h2 style="font-size:30px">{{ setting('mission_text') }}</h2>
                   </div>
                </div>
              </div>
              {{--  --}}
           </div>
        </div>
      </div>
      {{--  --}}

      {{--  --}}
        {{--  --}}
        <div class="feature-card-section overflow-hidden mt-50" id="values">
            <div class="container-fluid one pl--95">
                <div class="section-title1 two">
                    {{-- <span>Meet Our Team</span> --}}
                    <h2>{{ setting('why_cards_title') }}</h2><br>
                </div>

                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="row g-0">
                                @foreach($features as $feature)
                                <div class="col-xxl-3 col-sm-6">
                                    <div class="eg-card-2 style-3">
                                        <div class="sl-no">
                                        <h3>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h3>
                                        </div>
                                        <div class="content">
                                        <h5>{{ $feature->title }}</h5>
                                        <p>{{ $feature->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}
      {{--  --}}
      <div class="about-section mt-130 mb-130" id="services">
        <span  id="lactation-support"></span>
        <span  id="postnatal-care"></span>
        <span  id="sleep-training"></span>
        <div class="container-fluid one pl--95">
           <div class="row g-xl-4 gy-5">
              <div class="col-xl-4">
                 <div class="about-content pr--95">
                    <div class="section-title1 two mb-50">
                       <span>{{ setting('services_eyebrow') }}</span>
                       <h2>{{ setting('services_title') }}</h2>
                    </div>
                    <a class="primary-btn1 btn-hover" href="#team">
                       {{ setting('services_cta') }}
                       <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"></path>
                       </svg>
                       <span></span>
                    </a>
                 </div>
              </div>
              <div class="col-xl-8">
                 <div class="row g-4">
                    @foreach($services as $service)
                    <div class="col-md-4" @if($service->anchor) id="{{ $service->anchor }}" @endif>
                       <div class="team-card {{ $service->card_style }}">
                          <div class="content">
                             <h4 style="font-weight:800; color:#ea854b">{{ $service->title }}</h4>
                             <ul>
                                @foreach($service->itemList() as $item)
                                <p><strong>- </strong>{{ $item }}</p>
                                @endforeach
                             </ul>
                          </div>
                          <a class="explore-btn" href="#{{ $service->anchor }}">
                             {{ $service->link_label ?: 'Read More' }}
                             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"></path>
                             </svg>
                          </a>
                       </div>
                    </div>
                    @endforeach
                 </div>
              </div>
           </div>
        </div>
     </div>
      {{--  --}}
      <div class="event-and-confarance-section mb-130" id="related">
        <div class="title">
           <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
              <path d="M25.789 12.721C21.8989 6.99787 16.7033 3.95612 13.9824 5.81985C13.6828 6.03084 13.4224 6.29267 13.2132 6.59348C13.2132 6.61546 6.91425 19.3627 6.91425 19.3627L3.39777 21.7451C2.85794 22.1116 2.3956 22.5808 2.03715 23.126C1.67871 23.6712 1.43119 24.2816 1.30873 24.9225C1.18627 25.5633 1.19127 26.2221 1.32346 26.861C1.45564 27.4999 1.7124 28.1066 2.07909 28.6462L2.23733 28.8792C2.97852 29.9589 4.11549 30.7028 5.40164 30.9497C6.68778 31.1966 8.01939 30.9264 9.10766 30.1979L14.756 38.5188C15.5868 39.5429 17.1824 40.5627 19.1516 39.3627C19.5005 39.1365 19.7981 38.8397 20.0252 38.4914C20.2523 38.1432 20.4039 37.7512 20.4703 37.3407C20.5499 36.9325 20.5477 36.5125 20.4639 36.1051C20.3802 35.6977 20.2165 35.3109 19.9824 34.9671L15.0066 27.6264C15.0066 27.6264 26.7692 26.6902 26.8132 26.6726C27.1804 26.5957 27.5286 26.4463 27.8373 26.233C29.2351 25.2836 29.7362 23.2924 29.2527 20.6242C28.8176 18.1671 27.5824 15.3847 25.789 12.721ZM3.51645 28.0133L3.35821 27.7803C3.10521 27.4078 2.92816 26.9891 2.83718 26.5482C2.74621 26.1072 2.74309 25.6526 2.82801 25.2104C2.91294 24.7683 3.08423 24.3472 3.3321 23.9713C3.57996 23.5954 3.89952 23.2721 4.27249 23.0198L7.30986 20.9539L11.3186 26.8572L8.28129 28.9231C7.90875 29.1765 7.48993 29.3539 7.04879 29.4453C6.60764 29.5366 6.15281 29.5402 5.7103 29.4557C5.26779 29.3712 4.84627 29.2003 4.46984 28.9528C4.0934 28.7053 3.76943 28.386 3.51645 28.0133ZM18.7165 35.833C18.9567 36.1905 19.0453 36.6287 18.9629 37.0514C18.8805 37.4741 18.6338 37.8469 18.2769 38.088C17.9187 38.3284 17.4799 38.4172 17.0564 38.3348C16.633 38.2524 16.2594 38.0056 16.0175 37.6484L10.3868 29.3539L12.6505 27.8155L13.2483 27.7671L18.7165 35.833ZM12.7736 26.2594L8.40436 19.8242L12.5714 11.3275C12.9758 13.7144 14.1582 16.5495 16.0483 19.3319C17.9384 22.1144 20.1362 24.2594 22.2022 25.5166L12.7736 26.2594ZM25.7406 25.2352C23.6395 25.099 20.2197 22.7297 17.323 18.4616C14.4263 14.1935 13.4857 10.1539 14.1318 8.14513C14.2485 7.76807 14.4814 7.43752 14.7971 7.2007C15.1129 6.96388 15.4954 6.83289 15.8901 6.82645C17.9736 6.82645 21.5208 9.20886 24.5011 13.6001C26.1802 16.0704 27.4022 18.655 27.7362 20.9144C28.3912 25.2352 25.7406 25.2352 25.7406 25.2352Z" />
              <path d="M20.2944 12.8836C19.756 12.7779 19.2019 12.7806 18.6645 12.8915C18.1272 13.0025 17.6173 13.2195 17.1648 13.5298C17.0814 13.5875 17.0101 13.6611 16.9552 13.7464C16.9002 13.8316 16.8626 13.9268 16.8444 14.0266C16.8262 14.1264 16.8279 14.2288 16.8493 14.328C16.8707 14.4271 16.9114 14.5211 16.9692 14.6045C17.0269 14.6879 17.1005 14.7591 17.1857 14.8141C17.271 14.8691 17.3662 14.9067 17.466 14.9249C17.5658 14.9431 17.6682 14.9414 17.7674 14.92C17.8665 14.8986 17.9605 14.8578 18.0439 14.8001C18.3305 14.6056 18.6526 14.4694 18.9918 14.3994C19.3311 14.3293 19.6808 14.3268 20.021 14.3919C20.3612 14.457 20.6852 14.5885 20.9746 14.7788C21.264 14.9691 21.5131 15.2146 21.7076 15.5012C21.9022 15.7878 22.0383 16.1099 22.1084 16.4492C22.1784 16.7884 22.181 17.1381 22.1159 17.4783C22.0508 17.8185 21.9193 18.1426 21.729 18.4319C21.5386 18.7213 21.2931 18.9704 21.0065 19.165C20.8714 19.2583 20.7697 19.3924 20.7163 19.5477C20.6628 19.703 20.6605 19.8713 20.7096 20.028C20.7588 20.1847 20.8568 20.3216 20.9893 20.4186C21.1218 20.5156 21.2819 20.5677 21.4461 20.5672C21.6028 20.5701 21.7565 20.524 21.8857 20.4353C22.5693 19.9721 23.1002 19.3165 23.4109 18.5514C23.7217 17.7863 23.7984 16.9462 23.6313 16.1375C23.4642 15.3288 23.0608 14.5879 22.4722 14.0087C21.8837 13.4294 21.1365 13.0379 20.3252 12.8836H20.2944ZM26.7384 7.37155H26.8131C27.0034 7.37147 27.1869 7.30088 27.3281 7.17343C27.4694 7.04597 27.5584 6.87069 27.578 6.68144L28.1714 0.914403C28.1849 0.812426 28.1778 0.708777 28.1505 0.609587C28.1233 0.510398 28.0764 0.417683 28.0127 0.336928C27.949 0.256173 27.8697 0.189019 27.7796 0.139438C27.6894 0.0898575 27.5903 0.0588576 27.488 0.0482727C27.3856 0.0376878 27.2822 0.0477329 27.1839 0.0778137C27.0855 0.107894 26.9941 0.1574 26.9152 0.223401C26.8363 0.289402 26.7715 0.370558 26.7245 0.462067C26.6775 0.553576 26.6494 0.65358 26.6417 0.756161L26.0527 6.52759C26.0318 6.73042 26.0923 6.93325 26.2209 7.0915C26.3494 7.24975 26.5356 7.35048 26.7384 7.37155ZM36.6813 6.18473C36.5683 6.01448 36.3926 5.89582 36.1925 5.85464C35.9924 5.81347 35.7841 5.85312 35.6131 5.96495L30.2549 9.48144C30.1158 9.57331 30.0102 9.7079 29.9542 9.86494C29.8982 10.022 29.8947 10.193 29.9443 10.3521C29.9939 10.5113 30.0939 10.6501 30.2292 10.7475C30.3645 10.845 30.5278 10.8958 30.6944 10.8924C30.8499 10.896 31.003 10.8532 31.134 10.7693L36.4923 7.25286C36.6585 7.13591 36.7717 6.95792 36.8071 6.75779C36.8425 6.55765 36.7973 6.35163 36.6813 6.18473ZM38.3208 15.5737L32.0879 14.4529C31.8868 14.4167 31.6795 14.462 31.5118 14.5786C31.344 14.6952 31.2295 14.8737 31.1933 15.0748C31.1572 15.2759 31.2024 15.4832 31.3191 15.6509C31.4357 15.8187 31.6142 15.9332 31.8153 15.9693L38.0439 17.0902H38.1802C38.3762 17.096 38.5669 17.0266 38.7135 16.8964C38.8601 16.7662 38.9514 16.5849 38.9688 16.3896C38.9862 16.1943 38.9284 15.9997 38.8071 15.8456C38.6859 15.6915 38.5103 15.5896 38.3164 15.5606L38.3208 15.5737Z" />
           </svg>
           <h3>{{ setting('related_title') }}</h3>
        </div>
        <div class="events">
           <div class="marquee_text2">
              @foreach($relatedServices as $related)
              <img width="50" alt="favicon" src="{{ media_url(setting('favicon'), 'uploads/favicon.png') }}" />
              <a href="{{ $related->url ?: '#related' }}">{{ $related->title }}</a>
              @endforeach
           </div>
        </div>
     </div>
     {{-- 1 --}}
     {{-- <div class="people-card-section  ">
        <div class="container-fluid one">
           <div class="row mb-70">
              <div class="col-lg-12">
                 <div class="people-card-top-area">
                    <div class="total-team-members-area">
                       <div class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="78" height="78" viewBox="0 0 78 78">
                             <path fill-rule="evenodd" clip-rule="evenodd" d="M66.2125 6.90541L0 73.1144L4.88557 78L71.0946 11.7875V57.5669H78V0H20.4331V6.90541H66.2125Z" />
                          </svg>
                       </div>
                       <div class="content">
                          <h4>Our Leadership Team</h4>
                          <p style="font-size:17px;">
                            Our leadership team at TTN is driven by a dynamic group of neonatal and experienced nurses who bring a wealth of expertise and passion to the forefront of our mission. Their deep understanding of healthcare, combined with hands-on experience, ensures that our organization remains steadfast in delivering exceptional care and innovative solutions to meet the needs of our community.
                          </p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>

        </div>
     </div> --}}
     {{-- 2 --}}
     <div class="people-section mb-130" id="team">
        <div class="container-fluid one pl--95">
           <div class="row g-lg-4 gy-5">
              <div class="col-lg-5">
                 <div class="people-left-content pr--95">
                    <div class="section-title1 two">
                       <span>{{ setting('team_eyebrow') }}</span>
                       <h2>{{ setting('team_title') }}</h2><br>
                       <p>{!! nl2br(e(setting('team_body'))) !!}</p>
                       {{-- <a class="primary-btn1 btn-hover" href="#services">
                          Explore Services
                          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                             <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"></path>
                          </svg>
                          <span></span>
                       </a> --}}
                    </div>

                 </div>
              </div>
              <div class="col-lg-7">
                 <div class="row g-4">
                    @foreach($teamMembers as $member)
                    <div class="col-xxl-6 col-lg-6 col-md-4 col-sm-6">
                       <div class="people-card1">
                          <div class="people-flip-box-layer people-flip-box-front">
                             <div class="people-img">
                                <img src="{{ media_url($member->photo) }}" alt="{{ $member->name }}">
                             </div>
                             <div class="content">
                                <h5><a href="#">{{ $member->name }}</a></h5>
                                @if($member->role)<span>{{ $member->role }}</span>@endif
                             </div>
                          </div>
                          <div class="people-flip-box-layer people-flip-box-back">
                             <div class="social-and-comtent">
                                <div class="social-and-btn">
                                   <ul class="social-icon">
                                      @if($member->linkedin)<li><a href="{{ $member->linkedin }}"><i class="bx bxl-linkedin"></i></a></li>@endif
                                      @if($member->twitter)<li><a href="{{ $member->twitter }}"><i class="bx bxl-twitter"></i></a></li>@endif
                                   </ul>
                                </div>
                                <p>{!! nl2br($member->bio) !!}</p>
                             </div>
                          </div>
                       </div>
                    </div>
                    @endforeach
                 </div>
              </div>
           </div>
        </div>
      </div>

      {{--  --}}

      {{--  --}}
      <div class="people-section ttn-consultants-section mb-130" id="team">
        <div class="container-fluid one pl--95">
           <div class="row g-lg-4 gy-5 ttn-consultants-row">

              <div class="col-lg-6 ttn-consultants-media">
                   <div class="mission-img teams-image">
                       <img src="{{ media_url(setting('consultants_image'), 'uploads/5.jpg') }}" alt="{{ setting('site_name') }} Team">
                    </div>
              </div>
              <div class="col-lg-6">
                 <div class="people-left-content pr--95">
                    <div class="section-title1 two">

                       <h2>{{ setting('consultants_title') }}</h2><br>
                       <p>{!! nl2br(e(setting('consultants_intro'))) !!}</p>
                          <ul>
                            @foreach($consultantSkills as $skill)
                            <li><strong> {{ $skill->title }}:</strong>{{ $skill->description }}</li>
                            @endforeach
                          </ul>
                       <a class="primary-btn1 btn-hover" href="#services">
                          {{ setting('consultants_cta', 'Explore Services') }}
                          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                             <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"></path>
                          </svg>
                          <span></span>
                       </a>
                    </div>

                 </div>
              </div>
           </div>
        </div>
      </div>
{{--  --}}
      <div class="home6-about-section" id="why">
        <div class="container-fluid one pl--95">
           <div class="row g-4">
              <div class="col-lg-3 d-flex justify-content-lg-center">
                 <div class="sub-title">
                    <span>{{ setting('why_banner_label') }}</span>
                 </div>
              </div>
              <div class="col-lg-9 gap-lg-5 gap-4 d-flex flex-lg-nowrap flex-wrap align-items-start justify-content-between">
                 <div class="section-title1 white">
                    <h2>{!! nl2br(e(setting('why_banner_body'))) !!}</h2>
                 </div>
                 <a class="explore-btn" href="#values">
                    {{ setting('why_banner_cta') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"></path>
                    </svg>
                 </a>

              </div>
           </div>
        </div>
     </div>




      <div class="contect-section6" id="contact-me">
         <div class="container-fluid one pl--95">
            <div class="row g-lg-4 gy-5">
               <div class="col-lg-7" style="margin:0 auto">
                  <div class="ttn-contact-card">
                  <div class="contact-form-area two">
                     <div class="ttn-contact-head">
                        <span>Contact Us</span>
                        <h2>{{ setting('cta_label', 'Get in Touch') }}</h2>
                        <p>Share a little about your family and we will get back to you.</p>
                        <div class="ttn-contact-meta">
                           @if(setting('contact_email'))
                           <a href="mailto:{{ setting('contact_email') }}">{{ setting('contact_email') }}</a>
                           @endif
                           @if(setting('phone_primary'))
                           <a href="tel:{{ setting('phone_primary') }}">{{ setting('phone_primary') }}</a>
                           @endif
                           @if(setting('phone_secondary'))
                           <a href="tel:{{ setting('phone_secondary') }}">{{ setting('phone_secondary') }}</a>
                           @endif
                        </div>
                     </div>
                     <form method="POST" action="{{url('send-message')}}">
                        @csrf
                        @if(session('error'))
                            <p class="ttn-form-error">{{ session('error') }}</p>
                        @endif
                        <div class="row">
                           <div class="col-lg-6 mb-30">
                              <div class="form-inner">
                                 <label>{{ setting("contact_name_label") }}</label>
                                 <input required type="text" placeholder="Dan Maeba" name="name">
                              </div>
                           </div>
                           <div class="col-lg-6 mb-30">
                              <div class="form-inner">
                                 <label>{{ setting("contact_email_label") }}</label>
                                 <input required type="email" placeholder="{{ setting("contact_email") }}" name="email">
                              </div>
                           </div>
                           <div class="col-lg-12 mb-15">
                              <div class="form-inner">
                                 <label>{{ setting("contact_message_label") }}</label>
                                 <textarea required placeholder="What’s on your mind" name="massage"></textarea>
                              </div>
                           </div>
                           <?php
                           $num1 = rand(0, 50);
                           $num2 = rand(0, 15);
                           $answer = $num1 + $num2;
                           ?>
                       <input type="hidden" name="correct_answer" id="correct_answer" value="{{$answer}}">
                       <input required value="{{$answer}}" type="hidden" name="verify_contact">
                           <div class="col-md-6 mb-30 ttn-human-check">
                               <label>{{ setting('contact_human_label', 'Are you human?') }} {{$num1}} + {{$num2}} =</label>
                               <input required type="text" name="verify_contact_input" placeholder="Your answer">
                           </div>
                           <div class="col-lg-12">
                              <div class="form-inner">
                                 <button class="primary-btn1 btn-hover" type="submit">
                                    {{ setting('contact_submit_label') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"></path>
                                    </svg>
                                    <span></span>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{--  --}}
      <div class="testimonial-section2 mb-130 mt-130">
        <div class="container-fluid one pl--95 pr--95">
            <div class="section-title1 two">

                <h2>{{ setting('testimonials_title') }}</h2><br>
            </div>
           <div class="row">
              <div class="col-lg-12">
                 <div class="tastimonial-wrap2">
                    <div class="sriper testimonial-slider2 mb-30">
                       <div class="swiper-wrapper">
                          @foreach($testimonials as $testimonial)
                          <div class="swiper-slide">
                             <div class="testimonial-card">
                                <div class="testimonial-img magnetic-item"></div>
                                <div class="testimonal-content">
                                   <span>{{ $testimonial->headline }}</span>
                                   <p>{{ $testimonial->quote }}</p>
                                   <div class="author-area">
                                      <div class="content">
                                         <h6>{{ $testimonial->author }}</h6>
                                         <span>{{ $testimonial->role }}</span>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          @endforeach
                       </div>
                    </div>
                    <div class="slider-btn-area">
                       <div class="franctional-pagi2"></div>
                       <span class="dash"></span>
                       <div class="slider-btn-group w-100">
                          <div class="slider-btn prev-3">
                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.416666 5.9668H15V4.7168H0.416666V5.9668Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.04115 4.7168C3.98115 4.7168 6.38281 7.3018 6.38281 10.0585V10.6835H5.13281V10.0585C5.13281 7.96596 3.26448 5.9668 1.04115 5.9668H0.416979V4.7168H1.04115Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.04115 5.96667C3.98115 5.96667 6.38281 3.38167 6.38281 0.625V0H5.13281V0.625C5.13281 2.71833 3.26448 4.71667 1.04115 4.71667H0.416979V5.96667H1.04115Z" />
                             </svg>
                          </div>
                          <div class="slider-btn next-3">
                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5833 5.9668H0V4.7168H14.5833V5.9668Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9589 4.7168C11.0189 4.7168 8.61719 7.3018 8.61719 10.0585V10.6835H9.86719V10.0585C9.86719 7.96596 11.7355 5.9668 13.9589 5.9668H14.583V4.7168H13.9589Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9589 5.96667C11.0189 5.96667 8.61719 3.38167 8.61719 0.625V0H9.86719V0.625C9.86719 2.71833 11.7355 4.71667 13.9589 4.71667H14.583V5.96667H13.9589Z" />
                             </svg>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
      {{--  --}}
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
      <script>
         $(".marquee_text2").marquee({
             direction: "left",
             duration: 25000,
             gap: 50,
             delayBeforeStart: 0,
             duplicated: true,
             startVisible: true,
         });
      </script>
      {{--  --}}
      <!--Floating WhatsApp javascript-->
     <script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>

     <script type="text/javascript">
         $(function () {
             $('#WAButton').floatingWhatsApp({
                 phone: '{{ setting('whatsapp_number') }}',
                 headerTitle: '{{ setting('whatsapp_title') }}',
                 popupMessage: '{{ setting('whatsapp_popup') }}',
                 message: '{{ setting('whatsapp_prefill') }}',
                 showPopup: true, //Enables popup display
                 buttonImage: '<img alt="trusted touch nursing whatsapp" src="{{url('/')}}/uploads/whatsapp.svg" />', //Button Image
                 //headerColor: 'crimson', //Custom header color
                 //backgroundColor: 'crimson', //Custom background button color
                 position: "left" //Position: left | right

             });
         });
     </script>
   </body>
</html>
