    <!-- ilgili duzenlemeler ve link yonlendirmeleri yapildi  -->
    
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('backend/mic_logo2.png')}}" alt="Microsoft logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light">Microsoft LTE 3</span>
      </a>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
            
            <!-- company aside i -->
            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Company
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('company-list')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Company List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('company-add')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Add New Company</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- employee aside i -->
            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Employee
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('employee-list')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Employee List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('employee-add')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Add New Employee</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- logout islemleri -->
            <li class="nav-header">LOGOUT</li>
            <li class="nav-item">
              <a href="{{route('admin.logout')}}" class="nav-link">
                <i class="nav-icon far fas fa-arrow-circle-right text-danger"></i>
                  <p> LOGOUT </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
