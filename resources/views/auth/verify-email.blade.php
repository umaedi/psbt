<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Email Verification</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/style.css">
  <link rel="stylesheet" href="{{ asset('css') }}/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <img data-src="{{ asset('img/email_verification.png') }}" width="350" class="lazyload img-fluid" alt="Closing">
            <div class="page-description mt-3">
            	We've just sent an activation link to your email.<br>
              If you do not receive the email, please click the button below<br>
              to resend the activation link
            </div>
            <div class="page-search">
              <form action="/email/verification-notification" method="POST">
                @csrf
                <div class="form-group floating-addon floating-addon-not-append">
                  @if (session('status') == 'verification-link-sent')
                  <div class="mb-4 alert alert-success">
                      A new email verification link has been emailed to you!
                  </div>
                  @endif
                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Resending Email Verification</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="simple-footer">
            Developed by <a href="https://api.whatsapp.com/send?phone={{ env('NO_DEV') }}" target="_blank">Yoru</a>. Copyright &copy; 2023
        </div>
      </div>
    </section>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
</body>
</html>
