@extends('adminlte::page')

@section('title', 'Proveedores')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap4.css">
@endsection

@section('content')

<?php
    session_start();
?>
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-6">
        <br>
            <div class="card">
                <div class="card-header text-white bg-dark mb-3">{{ __('Registro de proveedor') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
    <form action="registrar_proveedor" method="post">
    @csrf
    
    <div class="input-group mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" autofocus required>
    </div>
    </div>

    <div class="input-group mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" required>
    </div>
    </div>

    <div class="input-group mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
        </div>
        <input type="number" class="form-control" name="telefono" placeholder="Teléfono" required>
    </div>
    </div>

    </div>

    <div class="card-footer">
    <button type="submit" class="btn btn-primary float-right">
        <span class="fas fa-plus"></span> Registrar</button>
    </div>

    </form>
                         
            </div>
        </div>
    </div>


    <!-- MODAL EDICIÓN DE PROVEEDORES -->
    <form action="actualizar_proveedor" method="post">
    @csrf

    <div class="modal fade" id="edicion" tabindex="-1" role="dialog" aria-labelledby="estadoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="estadoLabel">Edición de proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       
        <div class="input-group mb-3">
            Id:
                <div class="input-group">
               
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="text" class="form-control" id="id" name="id" required readonly>
                </div>
                </div>

            <div class="input-group mb-3">
                Nombre proveedor: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" autofocus required>
                </div>
                </div>

                <div class="input-group mb-3">
                    Correo electrónico: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico" required>
                </div>
                </div>

                <div class="input-group mb-3">
                    Teléfono: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                </div>
                </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
            <span class="fas fa-recycle"></span>
                {{ 'Actualizar' }}
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>
    </form>

    <!-- MODAL HABILITACIÓN DE PROVEEDORES -->
    <form action="habilitacion_proveedor" method="post">
    @csrf

    <div class="modal fade" id="habilitacion" tabindex="-1" role="dialog" aria-labelledby="estadoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="estadoLabel">Estado del proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       
        <div class="input-group mb-3">
                Id: 
                <div class="input-group">        
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="text" class="form-control" id="id2" name="id2" required readonly>
                </div>
                </div>

            <div class="input-group mb-3">
                Nombre proveedor: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre completo" autofocus required>
                </div>
                </div>

                <div class="input-group mb-3">
                    Estado proveedor: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                    </div>
                    <input type="text" class="form-control" id="estado2" name="estado2" placeholder="Estado del proveedor" required>
                </div>
                </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary bg-green">
            <span class="fas fa-thumbs-up"></span>
                {{ 'Habilitar' }}
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>
    </form>

    <!-- MODAL INHABILITACIÓN DE PROVEEDORES -->
    <form action="inhabilitacion_proveedor" method="post">
    @csrf

    <div class="modal fade" id="inhabilitacion" tabindex="-1" role="dialog" aria-labelledby="estadoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="estadoLabel">Estado del proveedor</h5>
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
                Nombre proveedor: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre3" name="nombre3" placeholder="Nombre completo" autofocus required>
                </div>
                </div>

                <div class="input-group mb-3">
                    Estado proveedor: 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                    </div>
                    <input type="text" class="form-control" id="estado3" name="estado3" placeholder="Estado del proveedor" required>
                </div>
                </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary bg-red">
            <span class="fas fa-thumbs-down"></span>
                {{ 'Inhabilitar' }}
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>
    </form>

    <div class="col-md-12">
        <br>
            <div class="card">
                <div class="card-header text-white bg-dark mb-3">{{ __('Listado de proveedores') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        @csrf

        <table class="table table-striped table-hover" id="proveedores" style='text-align: center; vertical-align: middle;'>
            <thead align="center">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col" class="d-none d-sm-block">Correo</th>
                <th scope="col" colspan='2'>Acciones</th>
                <th scope="col">Última mod</th>
                </tr>
            </thead>
           
            <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{ $d->pro_id }}</td>
                    <td>{{ $d->pro_nombre }}</td>
                    <td class="d-none d-sm-block">{{ $d->pro_correo }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edicion" title="Editar" id="editar"
                        data-id="{{ $d->pro_id }}" data-nombre="{{ $d->pro_nombre }}" data-correo="{{ $d->pro_correo }}" data-telefono="{{ $d->pro_telefono }}">
                            <span class="fas fa-edit"></span>
                        </button>
                    </td>
                    @if ($d->pro_estado === 1)
                    <td>
                        <button type="button" class="btn btn-primary bg-red" data-toggle="modal" data-target="#inhabilitacion" title="Inhabilitar" id="inhabilitar"
                        data-id3="{{ $d->pro_id }}" data-nombre3="{{ $d->pro_nombre }}" data-estado3="El usuario se encuentra habilitado">
                            <span class="fas fa-thumbs-down"></span>
                        </button>
                    </td>
                    @else
                    <td>
                        <button type="button" class="btn btn-primary bg-green" data-toggle="modal" data-target="#habilitacion" title="Habilitar" id="habilitar"
                        data-id2="{{ $d->pro_id }}" data-nombre2="{{ $d->pro_nombre }}" data-estado2="El usuario se encuentra inhabilitado">
                            <span class="fas fa-thumbs-up"></span>
                        </button>
                    </td>
                    @endif
                   
                    <td >{{ $d->pro_fecha_registro }}</td>
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

        $('#proveedores').DataTable({
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

        $(document).on("click", "#editar", function() {
            var id = $(this).data('id');
            var nombre = $(this).data('nombre');
            var correo = $(this).data('correo');
            var telefono = $(this).data('telefono');

            $("#id").val(id);
            $("#nombre").val(nombre);
            $("#correo").val(correo);
            $("#telefono").val(telefono);
        });

        $(document).on("click", "#habilitar", function() {
            var id2 = $(this).data('id2');
            var nombre2 = $(this).data('nombre2');
            var estado2 = $(this).data('estado2');

            $("#id2").val(id2);
            $("#nombre2").val(nombre2);
            $("#estado2").val(estado2);
        });

        $(document).on("click", "#inhabilitar", function() {
            var id3 = $(this).data('id3');
            var nombre3 = $(this).data('nombre3');
            var estado3 = $(this).data('estado3');

            $("#id3").val(id3);
            $("#nombre3").val(nombre3);
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
        }
        <?php   $_SESSION["mensaje"] = 0;   ?>

    </script>
@endsection