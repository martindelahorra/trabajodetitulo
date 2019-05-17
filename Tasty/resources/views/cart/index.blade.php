@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2><i class="fas fa-shopping-cart"></i> Carrito</h2>
        <hr />
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        <h3>1 Item(s) seleccionado en el carrito</h3>
        <hr>
        <div class="row">
            <div class="col-sm-4 col-md-2">
                <img src="https://mlstaticquic-a.akamaihd.net/tabla-de-sushi-cpalitos-begourmet-D_NQ_NP_837781-MLU27606276813_062018-F.webp"
                    width="150px" height="100px">
            </div>
            <div class="col-sm-4 col-md-3">
                <h4>Tabla sushis</h4>
                <p>(Sushis)</p>
            </div>
            <div class="col-sm-4 col-md-2" >
                <button class="btn btn-sm" style="text-align: right"><span style="color:red;">Quitar</span></button>
            </div>
            <div class="col-sm-4 col-md-2">
                <select name="" id="">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
            </div>
            <div class="col-sm-4 col-md-2">
                <p>$17.300</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4 col-md-2">
                <img src="https://mlstaticquic-a.akamaihd.net/tabla-de-sushi-cpalitos-begourmet-D_NQ_NP_837781-MLU27606276813_062018-F.webp"
                    width="150px" height="100px">
            </div>
            <div class="col-sm-4 col-md-3">
                <h4>Tabla sushis</h4>
                <p>(Sushis)</p>
            </div>
            <div class="col-sm-4 col-md-2" >
                <button class="btn btn-sm" style="text-align: right"><span style="color:red;">Quitar</span></button>
            </div>
            <div class="col-sm-4 col-md-2">
                <select name="" id="">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
            </div>
            <div class="col-sm-4 col-md-2">
                <p>$17.300</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste obcaecati voluptates eos placeat earum
                    quia inventore deserunt, mollitia quidem animi quod officiis officia, sint sed odio aperiam saepe
                    perferendis consectetur!</p>
            </div>
            <div class="col">
                <p>SubTotal</p>
                <p><b>Total</b> </p>
            </div>
            <div class="col">
                <p>$17.300</p>
                <p><b>$18.300</b></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-8">
                <button type="button" class="btn btn-outline-secondary btn-lg">Continuar en la tienda</button>
            </div>
            <div class="col" >
                <button type="button" class="btn btn-info btn-lg" >Pedir <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection