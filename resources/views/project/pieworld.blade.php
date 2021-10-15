<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PieWorld</title>
    <link rel="stylesheet" href="{{asset('/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style-portfolio.css')}}">
    <link rel="stylesheet" href="{{asset('/css/picto-foundry-food.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/jquery-ui.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('/favicon-1.ico')}}" type="image/x-icon">
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span class="top-title" style="font-size: 30px"><span style="color: #ff02b3">P</span>ie<span style="color: #ff02b3">W</span>orld</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav main-nav  clear navbar-right ">
                    <li><a class="navactive color_animation" href="#top">ƏSAS</a></li>
                    <li><a class="color_animation" href="#story">HAQQIMIZDA</a></li>
                    <li><a class="color_animation" href="#pricing">MƏHSULLAR</a></li>
                    <li><a class="color_animation" href="#bread">SİFARİŞ</a></li>
                    <li><a class="color_animation" href="#featured">GALAREYA</a></li>
                    <li><a class="color_animation" href="#contact">ƏLAQƏ</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="top" class="starter_container bg">
    <div class="follow_container">
        <div class="col-md-6 col-md-offset-3">
            <br>
            <h2 class="top-title">
                <span style="color: #ff02b3">
                    P
                </span>
                    ie
                <span style="color: #ff02b3">
                    W
                </span>
                    orld
            </h2><br>
            <h2 style="color: #ff32cf" class="white second-title">
                " Şirniyyat və desert dünyası "
            </h2>
            <hr>
        </div>
    </div>
</div>

<!-- ============ About Us ============= -->

<section id="story" class="description_content">
    <div class="text-content container">
        <div class="col-md-6">
            <h1>Haqqımızda</h1>
            <p  class="desc-text">
                Restaurant is a place for simplicity. Good food, good beer,
                and good service. Simple is the name of the game,
                and we’re good at finding it in all the right places, even in your dining experience.
                We’re a small group from Denver,
                Colorado who make simple food possible. Come join us and see what simplicity tastes like.
            </p>
        </div>
        <div class="col-md-6">
            <div class="img-section">
                <img src="{{asset('/images/kabob.jpg')}}" width="250" height="220">
                <img src="{{asset('/images/limes.jpg')}}" width="250" height="220">
                <div class="img-section-space"></div>
                <img src="{{asset('/images/radish.jpg')}}"  width="250" height="220">
                <img src="{{asset('/images/corn.jpg')}}"  width="250" height="220">
            </div>
        </div>
    </div>
</section>


<!-- ============ Pricing  ============= -->


<section id ="pricing" class="description_content">
    <div class="pricing background_content">
        <h1>Məhsullarımız</h1>
    </div>
    <div class="text-content container">
        <div class="container">
            <div class="row">
                <div id="w">
                    <ul id="portfolio">
                        @foreach($product as $val)
                                <li class="item">
                                    <img style="height: 180px" src="{{asset('/productimage/'.$val->image)}}" alt="Food" >
                                    <span style="color: white;font-size: 25px">
                                        {{$val->product_name}}
                                    </span>
                                    <h3 class="white">
                                        {{$val->price}}
                                    </h3>
                                </li>
                        @endforeach
                    </ul><!-- @end #portfolio -->
                    <a href="productlist">
                        <button class="btn-success more" style="margin-top: 15px;width: 150px;height: 50px;background-color:#0c8c0c;border: none">
                            Daha çox
                        </button>
                    </a>
                </div><!-- @end #w -->
            </div>
        </div>
    </div>
</section>


<section style="margin-top: 85px" id="bread" class=" description_content">
    <div  class="bread background_content">
        <h1>Sifariş</h1>
    </div>
    <div class="text-content container">
        <div class="col-md-6">
            <a href="orderpage"><button class="btn "><h1>Sifariş et</h1></button></a>
            <p class="desc-text">We love the smell of fresh baked bread. Each loaf is handmade at the crack of dawn, using only the simplest of ingredients to bring out smells and flavors that beckon the whole block. Stop by anytime and experience simplicity at its finest.</p>
        </div>
        <div class="col-md-6">
            <img src="{{asset('/images/bread1.jpg')}}" width="400" alt="Bread">
        </div>
    </div>
</section>



<!-- ============ Featured Dish  ============= -->

