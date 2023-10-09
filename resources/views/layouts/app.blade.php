<!doctype html>
<html class="no-js" lang="zxx">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Inspektorat | E-form </title>
      <meta name="description" content="Permohonan surat bebas temuan inspektorat Kabupaten Tulang Bawang">
      <meta name="keywords" content="Permohonan surat bebas temuan"/>
      <meta property="og:url" content="https://psbt-inspektorat.tulangbawangkab.go.id/"/>
      <meta property="og:title" content="Permohonan surat bebas temuan inspektorat Kabupaten Tulang Bawang"/>
      <meta property="og:description" content="Permohonan surat bebas temuan inspektorat Kabupaten Tulang Bawang" />
      <meta property="og:image" content="{{ asset('img/thumbnail.jpg') }}"/>
      <meta property="og:image:url" content="{{ asset('img/thumbnail.jpg') }}"/>
      <meta property="twitter:image" content="{{ asset('img/thumbnail.jpg') }}"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img') }}/favicon.png">
      <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
      <link rel="stylesheet" href="{{ asset('css') }}/meanmenu.css">
      <link rel="stylesheet" href="{{ asset('css') }}/style.css">
      {{-- <link href="{{ asset('css') }}/offcanvas.css" rel="stylesheet"> --}}
   </head>
   <body>
   <!-- header area start -->
  <!-- header area start -->
  <header>
   <div id="header-sticky" class="header__area header__border-bottom header__padding grey-bg-9">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
               <div class="logo">
                  <a href="/">
                     <img src="{{ asset('img') }}/logo/logo-tuba.png" alt="logo" width="40">
                  </a>
               </div>
            </div>
            <div class="col-xxl-7 col-xl-7 col-lg-7 d-none d-lg-block">
               <div class="main-menu main-menu-4 pl-20">
                  <nav id="mobile-menu">
                     <ul>
                        <li><a href="/">Beranda</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-6">
               <div class="header__right text-end d-flex align-items-center justify-content-end">
                  <div class="header__right-btn d-none d-md-flex d-xl-block align-items-center">
                     <a href="#" class="w-btn-round w-btn-round-header ml-30">Kontak</a>
                  </div>
                  <div class="sidebar__menu d-lg-none">
                     <div class="sidebar-toggle-btn sidebar-toggle-btn-2" id="sidebar-toggle">
                         <span class="line"></span>
                         <span class="line"></span>
                         <span class="line"></span>
                     </div>
                 </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- header area end -->

<!-- sidebar area start -->
<div class="sidebar__area">
   <div class="sidebar__wrapper">
      <div class="sidebar__close">
         <button class="sidebar__close-btn" id="sidebar__close-btn">
         <span>X</span>
         <span>close</span>
         </button>
      </div>
      <div class="sidebar__content">
         <div class="logo mb-40">
            <a href="/">
            <img src="{{ asset('img') }}/logo/logo-tuba.png" alt="logo" width="30">
            </a>
         </div>
         <div class="mobile-menu mobile-menu-5"></div>
         <div class="sidebar__info mt-350">
            <a href="#" class="w-btn w-btn-11 d-block">Kontak</a>
         </div>
      </div>
   </div>
</div>
<!-- sidebar area end -->      
<div class="body-overlay"></div>
<!-- sidebar area end -->
@yield('content')
<script src="{{ asset('js') }}/vendor/jquery-3.5.1.min.js"></script>
<script src="{{ asset('js') }}/jquery.meanmenu.js"></script>
<script src="{{ asset('js') }}/main.js"></script>
<script type="text/javascript">
   function previewImg(){
      const imgPreview = document.querySelector('#imgPrev');
      const image = document.querySelector('#image');
      const blob = URL.createObjectURL(image.files[0]);
      imgPreview.src = blob; 
   }
</script>
</body>
</html>