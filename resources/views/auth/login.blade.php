@extends('layouts.app')
@section('content')
<main>
    <!-- sign up area start -->
    <section class="signup__area po-rel-z1 pt-100 pb-145">
       <div class="container">
          <div class="row">
             <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
                <div class="my-4 text-center mb-55">
                    <h3>LOGIN</h3>
                    <p>Silakan login menggunakan email dan password Anda</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                  <div class="sign__wrapper white-bg">
                     @if ($errors->any())
                     <div class="alert alert-danger">Email atau Password salah!</div>
                     @endif
                    <form action="/login" method="POST">
                     @csrf
                        <div class="form-group mb-3">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group mb-3">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-check">
                          <input type="checkbox" name="remember" class="form-check-input" id="check">
                          <label class="form-check-label"  for="check">Biarkan saya login selama 1 bulan</label>
                        </div>
                        <button type="submit" class="w-btn-round w-btn-round-header mt-3">Login</button>
                      </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- sign up area end -->
 </main>
@endsection