<section id="featured" class="description_content">
    <div  class="featured background_content">
        <h1>Galereya</h1>
    </div>
    <div class="text-content container">
        <div class="col-md-6">
            <span style="font-size: 30px;font-family: 'Playfair Display', serif" >
                Biz desert və şirniyyat dünyasını sizin üçün yaratdıq!
            </span>
            <div class="icon-hotdog fa-2x"></div>
            <p class="desc-text">Each food is handmade at the crack of dawn, using only the simplest of ingredients to bring out smells and flavors that beckon the whole block. Stop by anytime and experience simplicity at its finest.</p>
        </div>
        <div class="col-md-6">
            <ul class="image_box_story2">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img style="width: 500px;height: 333px" src="{{asset('/images/slider1.jpg')}}"  alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <img style="width: 500px;height:333px" src="{{asset('/images/slider2.jpg')}}" alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('/images/slider3.JPG')}}" alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</section>

<!-- ============ Social Section  ============= -->

<section class="social_connect">
    <div class="text-content container">
        <div class="col-md-6">
            <span class="social_heading">FOLLOW</span>
            <ul class="social_icons">
                <li><a class="icon-twitter color_animation" href="#" target="_blank"></a></li>
                <li><a class="icon-github color_animation" href="#" target="_blank"></a></li>
                <li><a class="icon-linkedin color_animation" href="#" target="_blank"></a></li>
                <li><a class="icon-mail color_animation" href="#"></a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <span class="social_heading">Zəng edin</span>
            <span class="social_info"><a class="color_animation" href="tel:883-335-6524">(+012) 883-335-6524</a></span>
        </div>
    </div>
</section>

<!-- ============ Contact Section  ============= -->

<section id="contact">
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d97224.72723630966!2d49.800639291559634!3d40.402808670091744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x40307d4ee9253a65%3A0x29160f1a81905e71!2zTtOZcmltYW4gTtOZcmltYW5vdiwgQmFrxLEsIEF6yZlyYmF5Y2Fu!3m2!1d40.4028298!2d49.870679599999995!5e0!3m2!1saz!2s!4v1634051253349!5m2!1saz!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></iframe>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner contact">
                    <!-- Form Area -->
                    <div class="contact-form">
                        <!-- Form -->
                        <form id="contact-us" action="/insertmessage" method="post" >
                            @csrf
                            <!-- Left Inputs -->
                            <div class="col-md-6 ">
                                <!-- Name -->
                                <input type="text" name="visitor_name" id="name" required="required" class="form {{ $errors->has('name') ? 'error' : '' }}" placeholder="Ad" />
                                        @if ($errors->has('visitor_name'))
                                            <div class="error">
                                                {{ $errors->first('visitor_name') }}
                                            </div>
                                        @endif
                                <!-- Email -->
                                <input type="email" name="visitor_email" id="email" required="required" class="form {{ $errors->has('email') ? 'error' : '' }}" placeholder="Email" />
                                        @if ($errors->has('visitor_email'))
                                            <div class="error">
                                                {{ $errors->first('visitor_email') }}
                                            </div>
                                        @endif
                            </div><!-- End Left Inputs -->
                            <!-- Right Inputs -->
                            <div class="col-md-6">
                                <!-- Message -->
                                <textarea required="required" name="text" id="message" class="form textarea {{ $errors->has('message') ? 'error' : '' }}"  placeholder="Mesaj..."></textarea>
                                        @if ($errors->has('text'))
                                            <div class="error">
                                                {{ $errors->first('message') }}
                                            </div>
                                        @endif

                            </div><!-- End Right Inputs -->
                            <!-- Bottom Submit -->
                            <div class="relative fullwidth col-xs-12">
                                <!-- Send Button -->
                                <button type="submit" id="submit" name="submit" class="form-btn">Göndər</button>
                            </div><!-- End Bottom Submit -->
                            <!-- Clear -->
                            <div class="clear"></div>
                        </form>
                    </div><!-- End Contact Form Area -->
                </div><!-- End Inner -->
            </div>
        </div>
    </div>
</section>

<!-- ============ Footer Section  ============= -->

<footer class="sub_footer">
    <div class="container">
        <div class="col-md-4"><p class="sub-footer-text text-center">&copy; PieWorld 2021, Theme by <a href="https://themewagon.com/">AsimAli</a></p></div>
    </div>
</footer>


<script type="text/javascript" src="{{asset('/js/jquery-1.10.2.min.js')}}"> </script>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/js/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.mixitup.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/js/main.js')}}" ></script>

</body>
</html>
