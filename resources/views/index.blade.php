<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libcoll</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('catalog') }}">Books</a>
                @if (Route::has('login'))
                    @auth
                    <a href="{{ route('dashboard') }}">Profile</a>
                    @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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


    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>Recently added</h3>
                <a href="{{ route('catalog') }}" class="btn">Book now</a>
            </div>
                <div class="swiper books-slider">
                        <div class="swiper-wrapper">
                    @foreach($books as $book)
                        @foreach($book as $data)
                            <a href="{{ route('show_book', ['id'=>$data->id]) }}" class="swiper-slide">
                                <img src="/images/books/{{ $data->image }}">
                            </a>
                        @endforeach
                    @endforeach
                        </div>
                    <img src="/images/stand.png" class="stand" alt="">
                </div>
        </div>


    </section>

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Contact:</h3>
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

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script>
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

        var swiper = new Swiper(".books-slider", {
        loop: true,
        centeredSlides: true,
        autoplay: {
        delay: 9500,
        disableOnInteraction: false,
        },
        breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
        },
        });
    </script>

</body>

</html>


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
