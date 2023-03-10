<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
   <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
</head>
<header class="mb-5">
	<div class="container">
		<div class="menu-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav class="nav">
		<div class="logo">
      <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset ('public/images/logo.png')}}" class="logotype" alt="test">
      </a>
    </div>
		<ul class="nav m-auto menu">
			<li class="nav-link"><a href="{{ url ('/')}}" class="nav__item">О нас</a></li>
			<li class="nav-link"><a href="{{route ('catalog')}}" class="nav__item">Каталог</a></li>
			<li class="nav-link"><a href="{{ url ('/where')}}" class="nav__item">Где найти нас?</a></li>
      @if (Auth::user())<li class="nav-link"><a href="{{ url ('/basket')}}" class="nav__item">Корзина</a></li>@endif
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
               <img src="{{asset ('public/images/profile.png')}}" class="my-auto" alt="profile"> <a id="navbarDropdown" class="nav-profile dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->lastname}} {{ Auth::user()->name }} {{ Auth::user()->patromyc }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                 @if (Auth::check())
                   @if (Auth::user()->role ==="admin")
                   <a class="dropdown-item" href="{{route('addproduct')}}">Добавить товар</a>
                   <a class="dropdown-item" href="{{route('settingcat')}}">Настройки категории</a>
                   
                   @endif
                 @endif


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
			<div class="logo"><img src="{{ asset ('public/images/logo.png')}}" alt="test"></div>
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
 let image = document.getElementById("image");
let file = document.getElementById("file");

file.addEventListener('change', function(){
  image.src = URL.createObjectURL(file.files[0]);
  image.style.display = "block";
});
</script>
<script>
    let menuBtn = document.querySelector('.menu-btn');
    let menu = document.querySelector('.menu');
    menuBtn.addEventListener('click', function(){
        menuBtn.classList.toggle('active');
        menu.classList.toggle('active');
    })
    </script>
    <script src="{{ asset('public/js/app.js')}}" type="text/javascript"></script>
     <script src="{{ asset('public/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/slick/slick.min.js')}}" type="text/javascript"></script>
    <script>
        $('.new-product').slick({
      slidesToShow: 3,
      slidesToScroll: 2,
      infinite:false,
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
    <script>
      // Убавляем кол-во по клику
      $('.quantity_inner .bt_minus').click(function() {
      let $input = $(this).parent().find('.quantity');
      let count = parseInt($input.val()) - 1;
      count = count < 1 ? 1 : count;
      $input.val(count);
  });
  // Прибавляем кол-во по клику
  $('.quantity_inner .bt_plus').click(function() {
      let $input = $(this).parent().find('.quantity');
      let count = parseInt($input.val()) + 1;
      count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
      $input.val(parseInt(count));
  }); 
  // Убираем все лишнее и невозможное при изменении поля
  $('.quantity_inner .quantity').bind("change keyup input click", function() {
      if (this.value.match(/[^0-9]/g)) {
          this.value = this.value.replace(/[^0-9]/g, '');
      }
      if (this.value == "") {
          this.value = 1;
      }
      if (this.value > parseInt($(this).data('max-count'))) {
          this.value = parseInt($(this).data('max-count'));
      }    
  }); 
  </script>
    </html>

