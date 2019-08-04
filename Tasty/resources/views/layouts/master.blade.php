<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="images/tastylogo.png" sizes="16x16">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Tasty</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <img src="{{ asset('images/tastybanner.jpg') }}" class="img-fluid" alt='Soy un banner'>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/"><b>Tasty</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(\Request::is('pizzas')) active @endif">
                        <a class="nav-link" href="/pizzas">Pizza</a>
                    </li>
                    <li class="nav-item @if(\Request::is('tabla_sushis')) active @endif">
                        <a class="nav-link" href="/tabla_sushis">Tablas Sushi</a>
                    </li>
                    <li class="nav-item @if(\Request::is('empanadas')) active @endif">
                        <a class="nav-link" href="#">Empanadas</a>
                    </li>
                    <li class="nav-item @if(\Request::is('ingredientes')) active @endif">
                        <a class="nav-link" href="/ingredientes">Ingredientes</a>
                    <li class="nav-item @if(\Request::is('sushis')) active @endif">
                        <a class="nav-link" href="/sushis">Rolls Sushi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Promos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Pizzas</a>
                            <a class="dropdown-item" href="/sushis">Sushi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item disabled" href="#">Otros</a>
                        </div>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('cart.index')}}">Cart <i
                                class="fas fa-shopping-cart"></i> @if (Cart::count()>0)
                            <span class="badge badge-warning">{{ Cart::count() }}</span>
                            @endif
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">{{ Auth::user()->nombre_completo }}</a>
                        <input type="hidden" name="usuario " value="{{ Auth::User()->id_usuario}}">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="/logout">Cerrar Sesión</a>
                    </li>
                    @endauth @unless (Auth::check())
                    <li><a href="/login" class="btn text-dark">Iniciar Sesión</a></li>
                    <li><a href="/usuarios/create" class="btn text-dark">Registrarse</a></li>
                    @endunless
                </ul>
            </div>
        </nav>

        @yield('contenido')
        <hr>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <img src="{{ asset('images/tastylogo.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-sm">
                        <span><b>Redes sociales</b></span>
                        <p class="rs"><a class="btn" href="https://www.facebook.com/taasty.s"><i
                                    class="fab fa-facebook-square"></i> Facebook</a></p>
                        <p class="rs"><a class="btn" href="https://www.instagram.com/tasty.vi/"><i
                                    class="fab fa-instagram"></i> Instagram</a></p>
                        <p class="rs"><a class="btn"
                                href="https://wa.me/56223170624?text=Hola,%20que%20tal?%20Quería%20pedir...%20"><i
                                    class="fab fa-whatsapp-square"></i> Whastapp</a></p>
                    </div>
                    <div class="col-sm">
                        <span><b>Contacto</b> <i class="fa fa-phone-square"></i></span>
                        <p>Telefono:****</p>
                        <p>Mail: *****</p>
                    </div>
                    <div class="col-sm">
                        <span><b>Dirección</b> <i class="fa fa-road"></i></span>
                        <p>Av. Las Azucenas 854, Viña del Mar, Región de Valparaíso</p>
                        <div><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3345.9832270748016!2d-71.49605348496428!3d-33.00421768090411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689dd551e967bf5%3A0x69a91c66a78deaab!2sTasty+Sebastian!5e0!3m2!1ses-419!2scl!4v1560028072200!5m2!1ses-419!2scl"
                            width="250" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                    </div>
                    <div class="col-sm">
                        <span><b>Medios de pago</b><i class="fa fa-credit-card-alt"></i></span>
                        <img src="{{ asset('images/metodospagos.jpg') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </footer>


    </div>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>