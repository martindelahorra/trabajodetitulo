@extends('layouts.master') 
@section('contenido')

<div class="row">
    <div class="col text-center">
        <h1>Bienvenido</h1>
    </div>
</div>

{{-- div 2 de imagenes--}}
<div class="col">
    <div class="row">
        <div class="col-sm">

            <div>
                <img src="{{ asset('images/inicio.jpg') }}" class="img-fluid" alt='Soy un banner'>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 20rem; ">
                <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pizza1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pizza2.jpg" class="d-block w-100" alt="...">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                              <span class="sr-only">Previous</span>
                                                            </a>
                    <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                              <span class="sr-only">Next</span>
                                                            </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Pizzas</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-secondary">Ver Detalles...</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 20rem; ">
                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/sushi1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/sushi2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/sushi3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/sushi4.jpg" class="d-block w-100" alt="...">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                                                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                      <span class="sr-only">Previous</span>
                                                                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                                                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                      <span class="sr-only">Next</span>
                                                                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Sushi</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-secondary">Ver Detalles...</a>
                </div>
            </div>
        </div>
    </div>

</div>







<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
</p>
@endsection