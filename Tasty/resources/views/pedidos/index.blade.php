@extends('layouts.master')
@section('contenido')


<div class="row mt-4">
    <div class="col">
        <h2>Pedidos Activos</h2>
        <hr />
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover">
            <thead class="text-center">
                <tr>
                    <th>Nombre Usuario</th>
                    <th>Estado Pedido</th>
                    <th>Dirección</th>
                    <th>Monto</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>Juan Carlos Avendaño</td>
                    <td>
                        <select>
                            <option value="P">En preparación</option>
                            <option value="E">Enviado</option>
                        </select>
                    </td>
                    <td>Calle Las Margaritas #354, Mirador Reñaca</td>
                    <td>$14.500</td>
                    <td>
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">Detalle pedido</button>
                    </td>
                </tr>
                <tr>
                    <td>José Aguirre</td>
                    <td>
                        <select>
                            <option value="P">En preparación</option>
                            <option value="E">Enviado</option>
                        </select>
                    </td>
                    <td>Pasaje 1 #14, Villa Rukan</td>
                    <td>$7.000</td>
                    <td>
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">Detalle pedido</button>
                    </td>
                </tr>
                <tr>
                    <td>Claudio Pizarro</td>
                    <td>
                        <select>
                            <option value="P">En preparación</option>
                            <option value="E">Enviado</option>
                        </select>
                    </td>
                    <td>Calle 5 #12, Achupallas</td>
                    <td>$8.400</td>
                    <td>
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">Detalle pedido</button>
                    </td>
                </tr>
                <tr>
                    <td>Ximena Gomez</td>
                    <td>
                        <select>
                            <option value="P">En preparación</option>
                            <option value="E">Enviado</option>
                        </select>
                    </td>
                    <td>Calle Las Magnolias #167, Sta. Julia</td>
                    <td>$17.000</td>
                    <td>
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">Detalle pedido</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/" class="btn btn-outline-info">Volver al inicio</a>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detalle del Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Pizza Familiar <span class="text-muted texto-info">(Jamón, Cebolla Morada, Extra Queso, Piña)</span></li>
                    <li>Tabla 24 Piezas <span class="text-muted texto-info">(Sesamo, Panko frito)</span></li>
                    <li>Pizza Familiar <span class="text-muted texto-info">(Champiñón, Choclo, Palmito, Extra Queso, Tomate)</span></li>
                </ul>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


@endsection