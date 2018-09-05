<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
{{--             <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li> --}}
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        {{-- <a href="{{route('showListCate')}}">List Category</a> --}}
                        <router-link :to="{name:'showListCategory'}">List Category</router-link>
                    </li>
                    <li>
                        {{-- <a href="{{route('addCate')}}">Add Category</a> --}}
                        <router-link :to="{name:'addCategory'}">Add Category</router-link>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        {{-- <a href="{{route('showListCate')}}">List Category</a> --}}
                        <router-link :to="{name:'showListProduct'}">List Product</router-link>
                        {{-- <router-view name="showListProduct"></router-view> --}}
                    </li>
                    <li>
                        {{-- <a href="{{route('addCate')}}">Add Category</a> --}}
                        <router-link :to="{name:'addProduct'}">Add Product</router-link>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <router-link :to="{name:'showListUser'}">List User</router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'addUser'}">Add User</router-link>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Order<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <router-link :to="{name:'showListOrder'}">List Order</router-link>
                    </li>
                    {{-- <li>
                        <a href="{{route('addCate')}}">Add Category</a>
                    </li> --}}
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>