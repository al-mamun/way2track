<!-- Sidebar Menu -->
<nav class="mt-2" style="display:none">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item  ">
            <a href="#" class="nav-link  @if(isset($status) && $status ==1 ) active @endif ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
        </li>
     
        <li class="nav-item @if(isset($menu_open) && $menu_open ==2 )  menu-open @endif">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Order
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item  ">
                    <a href="{{ URL::to( 'new/order/status') }}" class="nav-link  @if(isset($status) && $status ==2 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Sales Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to( 'list/order/status') }}" class="nav-link  @if(isset($status) && $status ==3 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sales Order Details</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to( 'new/order/details') }}" class="nav-link  @if(isset($status) && $status ==4 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Order Details </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to( 'list/order/details') }}" class="nav-link  @if(isset($status) && $status ==5 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Of Order Details </p>
                    </a>
                </li>
                
            </ul>
        </li>
        
         <li class="nav-item @if(isset($menu_open) && $menu_open == 3 )  menu-open @endif">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                   purchase  Order
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item  ">
                    <a href="{{ URL::to( 'new/purchase/order/header') }}" class="nav-link  @if(isset($status) && $status ==6 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Purchase Order Header</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to( 'list/purchase/order/header') }}" class="nav-link  @if(isset($status) && $status ==7 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Purchase Order Header</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to( 'create/purchase/order/details') }}" class="nav-link  @if(isset($status) && $status == 8 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Purchase Order Details </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to( 'list/purchase/order/details') }}" class="nav-link  @if(isset($status) && $status == 9 ) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Of Purchase Order Details </p>
                    </a>
                </li>
                
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    User Setup
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ URL::to( 'new-user-setup') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New user setup</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to( 'userlist') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User List</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->