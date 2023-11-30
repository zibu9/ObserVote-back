<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
      <span class="brand-text font-weight-light">ObserVote</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-wpforms"></i>
              <p>
                Formulaire
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nouveau
                    <span class="badge badge-success right">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste
                    <span class="badge badge-success right">All</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Divers</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>
                Provinces
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nouveau
                    <span class="badge badge-success right">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste
                    <span class="badge badge-success right">All</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Circonscriptions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nouveau
                    <span class="badge badge-success right">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste
                    <span class="badge badge-success right">All</span>
                  </p>
                </a>
              </li>
            </ul>
          </li> --}}
{{--
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Profession
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('professions.create') }}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nouveau
                    <span class="badge badge-success right">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('professions.index') }}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste
                    <span class="badge badge-success right">All</span>
                  </p>
                </a>
              </li>
            </ul>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
