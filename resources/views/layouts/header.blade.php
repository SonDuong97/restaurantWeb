<div id="header" class="bg-img-custom">
    <div id="header-top">
        <div id="logo">LAMBDA</div>
        <div id="button">
            <a class="button" href="#header">Home</a>
            <a class="button" href="#about">About</a>
            <a class="button" href="#ingredients">Igredients</a>
            <a class="button" href="#menu">Menu</a>
            <a class="button" href="#review">Review</a>
            <a class="button" href="#reservations">Reservations</a>
            <div id="sns">
                <a id="twitter" class="fab fa-twitter button" href="https://twitter.com"></a>
                <a id="youtube" class="fab fa-youtube button" href="https://youtube.com"></a>
                <a id="facebook" class="fab fa-facebook-f button" href="https://facebook.com"></a>
            </div>
            <div class="loginAndlogout">
            	@if (Auth::check())
            		<span>{{Auth::user()->name}}</span>
            	<a class="logout button" href="{{route('logout')}}">LogOut</a>
            	@else
            	<a class="login button" href="{{route('login')}}">LogIn</a>
            	@endif
            </div>
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