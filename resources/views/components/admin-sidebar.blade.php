@php
    use App\Models\Product;
    $totalOutOfStocksProducts = Product::where('qty','<',0)->count();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 mb-5">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-decoration-none">
        <img src="{{ URL::asset('dashboard') }}/dist/img/AdminLTELogo.png" alt="Chand Jewellers Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Chand Jewellers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ URL::asset('dashboard') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-decoration-none">{{ Auth::user()->full_name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Category Section -->
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Sub-Category Section -->
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sub Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sub-categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Categories List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sub-categories.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Products Section -->
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/out-of-stock/products') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Out of stock <span class="badge badge-pill bg-primary">{{ number_format($totalOutOfStocksProducts) }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Product</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Orders Section -->
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order-report') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Report</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Subscribers List Section -->
                <li class="nav-item">
                    <a href="{{ route('admin.subscribers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Subscribers</p>
                    </a>
                </li>

                <!-- Contacts Section -->
                <li class="nav-item">
                    <a href="{{ route('admin.contact-us.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Website Contacts</p>
                    </a>
                </li>

                 <!-- Visitors Section -->
                 <li class="nav-item">
                    <a href="{{ route('admin.visitors.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Website Visitors</p>
                    </a>
                </li>

                <!-- Feedbacks Section -->
                <li class="nav-item">
                    <a href="{{ route('admin.feedbacks.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Product Feedbacks</p>
                    </a>
                </li>

                 <!-- Role Management -->
                 {{-- @canAny('view-admin-role', 'create-admin-role') --}}
                 <li class="nav-item">
                     <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Role Management
                             <i class="fas fa-angle-down right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         {{-- @can('view-admin-role') --}}
                             <li class="nav-item">
                                 <a href="{{ URL::to('admin/roles') }}" class="nav-link">
                                     <p>&emsp;Roles List</p>
                                 </a>
                             </li>
                         {{-- @endcan --}}
                         {{-- @can('create-admin-role') --}}
                             <li class="nav-item">
                                 <a href="{{ URL::to('admin/roles/create') }}" class="nav-link">
                                     <p>&emsp;Create New Role</p>
                                 </a>
                             </li>
                         {{-- @endcan --}}
                     </ul>
                 </li>
             {{-- @endcanAny --}}

                <!-- Users Management Section -->
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user-management.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user-management.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Settings Section -->
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link logout">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
