<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="images/tastylogo.jpg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <title>Tasty</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Promos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Pizzas</a>
                            <a class="dropdown-item" href="#">Tablas Sushi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Otros</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Dirección</a>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('contenido')
        <hr>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                            <img src="{{ asset('images/tastylogo.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-sm-3">
                        <span><b>Redes sociales</b></span>
                        <p class="rs"><a href="https://www.facebook.com/taasty.s"><i class="fab fa-facebook-square"></i> Facebook</a></p>
                        <p class="rs"><a href="#"><i class="fab fa-instagram"></i> Instagram</a></p>
                        <p class="rs"><a href="#"><i class="fab fa-whatsapp-square"></i> Whastapp</a></p>
                    </div>
                    <div class="col-sm-3">
                            <span><b>Contacto</b></span>
                            <p>Telefono:****</p>
                        <p>Mail: *****</p>
                    </div>
                    <div class="col-sm-3">
                            <span><b>Dirección</b></span>
                            <p>Medios de pago</p>
                    </div>
                </div>
            </div>
        </footer>


    </div>


    <style>
        footer {
            position: relative;
            left: 0px;
            bottom: 0px;
            height: 190px;
            width: 100%;
            background: #f5f5ef;
            margin-bottom: 2rem;
        }
        .rs {
            vertical-align: middle;
        }
    </style>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>