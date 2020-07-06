  @if (Auth::check() && Auth::user()->role_id == 1)
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #FF3CAC;
background-image: linear-gradient(225deg, #FF3CAC 0%, #784BA0 50%, #2B86C5 100%);
">
        <!-- Brand Logo -->
        <!-- Sidebar -->
        <div class="sidebar" >
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('backend/dist/img/user8-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>

                <div class="info">
                    <a href="#" class="d-block">{{strtoupper(Auth::user()->name)}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{route('admin.post.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Post</p>
                        </a>
                    </li>

                        </ul>



            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    @else
    <h2 class="text-danger text-center m-5">Your don't have permission to access here.</h2>
@endif

