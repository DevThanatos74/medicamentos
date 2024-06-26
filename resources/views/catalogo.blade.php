@extends('adminlte::page')

@section('title', 'Catálogos')

@section('content')

<?php
    session_start();
?>
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-12">
        <br>
            <div class="card">
                <div class="card-header text-white bg-dark mb-3">{{ __('Búsqueda de medicamentos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        @csrf

        <!-- MODAL EDICIÓN DE medicamento -->
    <form action="" method="post">
    @csrf

    <div class="modal fade" id="edicion" tabindex="-1" role="dialog" aria-labelledby="estadoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-dark">
            <h5 class="modal-title" id="estadoLabel">Detalles del medicamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <table>
            <tr><td colspan=2>
                Id: 
            <input type="text" class="form-control" id="id" name="id" readonly>
            </td></tr>
        <tr><td>
            <div class="input-group mb-3">
                Nombre del producto: 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                </div>
                <input type="text" class="form-control" id="producto" name="producto" readonly>
            </div>
            </div>
        </td>
        <td>
            <div class="input-group mb-3">
                Registro INVIMA: 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                </div>
                <input type="text" class="form-control" id="registro" name="registro" readonly>
            </div>
            </div>
        </td></tr>

        <tr><td>
            <div class="input-group mb-3">
                Fecha de expedición: 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" class="form-control" id="fecha_expedicion" name="fecha_expedicion" readonly>
            </div>
            </div>
        </td>
        <td>
            <div class="input-group mb-3">
                Fecha de vencimiento: 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" readonly>
            </div>
            </div>
        </td></tr>

        <tr><td>
            <div class="input-group mb-3">
                Cantidad: 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-list"></i></span>
                </div>
                <input type="number" class="form-control" id="cantidad" name="cantidad" readonly>
            </div>
            </div>
        </td>
        <td></tr>

        <tr><td colspan=2>
            <div class="input-group mb-3">
                Descripción del producto: 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
             
                <textarea disabled id="descripcion" name="descripcion" rows="2" cols="50" readonly></textarea>
                </div>
            </div>
            </div>
        </td></tr>

        <tr><td colspan=2>
            <div class="input-group mb-3">
                Componentes del producto: 
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-flask"></i></span>
                <textarea disabled id="componentes" name="componentes" rows="3" cols="50"></textarea>
                </div>
            </div>
            </div>
        </td></tr>
    </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        </div>
        </div>
    </div>
    </div>
    </form>

     <!-- MODAL compra DE medicamento -->
     <form action="registrar_orden" method="post">
    @csrf

    <div class="modal fade" id="inhabilitacion" tabindex="-1" role="dialog" aria-labelledby="estadoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-dark">
            <h5 class="modal-title" id="estadoLabel">Compra de medicamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       
        <div class="input-group mb-3">
            Id: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="id3" name="id3" required readonly>
                </div>
                </div>

            <div class="input-group mb-3">
                Nombre medicamento: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre3" name="nombre3" placeholder="Nombre completo" autofocus required>
                </div>
                </div>

                <div class="input-group mb-3">
                    Estado medicamento: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                    </div>
                    <input type="text" class="form-control" id="estado3" name="estado3" placeholder="Estado del medicamento" required>
                </div>
                </div>

                <div class="input-group mb-3">
                    Cantidad: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                    </div>
                    <input type="number" class="form-control" id="cantidad3" name="cantidad3" min="1" required>
                </div>
                </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary bg-green">
            <span class="fas fa-check"></span>
                {{ 'Comprar' }}
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>
    </form>
        <table class="table table-striped table-hover" id="catalogo" style='text-align: center; vertical-align: middle;'>
            <thead align="center">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Unidad</th>
                <th scope="col">Fecha vencimiento</th>
                <th scope="col">Componentes</th>
                <th scope="col" colspan='2'>Acciones</th>
                <th scope="col">Última mod</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{ $d->med_id }}</td>
                    <td>{{ $d->med_producto }}</td>
                    <td>{{ $d->med_cantidad }}</td>
                    <td>{{ $d->med_unidad }}</td>
                    <td>{{ $d->med_fecha_vencimiento }}</td>
                    <td>{{ $d->med_componentes }}</td>
                    <td>
                        <button type="button" class="btn btn-primary bg-green" data-toggle="modal" data-target="#inhabilitacion" title="Comprar" id="inhabilitar"
                        data-id3="{{ $d->med_id }}" data-nombre3="{{ $d->med_producto }}" data-cantidad3="{{ $d->med_cantidad }}" data-estado3="El medicamento se encuentra disponible">
                            <span class="fas fa-dollar-sign"></span>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edicion" title="Detalles" id="detalles"
                        data-id="{{ $d->med_id }}" data-producto="{{ $d->med_producto }}" data-registro="{{ $d->med_registro_sanitario }}" data-fecha_expedicion="{{ $d->med_fecha_expedicion }}" data-fecha_vencimiento="{{ $d->med_fecha_vencimiento }}" data-cantidad="{{ $d->med_cantidad }}" data-descripcion="{{ $d->med_descripcion }}" data-componentes="{{ $d->med_componentes }}">
                            <span class="fas fa-eye"></span>
                        </button>
                    </td>
                    <td >{{ $d->med_fecha_registro }}</td>
                </tr>
            @endforeach
             </tbody>
           
        </table>
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')

    <script>

        $('#catalogo').DataTable({
            responsive: true,
            autoWidth: false,

        "language": {   
            "lengthMenu": "Mostrar _MENU_ registros de página",
            "zeroRecords": "No se han encontrado registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se han encontrado registros",
            "infoFiltered": "(Filtrando de _MAX_ total de registros)",
            "search": "Busqueda: ",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
        });

        $(document).on("click", "#detalles", function() {
            var id = $(this).data('id');
            var producto = $(this).data('producto');
            var registro = $(this).data('registro');
            var fecha_expedicion = $(this).data('fecha_expedicion');
            var fecha_vencimiento = $(this).data('fecha_vencimiento');
            var cantidad = $(this).data('cantidad');
            var descripcion = $(this).data('descripcion');
            var componentes = $(this).data('componentes');

            $("#id").val(id);
            $("#producto").val(producto);
            $("#registro").val(registro);
            $("#fecha_expedicion").val(fecha_expedicion);
            $("#fecha_vencimiento").val(fecha_vencimiento);
            $("#cantidad").val(cantidad);
            $("#descripcion").val(descripcion);
            $("#componentes").val(componentes);
        });

        $(document).on("click", "#inhabilitar", function() {
            var id3 = $(this).data('id3');
            var nombre3 = $(this).data('nombre3');
            var cantidad3 = $(this).data('cantidad3');
            var estado3 = $(this).data('estado3');

            $("#id3").val(id3);
            $("#nombre3").val(nombre3);
            $("#cantidad3").val(cantidad3);
            $("#estado3").val(estado3);
        });

    var mensaje = <?php echo $_SESSION["mensaje"]; ?>;
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });

        switch (mensaje) {
            case 1:
                Toast.fire({
                text: " Registro exitoso!",
                type: "success",
                });
            break;

            case 2:
                Toast.fire({
                text: " Actualización exitosa!",
                type: "success",
                });
            break;

            case 3:
                Toast.fire({
                text: " Ha ocurrido un problema!",
                type: "error",
                });
            break;

            case 4:
                Toast.fire({
                text: " Inicio de sesión exitoso!",
                type: "success",
                });
            break;
        }
        <?php   $_SESSION["mensaje"] = 0;   ?>

    </script>
@endsection