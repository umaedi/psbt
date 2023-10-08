@extends('layouts.auth')
@section('content')
<div class="container p-2 flex h-screen overflow-hidden">
  <!-- Images -->
  <div class="left-content hidden md:flex md:w-1/2 justify-center items-center">
      <img src="{{ asset('dist') }}/img/public-talk.gif" alt="International Conference" class="w-[500px] h-[500px]">
  </div>

  <!-- Form -->
  <div class="right-content w-full md:w-1/2 overflow-scroll py-10 px-4 md:p-10 flex flex-col gap-5">
      <div class="wrapper">
          <div
              class="wrapper w-[240px] md:w-[120px] lg:w-[240px] h-[80px] md:h-[40px] lg:h-[80px] rounded-md overflow-hidden group">
              <img class="w-full h-full object-cover"
                  src="{{ asset('dist') }}/img/logo-icomesh.png" alt="logo icomesh">
          </div>
      </div>
      <div class="flex flex-col gap-1 items-start md:items-start">
          <h1 class="text-mydark font-bold text-2xl md:text-3xl">Forgot Password</h1>
          <p class="text-primary text-xs lg:text-base font-semibold">Please give us your registered email & we'll
              send you a link to reset your password</p>
      </div>

      <form action="/forgot-password" method="POST" class="input-area flex flex-col gap-10 group">
        @csrf  
          <div class="wrapper flex flex-col gap-2">

              <!-- Email -->
              <div class="form-control w-full">
                <label for="email" class="label">
                    <span class="label-text">Email</span>
                </label>
                <input id="email" name="email" type="email" autocomplete="email" required
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Example: wahyuaji@gmail.com"
                    class="peer input input-bordered input-accent @error('email') invalid:border-red-500 @enderror w-full text-sm" />
                @error('email')
                <label class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                 {{ $message }}
                </label>
                @enderror
                   
            </div>
          </div>

          <!-- Button Sign In -->
          <div class="wrapper flex flex-col gap-0">
              <button type="submit"
                  class="w-full py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                  Submit
              </button>
          </div>
      </form>

      <p class="text-sm text-mydark text-center">Remember your password? <span
              class="text-primary hover:text-mydark"><a href="/login">Login</a></span></p>

      <div class="wrapper w-fit">
          <a href="/" class="text-mydark hover:text-primary text-sm flex gap-1 items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path
                      d="M14.8586 7.33333V8.66667H5.20129L7.36329 10.8287L6.42063 11.7713L2.64929 8L6.41996 4.22867L7.36263 5.17133L5.20129 7.33333H14.8586ZM1.99996 12V4H0.666626V12H1.99996Z"
                      fill="#343741" />
              </svg>
              <span>Back Home</span>
          </a>
      </div>
  </div>
</div>
@endsection
