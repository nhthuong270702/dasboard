<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa fa-user fa-fw"></i>
            </a>
          <ul class="dropdown-menu dropdown-user" style="width: 250px; padding:10px 20px; line-height: 25px">
              @if(Auth::user())
              <li>
                  <i class="fa fa-user fa-fw"></i>
                      {{Auth::user()->name}}
              </li>
              <li>
                  <a href="/user/edit/{{Auth::user()->id}}"><i class="fa fa-bug fa-fw"></i>
                      Settings</a>
              </li>
              <li class="divider"></li>
              <li>
                  <a href="logout"><i class="fa fa-share fa-fw"></i>
                      Logout</a>
              </li>
              @endif
          </ul>
        </li>
      </ul>
  </nav>
