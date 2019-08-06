@extends('layouts.master')
@section('contenido')
<div class="row">
    <div class="col text-center">
        <h1>Bienvenido</h1>
    </div>
</div>
<!-- Carrusel Horizontal -->
<div class="row mt-2 mb-2" >
    <div class="col">
        <div id="carouselHorizontal" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselHorizontal" data-slide-to="0" class="active"></li>
                <li data-target="#carouselHorizontal" data-slide-to="1"></li>
                <li data-target="#carouselHorizontal" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/carrusel1.png" alt="First slide" height="300">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/carrusel2.jpg" alt="Second slide" height="300">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/carrusel3.jpg" alt="Third slide" height="300">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselHorizontal" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselHorizontal" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<!-- Corrusel del home -->
<div class="row">
    <!-- <div class="col-sm">
            <div>
                <img src="{{ asset('images/inicio.jpg') }}" class="img-fluid" alt='Soy un banner'>
            </div>
        </div> -->
    <div class="col-sm-4">
        <div class="card">
            <div id="carouselControls1" class="carousel slide" data-ride="carousel">
                <a href="/pizzas">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/pizza1.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                    <div class="carousel-item">
                        <img src="images/pizza2.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                </div>
                </a>
                <a class="carousel-control-prev" href="#carouselControls1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselControls1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Pizzas</h5>
                <a href="/pizzas" class="btn btn-secondary">Ver Detalles</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div id="carouselControls2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/sushi1.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                    <div class="carousel-item">
                        <img src="images/sushi2.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                    <div class="carousel-item">
                        <img src="images/sushi3.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                    <div class="carousel-item">
                        <img src="images/sushi4.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselControls2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselControls2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Sushi</h5>
                <a href="/tabla_sushis" class="btn btn-secondary">Ver Detalles</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div id="carouselControls3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/promo1.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                    <div class="carousel-item">
                        <img src="images/promo2.jpg" class="d-block w-100" alt="Imagen no disponible">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselControls3" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselControls3" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Promos</h5>
                <a href="#" class="btn btn-secondary">Ver Detalles</a>
            </div>
        </div>
    </div>
    <!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
    </p> -->
</div>

<style>
        .card {
            margin-top: 10px;
        }
    </style>
@endsection 