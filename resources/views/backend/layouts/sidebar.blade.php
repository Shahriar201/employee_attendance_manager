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

      @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
      @endphp

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

          @can('access control')
            <li class="nav-item has-treeview {{ ($prefix=='/manages')?'menu-open':'' }}">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Access Control
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('view permission')
                        <li class="nav-item">
                            <a href="{{ route('permissions.view') }}" class="nav-link {{ ($route=='permissions.view')?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    @endcan
                    @can('view role')
                        <li class="nav-item">
                            <a href="{{ route('roles.view') }} " class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Roles</p>
                            </a>
                        </li>
                    @endcan


                </ul>
            </li>
          @endcan

          @can('view role')
            <li class="nav-item has-treeview {{ ($prefix=='/employees')?'menu-open':'' }}">
                @can('view role')
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Employee
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                @endcan
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employees.view') }}" class="nav-link {{ ($route=='employees.view')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employee</p>
                        </a>
                    </li>

                    @can('employee details')
                        <li class="nav-item">
                            <a href="{{ route('employees.details.view') }} " class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Details</p>
                            </a>
                        </li>
                    @endcan
                    @can('employee contact')
                        <li class="nav-item">
                            <a href="{{ route('employees.contacts.view') }} " class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Contact</p>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ route('all.employees.attendance.list') }} " class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Attendance List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('all.employees.attendance.report') }} " class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employee Reports</p>
                        </a>
                    </li>

                </ul>
            </li>
          @endcan

          <li class="nav-item">
            <a href="{{ route('employees.attendance.add') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('employees.attendance.list') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Attendance List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('employees.attendance.report') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Attendance Report
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
