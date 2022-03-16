<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libcoll</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <style>
        a {

            text-decoration: none !important

        }
    </style>
</head>

<body>

    <header class="header">

        <div class="header-1">

            <a href="{{ route('home') }}" class="logo"> <i class="fas fa-book"></i> Libcoll </a>

            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="{{ route('home') }}">Início</a>
                <a href="{{ route('catalog') }}">Catálogo</a>
                @if (Route::has('login'))
                    @auth
                    <a href="{{ route('dashboard') }}">Profile</a>
                    @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
                    <a class="" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('adminlte::adminlte.log_out') }}
                    </a>
                    <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                        @if(config('adminlte.logout_method'))
                            {{ method_field(config('adminlte.logout_method')) }}
                        @endif
                        {{ csrf_field() }}
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endauth
                @endif
            </div>
    </header>

    <section class="featured" id="featured">
        <h1 class="heading"> <span>Books</span> </h1>
        @if (session('msg'))
        <div class="d-flex justify-content-center">
            <div id="alert" class="alert alert-primary" role="alert" style="width:50%">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p style=" height:10px; font-size:1.5rem; padding:0;">{{ session('msg') }}</p>
            </div>
        </div>

        @endif
        <div class="featured-slider">
            <div class="swiper-wrapper">
            @foreach($books as $book)
                <div class="swiper-slide box">
                    <div class="image">
                        <img src="/images/books/{{ $book->image }}" alt="{{ $book->title }}">
                    </div>
                    <div class="content">
                        @if($book->status == 1)
                            <div class="badge bg-info"><h4 style="height:12px; color:white;">Available</h4></div>
                        @elseif($book->status == 2)
                            <div class="badge bg-dark"><h4 style="height:12px; color:white;">Requested</h4></div>
                        @else
                            <div class="badge bg-secondary"><h4 style="height:12px; color:white;"> Unavailable</h4></div>
                        @endif
                        <br>
                        <br>
                        <h4>{{$book->title}}</h4>
                            @if($book->status==1)
                                <a href="{{ route('save_booking', ['id'=>$book->id]) }}" class="btn">Book now</a>
                            @else
                                <a href="#" class="btn disabled" aria-disabled="true">Book now</a>
                            @endif
                    </div>
                </div>
            @endforeach
            </div>
        </div>

    </section>

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Entre em contato:</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> minhabiblioteca@gmail.com </a>

            </div>

        </div>

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
    </section>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script>
searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
  searchForm.classList.toggle('active');
}



window.onscroll = () => {

  searchForm.classList.remove('active');

  if (window.scrollY > 80) {
    document.querySelector('.header .header-2').classList.add('active');
  } else {
    document.querySelector('.header .header-2').classList.remove('active');
  }

}

window.onload = () => {

  if (window.scrollY > 80) {
    document.querySelector('.header .header-2').classList.add('active');
  } else {
    document.querySelector('.header .header-2').classList.remove('active');
  }

  fadeOut();

}

function loader() {
  document.querySelector('.loader-container').classList.add('active');
}

function fadeOut() {
  setTimeout(loader, 4000);
}

var swiper = new Swiper(".featured-slider", {
  spaceBetween: 10,
  loop: false,
  centeredSlides: false ,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});
    </script>
</body>

</html>
