<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('employees.view') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Employee
              </p>
            </a>
          </li>
          {{-- <li class="nav-item has-treeview {{ ($prefix=='/employees')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                    Manage User
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.view') }}" class="nav-link {{ ($route=='users.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View User</p>
                    </a>
                </li>

            </ul>
        </li> --}}
        </ul>
      </nav>
    </div>
  </aside>
