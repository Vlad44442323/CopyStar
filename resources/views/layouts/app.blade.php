<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
   <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<header class="mb-5">
	<div class="container">
		<div class="menu-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav class="nav">
		<div class="logo"><a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset ('images/logo.png')}}" class="logotype" alt="test"></a></div>
		<ul class="nav m-auto menu">
			<li class="nav-link"><a href="{{ url ('/#company')}}" class="nav__item">О нас</a></li>
			<li class="nav-link"><a href="{{route ('catalog')}}" class="nav__item">Каталог</a></li>
			<li class="nav-link"><a href="{{ url ('/where')}}" class="nav__item">Где найти нас?</a></li>
		</ul>
		<ul class="nav autorize m-auto">
            @guest
            @if (Route::has('login'))
                <li class="nav-link"><a href="{{ route('login') }}" class="nav__item">Войти</a></li>
            @endif

            @if (Route::has('register'))
                <li class="nav-link"><a href="{{ route('register') }}" class="nav__item">Зарегистрироваться</a></li>
            @endif
        @else
            <li class="dropdown d-flex">
               <img src="{{asset ('images/profile.png')}}" class="my-auto" alt="profile"> <a id="navbarDropdown" class="nav-profile dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->lastname}} {{ Auth::user()->name }} {{ Auth::user()->patromyc }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest

		</ul>
	</nav>
	</div>
</div>
</header>
            <div class="content">
            @yield('content')
          </div>
            <section class="footer__top">
	<div class="container">
		<nav class="nav">
			<div class="logo"><img src="images/logo.png" alt="test"></div>
			<ul class="nav my-auto">
				<li class="nav-link"><a href="{{ url ('/#company')}}" class="nav__item">О нас</a></li>
				<li class="nav-link"><a href="#" class="nav__item">Каталог</a></li>
				<li class="nav-link"><a href="Where.html" class="nav__item">Где найти нас?</a></li>
			</ul>
		</nav>
	</div>
</section>
<section class="footer__bottom text-center">
	<p class="m-0">©Copy Star 2023</p>
</section>
</body>
<script>
    let menuBtn = document.querySelector('.menu-btn');
    let menu = document.querySelector('.menu');
    menuBtn.addEventListener('click', function(){
        menuBtn.classList.toggle('active');
        menu.classList.toggle('active');
    })
    </script>
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
     <script src="{{ asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('slick/slick.min.js')}}" type="text/javascript"></script>
    <script>
        $('.new-product').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
          }
        },
        {
        breakpoint: 416,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
          }
        },
        {
        breakpoint: 376,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
          }
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
    </script>
    </html>
    
</html>

