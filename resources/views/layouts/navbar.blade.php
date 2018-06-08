<header>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="logo">
          <a href="#">
            <img src="{{asset('img/logo.png')}}" align="">
          </a>
        </div>
        <div class="toggle_menu">
          <label>&#9776;</label>
        </div>
      </div>
      <div class="col-md-9">
        <nav>
            <ul>
              <li class="active">
                <a href="/">Home</a>
              </li>
              <li>
                <a href="/about">About</a>
              </li>
              <li>
                <a href="/contact">Contact</a>
              </li>
              @if(!Auth::check())
                <li>
                  <a href="/login" rel="nofollow">Log In</a>
                </li>
                <li>
                  <a href="/register" rel="nofollow">Register</a>
                </li>
              @endif
              @if(Auth::check())
                <?php $profile = \App\Profile::firstOrNew(array('user_id' => Auth::user()->id)) ?>
                <li class="nav-item dropdown navbar navbar-expand-lg navbar-light bg-light">
                  <a class="nav-link dropdown-toggle nav-dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('').$profile->profile_image }}" height="40" width="40" alt="Avatar" class="rounded-circle"> <span class="icon-caret-down"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a href="" data-toggle="modal" data-target="#overallModal" style="margin-left: 25px">View Profile</a>
                    <a href="/logout" style="margin-left: 25px">Log out</a>
                  </div>
                </li>
              @endif
            </ul>
        </nav>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</header>