<div id="header" class="bg-img-custom">
    <div id="header-top">
        @if(session('notification'))
            <script type="text/javascript">alert('{{session('notification')}}')</script>
        @endif
        <div id="logo">LAMBDA</div>
        <div id="button">
            <a class="button" href="#header">Home</a>
            <a class="button" href="#about">About</a>
            <a class="button" href="#ingredients">Igredients</a>
            <a class="button" href="#menu">Menu</a>
            <a class="button" href="#review">Review</a>
            <a class="button" href="#reservations">Reservations</a>
            {{-- <div id="sns">
                <a id="twitter" class="fab fa-twitter button" href="https://twitter.com"></a>
                <a id="youtube" class="fab fa-youtube button" href="https://youtube.com"></a>
                <a id="facebook" class="fab fa-facebook-f button" href="https://facebook.com"></a>
            </div> --}}
            @if (Auth::check())
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span>{{Auth::user()->name}}</span>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            @else
                <div id="login">
                    <a href="{{route('login')}}" class="fab button">Login</a>
                </div>
            @endif
        </div>
    </div>
    <div id="header-body" class="font-yeseva-one">
    	@foreach($setting as $custom)
    		@if (strcmp($custom->className, "header") == 0)
        		{{$custom->title}}
        	@endif
        @endforeach
    </div>
    <div id="header-bottom">
        <div class="header-bottom-button" id="button-left"><strong>BOOK A TABLE</strong></div>
        <div class="header-bottom-button" id="button-right"><strong>SEE THE MENU</strong></div>
    </div>
</div>