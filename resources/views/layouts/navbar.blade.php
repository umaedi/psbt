<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar container">
  <ul class="navbar-nav navbar-right ml-auto">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user mr-auto">
      <img alt="image" src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->img) }}" class="rounded-circle mr-1" width="100">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        @if ( auth()->user()->level == "user" )
        <a href="/user/profile" class="dropdown-item has-icon">
          Profile
        </a>
        @elseif(auth()->user()->level == "reviewer")
        <a href="/reviewer/profile" class="dropdown-item has-icon">
          Profile
        </a>
        @else
        <a href="/admin/profile" class="dropdown-item has-icon">
          Profile
        </a>
        @endif
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button  class="dropdown-item has-icon text-danger">Logout</button>
        </form>
      </div>
    </li>
  </ul>
</nav>