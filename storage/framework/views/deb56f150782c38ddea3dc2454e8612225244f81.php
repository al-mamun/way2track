<!-- Sidebar Menu -->
<nav class="mt-2" style="display:none">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item  ">
            <a href="#" class="nav-link  <?php if(isset($status) && $status ==1 ): ?> active <?php endif; ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
        </li>
     
        <li class="nav-item <?php if(isset($menu_open) && $menu_open ==2 ): ?>  menu-open <?php endif; ?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Order
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item  ">
                    <a href="<?php echo e(URL::to( 'new/order/status')); ?>" class="nav-link  <?php if(isset($status) && $status ==2 ): ?> active <?php endif; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Sales Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to( 'list/order/status')); ?>" class="nav-link  <?php if(isset($status) && $status ==3 ): ?> active <?php endif; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sales Order Details</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to( 'new/order/details')); ?>" class="nav-link  <?php if(isset($status) && $status ==4 ): ?> active <?php endif; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Order Details </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to( 'list/order/details')); ?>" class="nav-link  <?php if(isset($status) && $status ==5 ): ?> active <?php endif; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Of Order Details </p>
                    </a>
                </li>
                
            </ul>
        </li>
        
         <li class="nav-item <?php if(isset($menu_open) && $menu_open == 3 ): ?>  menu-open <?php endif; ?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                   purchase  Order
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item  ">
                    <a href="<?php echo e(URL::to( 'new/purchase/order/header')); ?>" class="nav-link  <?php if(isset($status) && $status ==6 ): ?> active <?php endif; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Purchase Order Header</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to( 'list/purchase/order/header')); ?>" class="nav-link  <?php if(isset($status) && $status ==7 ): ?> active <?php endif; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Purchase Order Header</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to( 'create/purchase/order/details')); ?>" class="nav-link  <?php if(isset($status) && $status == 8 ): ?> active <?php endif; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Purchase Order Details </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to( 'list/purchase/order/details')); ?>" class="nav-link  <?php if(isset($status) && $status == 9 ): ?> active <?php endif; ?>">
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
                    <a href="<?php echo e(URL::to( 'new-user-setup')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New user setup</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to( 'userlist')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User List</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu --><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/master/sidebar.blade.php ENDPATH**/ ?>