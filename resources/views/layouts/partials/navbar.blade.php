  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @if ((auth()->user()->role->id < 3))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('change-password') }}">
                <i class="fas fa-user-edit"></i>Change Password
            </a>
        </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="fas fa-power-off"></i> Deconnexion
        </a>
        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">@csrf</form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
