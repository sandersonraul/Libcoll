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
                <a href="{{ route('home') }}">Início</a>
                <a href="catalogo.html">Catálogo</a>
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
                    <a href="#" id="login-btn">Entrar</a>
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endauth
                @endif
            </div>
    </header>


    <div class="login-form-container">

        <div id="close-login-btn" class="fas fa-times"></div>
        <x-jet-validation-errors class="mb-4" />

        <form  method="POST" action="{{ route('login') }}">
            <h3>Entrar</h3>
            @csrf
            <span for="email" value="{{ __('Email') }}" >Usuário</span>
            <input id="email" class="box" type="email" name="email" :value="old('email')" required autofocus>
            <span for="password" value="{{ __('Password') }}">Senha</span>
            <input id="password" class="box" type="password" name="password" required autocomplete="current-password">
            <div class="checkbox">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">{{ __('Remember me') }}</ </label>
            </div>
            <input type="submit" value="sign in" class="btn">
            @if (Route::has('password.request'))
            <p>Esqueceu sua senha? <a href="{{ route('password.request') }}">Clique aqui</a></p>

                @endif
            <p>Ainda não tem uma conta? <a href="#">Criar conta</a></p>
        </form>

    </div>

    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>Adicionados recentemente</h3>
                <a href="#" class="btn">Reserve agora</a>
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">

                    <a href="#" class="swiper-slide"><img src="/images/books/c7e6c117447f8a40dddbc8252fa609cd.png" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="image/book-2.png" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="image/book-3.png" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="image/book-4.png" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="image/book-5.png" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="image/book-6.png" alt=""></a>
                </div>
                <img src="image/stand.png" class="stand" alt="">
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

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
