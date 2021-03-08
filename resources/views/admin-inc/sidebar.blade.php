
<aside class="main-sidebar sidebar-dark-primary elevation-4 text-sm " >
    <!-- Brand Logo -->
     
    <a href="#" class="brand-link logo-switch" style="background-color: white" >
      <img src="{{ asset("assets/dist/img/alogo5.jpg") }}" alt="AdminLTE Docs Logo Small" class="brand-image-xl logo-xs">
      <img src="{{ asset("assets/dist/img/alogo2.jpg") }}" alt="AdminLTE Docs Logo Large" class="brand-image-xl logo-xl" style="width:200px;">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 pb-1 mb-1 d-flex">
        <div class="image" style="margin-top:10px" >
          <img src="{{asset("assets/dist/img/photo.jpg") }}"  class="img-circle " alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b><h5> {{ Auth::user()->name }} </h5></b></a>
          <span>
            <i class="fas fa-circle" style="color: rgb(106, 231, 106)"></i>
            <span style="color: white">Online</span>
          </span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
              <li class="nav-header">General</li>

          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
       
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Tenants
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tenants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tenant/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Tenant</p>
                </a>
              </li>

            </ul>
         </li>

           
        
         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Property
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/property" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Property</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/property/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Property</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Payments
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/payment" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Payments

                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/payment/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Make Payments</p>
                </a>
              </li>

            </ul>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="/user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              
            </ul>
          </li>
         
       
          

          <li class="nav-header">Extra</li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               User Roles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/roles/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Roles</p>
                </a>
              </li>
             
            </ul>
            <li class="nav-item has-treeview">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  User Permission
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/perm" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Permissions</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/perm/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Permission</p>
                  </a>
                </li>
               
              </ul>
            </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/inbox" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/comp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/read" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>