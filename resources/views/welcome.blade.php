<!doctype html>
<html class="no-js" lang="zxx">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>e-form</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img') }}/favicon.png">
      <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
      <link rel="stylesheet" href="{{ asset('css') }}/default.css">
      <link rel="stylesheet" href="{{ asset('css') }}/style.css">
   </head>
   <body>


      <!-- header area start -->
      <header>
         <div id="header-sticky" class="header__area header__border-bottom header__padding grey-bg-9">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                     <div class="logo">
                        <a href="index.html">
                           <img src="{{ asset('img') }}/logo/logo-tuba.png" alt="logo" width="40">
                        </a>
                     </div>
                  </div>
                  <div class="col-xxl-7 col-xl-7 col-lg-7 d-none d-lg-block">
                     <div class="main-menu main-menu-4 pl-20">
                        <nav id="mobile-menu">
                           <ul>
                              <li><a href="contact.html">Home</a></li>
                              <li><a href="contact.html">Kontak</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <main>
         <!-- hero area start -->
         <section class="hero__area hero__height-4 grey-bg-9 p-relative d-flex align-items-center">
            <div class="hero__shape-4">
               <img class="smile" src="{{ asset('img') }}/icon/hero/home-4/smile.png" alt="">
               <img class="smile-2" src="{{ asset('img') }}/icon/hero/home-4/smile-2.png" alt="">
               <img class="cross-1" src="{{ asset('img') }}/icon/hero/home-4/cross-1.png" alt="">
               <img class="cross-2" src="{{ asset('img') }}/icon/hero/home-4/cross-2.png" alt="">
               <img class="cross-3" src="{{ asset('img') }}/icon/hero/home-4/cross-3.png" alt="">
               <img class="dot-1" src="{{ asset('img') }}/icon/hero/home-4/dot-1.png" alt="">
               <img class="dot-2" src="{{ asset('img') }}/icon/hero/home-4/dot-2.png" alt="">
               <img class="dot-3" src="{{ asset('img') }}/icon/hero/home-4/dot-3.png" alt="">
            </div>
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-7 col-xl-7 col-lg-6">
                     <div class="hero__content-4 pr-70">
                        <h3 class="hero__title-4 wow fadeInUp" data-wow-delay=".3s"> <span>Permohonan</span> Surat Bebas Temuan</h3>
                        <p class="wow fadeInUp" data-wow-delay=".5s">Sebuah inovasi yang dirancang untuk mempermudah pelayanan masyarakat serta untuk mempermudah proses administrasi di inspektorat Kabupaten Tulang Bawang</p>

                        <div class="hero__btn-4">
                           <button data-toggle="modal" data-target=".bd-example-modal-lg" class="w-btn-round mr-25 wow fadeInUp" data-wow-delay=".9s">Daftar</button>
                           <button type="button" class="w-btn-round w-btn-round-2 wow fadeInUp" data-wow-delay="1.2s" data-toggle="modal" data-target="#exampleModalCenter">
                              Login
                            </button>
                        </div>

                     </div>
                  </div>
                  <div class="col-xxl-5 col-xl-5 col-lg-6">
                     <div class="hero__thumb-4-wrapper">
                        <div class="hero__thumb-4 p-relative">
                           <img class="girl" src="{{ asset('img') }}/hero/home-4/girl.png" alt="">
                           <img class="flower" src="{{ asset('img') }}/hero/home-4/flower.png" alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- hero area end -->
         <!-- Modal -->
         <div class="modal fade bd-example-modal-lg" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Formulir Pendaftaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
               <form id="formRegister">
                  @csrf
                  <div class="row">
                     <div class="col-md-3">
                       <div class="card">
                         <div class="card-body">
                           <img id="imgPrev" src="{{ asset('img/avatar-1.png') }}" alt="photo" width="100%">
                         </div>
                       </div>
                     </div>
                     <div class="col-md-9">
                       <div class="card">
                         <div class="card-body">
                           <div class="form-group mb-3">
                             <label for="photo">Photo</label>
                             <input type="file" class="form-control" name="img" onchange="previewImg()" accept=".png, .jpg, .jpeg" id="image">
                         </div>
                         <div class="form-group">
                             <label for="name">Nama Lengkap</label>
                             <input type="text" class="form-control" id="name" name="nama">
                         </div>
                         </div>
                       </div>
                     </div>
                   </div>
                     <div class="form-group mb-3">
                       <label for="nik">NIK</label>
                       <input type="number" class="form-control" id="nik" name="nik">
                     </div>
                     <div class="form-group mb-3">
                       <label for="jenis_kelamin">Jenis Kelamin</label>
                       <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                        <option value="">--pilih opsi--</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                     </div>
                     <div class="form-group mb-3">
                       <label for="t_lahir">Tempat Lahir</label>
                       <input type="text" class="form-control" id="t_lahir" name="tempat_lahir">
                     </div>
                     <div class="form-group mb-3">
                       <label for="tgl_lahir">Tanggal Lahir</label>
                       <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                     </div>
                     <div class="form-group mb-3">
                       <label for="no_tlp">No Telpon Aktif</label>
                       <input type="number" class="form-control" id="no_tlp" name="no_tlp">
                     </div>
                     <div class="form-group mb-3">
                       <label for="agama">Agama/Kepercayaan</label>
                       <select class="form-control" id="exampleFormControlSelect1" name="agama">
                        <option value="">--pilih opsi--</option>
                        <option value="Islam">ISLAM</option>
                        <option value="Protestan">PROTESTAN</option>
                        <option value="Katolik">KATOLIK</option>
                        <option value="Hindu">HINDU</option>
                        <option value="Budha">BUDHA</option>
                        <option value="Khonghucu">KHONGHUCU</option>
                      </select>
                     </div>
                     <div class="form-group mb-3">
                       <label for="domisili">Alamat Tempat Tinggal</label>
                       <textarea type="text" class="form-control" id="domisili" name="tempat_tinggal"></textarea>
                     </div>
                     <div class="form-group mb-3">
                       <label for="email">Alamat Email</label>
                       <input type="email" class="form-control" id="email" name="email">
                     </div>
                     <div class="form-group mb-3">
                        <label for="agama">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                         <option value="">--pilih opsi--</option>
                         <option value="pns">Saya Seorang Pegawai Negeri Sipil</option>
                         <option value="non pns">Saya Bukan Pegawai Negeri Sipil</option>
                       </select>
                      </div>
                     <div class="form-group mb-3">
                       <label for="password">Password</label>
                       <input type="password" class="form-control" id="password" name="password">
                     </div>
                     <div class="form-group mb-3">
                       <label for="confirm-password">konfirmasi Password</label>
                       <input type="password" class="form-control" id="password" name="password_confirmation">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                     @include('layouts._loading')
                     <button id="btn_submit" type="submit" class="btn btn-primary">Daftar</button>
                  </div>
               </form>
            </div>
            </div>
         </div>

         <!-- Modal login-->
         <div class="modal fade" data-backdrop="static" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">LOGIN</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="login">
                     @csrf
                     <div class="form-group mb-3">
                       <label for="email">Email</label>
                       <input type="email" class="form-control" id="email" name="email">
                     </div>
                     <div class="form-group">
                       <label for="password">Password</label>
                       <input type="password" class="form-control" id="password" name="password">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                     @include('layouts._loading_login')
                     <button id="btn_login" type="submit" class="btn btn-primary">Login</button>
                  </div>
               </form>
            </div>
            </div>
         </div>
      </main>
      <script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
      <script src="{{ asset('js') }}/bootstrap.min.js"></script>
      <script src="{{ asset('js') }}/sweetalert.min.js"></script>
      <script type="text/javascript">
         $("#formRegister").submit(function(e) {
            e.preventDefault();
            
            var form = $(this)[0];
            var data = new FormData(form);

            loadingsubmit(true);
            $.ajax({
                'url': '/register',
                'type': 'POST',
                'data': data,
                'processData': false,
                'contentType': false,
                'cache': false,
                success(res) {
                  $('#exampleModal').modal('hide');
                   swal({text: res.message, icon: 'success'});
                   loadingsubmit(false)
               },
               error(res) {
                  loadingsubmit(false);
                  if(res.status == 404){
                     swal({text: res.responseJSON.message, icon: 'error'});
                  }else{
                     swal({text: 'Internal Server Error!', icon: 'error'});
                  }
                }
            });

            function loadingsubmit(state){
               if(state) {
                  $('#btn_loading').removeClass('d-none');
                  $('#btn_submit').addClass('d-none');
               }else {
                  $('#btn_loading').addClass('d-none');
                  $('#btn_submit').removeClass('d-none');
               }
            }
         });

         //login
         $("#login").submit(function(e) {
            e.preventDefault();
            
            var form = $(this)[0];
            var data = new FormData(form);

            loadingsubmit(true);
            $.ajax({
                'url': '/login',
                'type': 'POST',
                'data': data,
                'processData': false,
                'contentType': false,
                'cache': false,
                success(res) {
                  $('#exampleModalCenter').modal('hide');
                   swal({text: res.message, icon: 'success', timer: 3000});
                   loadingsubmit(false)
               },
               error(res) {
                  $('#exampleModalCenter').modal('hide');
                  loadingsubmit(false);
                  if(res.status == 401){
                     swal({text: res.message, icon: 'error'});
                  }else{
                     swal({text: 'Internal Server Error!', icon: 'error'});
                  }
                }
            });

            function loadingsubmit(state){
               if(state) {
                  $('#btn_loading_login').removeClass('d-none');
                  $('#btn_login').addClass('d-none');
               }else {
                  $('#btn_loading_login').addClass('d-none');
                  $('#btn_login').removeClass('d-none');
               }
            }
         });

         function previewImg(){
            const imgPreview = document.querySelector('#imgPrev');
            const image = document.querySelector('#image');
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob; 
         }
      </script>
   </body>
</html>

