@extends('layouts.layout')

@section('content')
    <div id="content">
        <div id="about">
            <div id="info-cook">
                @foreach($setting as $custom)
                    @if(strcmp($custom->className ,"about") == 0)
                        <div class="header-name header-about font-yeseva-one" id="">
                            <b>{{$custom->title}}</b>
                        </div>
                        <div class="decoration-yellow"></div>
                <!-- <img src="assets/images/yello-decoration.png"> -->
                        <div class="content-description">{{$custom->description}}</div>
                    @endif
                @endforeach
                <div id="cook"></div>
                <!-- <img src="assets/images/cook.png"> -->
            </div>
            <div id="dish">
                <!-- <img src="assets/images/dish.png"> -->
            </div>
        </div>
        <div style="clear: both;"></div>
        <div id="ingredients">
            <div id="big-container">
                <div id=container>
                    <div id="sub-container">
                        @foreach($setting as $custom)
                            @if (strcmp($custom->className, "ingredients") == 0)
                                <div class="header-name decoration-white font-yeseva-one">{{$custom->title}}</div>
                                <!-- <div class="decoration-white"></div> -->
                                <!-- <img src="assets/images/yello-decoration.png"> -->
                                <p>{{$custom->description}}</p>
                            @endif
                        @endforeach
                        <div id="img-ingredients">
                            <div class="ingredients-img bg-img-custom" id="ingredients-img1"></div>
                            <div class="ingredients-img bg-img-custom" id="ingredients-img2"></div>
                            <div class="ingredients-img bg-img-custom" id="ingredients-img3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div id="menu">
            <div id="container-left">
                @for($i = 0; $i < round(count($category)/2); $i++)
                        <div id="appetisers" class="eating">
                            <ul class="list">
                                <li>
                                    <div id="sub-appertisers">
                                            <div class="type-eating font-yeseva-one">{{$category[$i]->categoryName}}</div>
                                            @foreach($category[$i]->eating as $eating)
                                                <ul class="list w3-button content-button" onclick="showEating({{$eating->id}}, '{{$eating->eatingName}}')">
                                                    <li class="name-and-cost">
                                                        <span class="name-eating">{{$eating->eatingName}}</span>
                                                        <span class="cost">${{$eating->cost}}</span>
                                                    </li>
                                                    <!-- <img src="assets/images/line.png"> -->
                                                    <li>
                                                        <p class="description-eating">{{$eating->description}}</p>
                                                    </li>
                                                </ul>
                                            @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                @endfor
            </div>
            <div id="container-right">
                @for($i = round(count($category)/2); $i < count($category); $i++)
                        <div id="appetisers" class="eating">
                            <ul class="list">
                                <li>
                                    <div id="sub-appertisers">
                                            <div class="type-eating font-yeseva-one">{{$category[$i]->categoryName}}</div>
                                            @foreach($category[$i]->eating as $eating)
                                                <ul class="list w3-button content-button" onclick="showEating({{$eating->id}}, '{{$eating->eatingName}}')">
                                                    <li class="name-and-cost">
                                                        <span class="name-eating">{{$eating->eatingName}}</span>
                                                        <span class="cost">${{$eating->cost}}</span>
                                                    </li>
                                                    <!-- <img src="assets/images/line.png"> -->
                                                    <li>
                                                        <p class="description-eating">{{$eating->description}}</p>
                                                    </li>
                                                </ul>
                                            @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                @endfor
            </div>
            <div style="clear: both;"></div>
        </div>
        <div id="review">
            <div id="guest-review">
                @foreach($setting as $custom)
                    @if(strcmp($custom->className, "review") == 0)
                        <div class="decoration-white header-name">{{$custom->title}}</div>
                        <!-- <img src="assets/images/white-decoration.png"> -->
                        <p id="comment">{{$custom->description}}</p>
                    @endif
                @endforeach
                <div id="source">- food inc, New York</div>
            </div>
        </div>
        <div id="reservations">
            <div id="box-left">
                <div id="example-eating">
                    <div id="reservations-img1"></div>
                    <div id="reservations-img2"></div>
                    <!--                        <img id="reservations-img1" src="assets/images/reservations-img1.png">
                    <img id="reservations-img2" src="assets/images/reservations-img2.png"> -->
                </div>
            </div>
            <div id="box-right">
                <div id="form">
                    <div id="description-reservations">
                        @foreach ($setting as $custom)
                            @if(strcmp($custom->className, "reservations1") == 0)
                                <div class="decoration-yellow header-name header-about">{{$custom->title}}</div>
                                <!-- <img src="assets/images/yello-decoration.png"> -->
                                <p class="fix-margin">{{$custom->description}}</p>
                            @endif
                            @if(strcmp($custom->className, "reservations2") == 0)
                                <p class="fix-margin">{{$custom->description}}</p>
                            @endif
                        @endforeach
                    </div>
                    <div id="filling-in-form">
                        <form action="" method="" id="in-form" onsubmit.prevent>
                            <div id="form-1">
                                <span class="fix-margin">Name:</span>
                                <input type="text" id="name" class="frame" name="name" placeholder="your name *" required="">
                                <span class="fix-margin">Date:</span>
                                <input type="date" id="date" class="frame" name="date" placeholder="date *" required="">
                            </div>
                            <div id="form-2">
                                <span class="fix-margin">Email:</span>
                                <input type="email" id="email" class="frame" name="email" placeholder="your email *" required="">
                                <span class="fix-margin">PartyNumber</span>
                                <input type="number" id="party-number" class="frame" name="party-number" placeholder="party number">
                            </div>
                            <div id="container-submit">
                                <input type="button" id="submit" name="submit" value="Book now!">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Order box --}}
    {{-- <div id="order-box" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width: 30%;">
            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('order-box').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2>Order</h2>
            </header>
            <div class="w3-container">
                <div id="output-content" style="font-size: 250%;">Name</div>
                <div class="form-group">
                    <form action="{{route('order')}}" method="post" onsubmit="return confirmOrder()">
                        {{csrf_field()}}
                        <h5>Quantity</h5>
                        <select class="form-control" name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <input class="form-control" name="idEating" id="idEating" type="hidden" value=""/>
                        <button type="submit" class="btn btn-default" style="margin-top: 2%;">ORDER</button>
                    </form>
                </div>
            </div>
            <footer class="w3-container w3-teal">
                <p>Modal Footer</p>
            </footer>
        </div>
    </div> --}}
    <div id="order-box" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width: 30%;">
            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('order-box').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2>Order</h2>
            </header>
            <div class="w3-container">
                <div id="output-content" style="font-size: 250%;">Name</div>
                <div class="form-group">
                    <div>
                        {{csrf_field()}}
                        <h5>Quantity</h5>
                        <select class="form-control" name="quantity" id="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <input class="form-control" name="idEating" id="idEating" type="hidden" value=""/>
                        <input class="w3-button" type="button" name="order" id="order" value="ORDER">
                        <div id="yesno-box" class="w3-modal">
                            <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width: 30%;">
                                <header class="w3-container w3-teal"> 
                                    <span onclick="document.getElementById('yesno-box').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <h2>REALLY</h2>
                                </header>
                                <div class="w3-container">
                                    <div>Ban co thuc su muon dat hang?</div>
                                    <button class="w3-button" id="yes">YES</button>
                                    <button class="w3-button" id="no">NO</button>
                                </div>
                            </div>
                        </div>    
                        
                        {{-- <button type="submit" class="btn btn-default" style="margin-top: 2%;">ORDER</button> --}}
                        <div id="notification"></div>
                    </div>
                </div>
            </div>
            <footer class="w3-container w3-teal">
                <p>Modal Footer</p>
            </footer>
        </div>
    </div>
    <div id="login-box" class="w3-modal" style="background-color: rgba(255, 255, 255, 0.3);">
        <div class="w3-modal-content w3-card-4 w3-animate-top" style="margin: auto;padding: 5%;max-width: 30%;">
            <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('login-box').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h5>Notification</h5>
            </header>
            <div id="box-login" class="w3-container" style="margin-top:2%;">
                {{-- <div class="col-md-6 col-md-offset-3" style="margin-left: 10%;"> --}}
                        <div id="output-content" style="font-size: 150%;">You need login</div>
                        {{-- <input type="button" class="btn btn-primary w3-button" id="loginbt" value="Đăng nhập"> --}}
                        <a href="{{route('login')}}" class="btn btn-primary w3-button">Login</a>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/event.js')}}"></script>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#order").on('click', function() {
                // alert("hello");
                $("#yesno-box").show();
                $("#yes").on('click', function() {
                    $("#yesno-box").hide();
                    var idEating = $("#idEating").val();
                    var quantity = $("#quantity").val();
                    // alert(idEating + quantity);
                    $.get("order", {idEating : idEating, quantity : quantity}, function(data) {
                       // $("#notification").html(data);
                       if (data == 'Successed') {
                            $("#notification").html(data);
                       } else {
                            $("#order-box").hide();
                            $("#login-box").show();
                       }
                    });
                });
                $("#no").on('click', function() {
                    $("#yesno-box").hide();
                });
            });
        });
    </script>
@endsection

