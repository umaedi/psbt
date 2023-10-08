@extends('layouts.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Email Verification</h1>
    </div>

    <div class="section-body">
      <form action="/email/verification-notification" method="POST">
      @csrf
          <div class="row">
          <div class="col-12 mb-4">
              @if (session('status') == 'verification-link-sent')
              <div class="mb-4 alert alert-success">
                  A new email verification link has been emailed to you!
              </div>
              @endif
              <div class="hero bg-primary text-white">
              <div class="hero-inner">
                  <h2>Welcome, {{ auth()->user()->name }}</h2>
                  <p class="lead">You almost arrived, Verify your email by clicking on the link we send you via your registered email in our system.
                    If you do not receive the email, please click the resend verification email button below.</p>
                  <div class="mt-4">
                  <button type="submit" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Resending Email Verification</button>
                  </div>
              </div>
              </div>
          </div>
          </div>
      </form>
    </div>
  </section>
</div>
@endsection