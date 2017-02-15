<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/particles.min.js"></script>
    {{--for slider--}}
    <script src="/js/slick.min.js"></script>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <style>


        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }
    </style>
</head>
<body>
<div id="particles1-js1"></div>

<div class="content">
    <header>
        <a id="logo" href="{{route('home')}}"><img src="/img/logo.png" height="47" width="207"/></a>
        <a href="" id="menu"><img src="/img/buttonmenu.png"></a>
        <nav>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('portfolio')}}">Portfolio</a>
            <a href="{{route('home')}}#about">Contact</a>
        </nav>
    </header>

@yield('content')

    <footer>
        <p>footer</p>
        <a href="#" class="back-top">
            <img src="/img/buttonup.png" height="44" width="44"/>
        </a>
    </footer>
</div>

<script>

    particlesJS.load('particles-js', 'js/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });

    $('.back-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1500);
        return false;
    });

    $('body').on('click', '.category li a', function() {
            $('.category li a').removeClass('active');
            $(this).addClass('active');

            var thisItem = $(this).attr('rel');
            if (thisItem != "all") {
                $('.item li:visible').stop().fadeOut("slow", function () {
                    $('.item li[rel=' + thisItem + ']').fadeIn("slow");
                });

            }else{
                $('.item li:visible').stop().fadeOut("slow", function () {
                    $('.item li').fadeIn("slow");
                });
            }
        }
    );


    var menu = $('header nav');
    $('body').on('click', '#menu', function(e) {
        e.preventDefault();
        menu.slideToggle();
    });
    $(window).resize(function(){
        var wid = $(window).width();
        if(wid > 600 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });


    $("body").on("click","a[href*='#about']", function (event) {
        if(window.location.pathname == '/') {
            //отменяем стандартную обработку нажатия по ссылке
            event.preventDefault();
            //забираем идентификатор бока с атрибута href
            var id = '#about';
                //узнаем высоту от начала страницы до блока на который ссылается якорь
            var top = $(id).offset().top;
            //анимируем переход на расстояние - top за 1500 мс
            $('body,html').animate({scrollTop: top}, 1500);
        }
    });
/*for slider*/
    $("#slider").slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        //lazyLoad: 'ondemand'
        fade: true
    });
</script>
</body>
</html>