<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="theme-color" content="#2691DB"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? "Inspektorat" }}</title>
  <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.4.3.1.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/main.css">
  <link rel="stylesheet" href="{{ asset('css') }}/components.css">
  @stack('css')
</head>
<body>
  <div id="app">
    <div class="main-wrapper container">
      @include('layouts.navbar')
      @yield('content')
      @include('layouts.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
  {{-- <script src="{{ asset('js') }}/stisla.js"></script> --}}
  <script src="{{ asset('js') }}/sweetalert.min.js"></script>

  {{-- <script src="{{ asset('js') }}/scripts.js"></script> --}}
  {{-- <script src="{{ asset('js') }}/custom.js"></script> --}}
<script type="text/javascript">
  document.getElementById('btnSubmit').addEventListener('click', function() {
    document.getElementById('btnLoading').classList.remove('d-none');
    document.getElementById('btnSubmit').classList.add('d-none');
   });
async function transAjax(data) {
    html = null;
    data.headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    await $.ajax(data).done(function(res) {
        html = res;
    })
        .fail(function() {
            return false;
        })
    return html
}
</script>
@stack('js')
</body>
</html>
