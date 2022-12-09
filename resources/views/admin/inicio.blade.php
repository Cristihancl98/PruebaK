<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Konecta - admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('recursos/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('recursos/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        input[type=number] { -moz-appearance:textfield; }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup>Konecta</sup></div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/Admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('recursos/img/undraw_profile.svg' )}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cafeteria Konecta</h1>
                        <div>
                            <a href="#" data-toggle="modal" data-target="#crearProductoModal" class="mr-4 btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Crear productos</a>
                            <a href="#" data-toggle="modal" data-target="#crearcategoriaModal" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Crear Categoria</a>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Cantidad productos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" v-text="cantidadProducto"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Cantidad de ventas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" v-text="cantidadVenta"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Lista -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Lista de productos</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card shadow mb-4">
                                    <div class="p-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="idTablaClientes" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Referencia</th>
                                                        <th>Precio</th>
                                                        <th>Peso</th>
                                                        <th>Categoria</th>
                                                        <th>Stock</th>
                                                        <th>Opicones</th>
                                                        <th>Fecha registro</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 mt-3">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Lista de ventas</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card shadow mb-4">
                                    <div class="p-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="idTablaVentas" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Precio</th>
                                                        <th>Stock</th>
                                                        <th>Categoria</th>
                                                        <th>Fecha venta</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cerrar session</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona (si) para salir de la session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary"  href=" {{ route('login') }} ">Si</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crear producto Modal-->
        <div class="modal fade" id="crearProductoModal" tabindex="-1" role="dialog" aria-labelledby="crearProductoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearProductoModalLabel">Agrear producto</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Nombre</label>
                                    <input type="text" class="form-control form-control-user" id="nombreProducto" name="nombreProducto" placeholder="Nombre" v-model="producto.nombre">
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Referencia</label>
                                    <input type="text" class="form-control form-control-user" id="referenciaProducto" name="referenciaProducto" placeholder="Referencia" v-model="producto.referencia">
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Precio</label>
                                    <input type="number" class="form-control form-control-user" id="precioProducto" name="precioProducto" placeholder="Precio" v-model="producto.precio">
                                </div>
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Peso</label>
                                    <input type="number" class="form-control form-control-user" id="pesoProducto" name="pesoProducto" placeholder="Peso" v-model="producto.peso">
                                </div>
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Categoria</label>
                                    <select class="form-control form-control-user" name="categoriaProducto" id="categoriaProducto" v-model="producto.categoria">
                                        <option value="">Seleccionae</option>
                                        <option v-for="vector in categorias" :value="vector.id" v-text="vector.nombre"></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Cantidad</label>
                                    <input type="number" class="form-control form-control-user" id="stockProducto" name="stockProducto" placeholder="Cantidad" v-model="producto.cantidad">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" @click="agregarProducto();">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crear categoria Modal-->
        <div class="modal fade" id="crearcategoriaModal" tabindex="-1" role="dialog" aria-labelledby="crearcategoriaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearcategoriaModalLabel">Agregar Categoria</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="categoria" name="categoria" placeholder="Nombre de categoria" v-model="categoriaNombre">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" @click="agregarcategoria()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crear producto Modal-->
        <div class="modal fade" id="editarProductoModal" tabindex="-1" role="dialog" aria-labelledby="editarProductoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarProductoModalLabel">Editar producto</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Nombre</label>
                                    <input type="text" class="form-control form-control-user" id="nombreProductoEdit" name="nombreProductoEdit" placeholder="Nombre" v-model="productoEdit.nombre">
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Referencia</label>
                                    <input type="text" class="form-control form-control-user" id="referenciaProductoEdit" name="referenciaProductoEdit" placeholder="Referencia" v-model="productoEdit.referencia">
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Precio</label>
                                    <input type="number" class="form-control form-control-user" id="precioProductoEdit" name="precioProductoEdit" placeholder="Precio" v-model="productoEdit.precio">
                                </div>
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Peso</label>
                                    <input type="number" class="form-control form-control-user" id="pesoProductoEdit" name="pesoProductoEdit" placeholder="Peso" v-model="productoEdit.peso">
                                </div>
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Categoria</label>
                                    <select class="form-control form-control-user" name="categoriaProductoEdit" id="categoriaProductoEdit" v-model="productoEdit.categoria">
                                        <option value="">Seleccionae</option>
                                        <option v-for="vector in categorias" :value="vector.id" v-text="vector.nombre"></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" style="font-weight: 700;">Cantidad</label>
                                    <input type="number" class="form-control form-control-user" id="stockProductoEdit" name="stockProductoEdit" placeholder="Cantidad" v-model="productoEdit.cantidad">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" @click="editarProducto();">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    
    <script src="{{ asset('recursos/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="../public/recursos/vendor/jquery/jquery.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="../public/recursos/vendor/jquery-easing/jquery.easing.min.js"></script> -->
    
    <!-- Custom scripts for all pages-->
    <!-- <script src="../public/recursos/js/sb-admin-2.min.js"></script> -->

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var APP_URL = {!! json_encode(url('/')) !!}
        var tablaProducto = "",
            tablaVentas = "";
        var app = new Vue({
            el: '#wrapper',
            data: {
                categoriaNombre:'',
                producto:{
                    nombre:'',
                    referencia:'',
                    precio:'',
                    peso:'',
                    categoria:'',
                    cantidad:'',
                },
                productoEdit:{
                    nombre:'',
                    referencia:'',
                    precio:'',
                    peso:'',
                    categoria:'',
                    cantidad:'',
                },
                categorias:[],
                listaProducto:[],
                cantidadProducto:0,
                cantidadVenta:0,
                idProducto:0
            },
            created() {
                $.ajax({
                    url:APP_URL+'/productos',
                    dataType:'json',
                    success:function(result){
                        tableListadoProductos(result.data);
                    }
                });

                $.ajax({
                    url:APP_URL+'/listaVentas',
                    dataType:'json',
                    success:function(result){
                        $(document).ready(function() {
                            tablaVentas = $('#idTablaVentas').DataTable({
                                data: result.data,
                                columns: [{
                                        data: 'nombre',
                                        "render": function(data, type, row, meta) {
                                            return `
                                                <p style="font-weight: 800; margin-bottom: 0px;">`+row.nombre+`</h6>
                                            `;
                                        }
                                    },
                                    {
                                        data: 'precio',
                                        "render": function(data, type, row, meta) {
                                            return `
                                                <p style="margin-bottom: 0px;"> $ `+app.convertPrice(row.precio)+`</h6>
                                            `;
                                        }
                                    },
                                    {
                                        data: 'stock'
                                    },
                                    {
                                        data: 'categoria',
                                        "render": function(data, type, row, meta) {
                                            return `
                                                <h6><span class="badge bg-success" style="color:white;">`+row.categoria+`</span></h6>
                                            `;
                                        }
                                    }, 
                                    {
                                        data: 'created_at'
                                    },
                                ],
                                language: {
                                    "decimal": "",
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Filas",
                                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Filas",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscar:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                            });
                        });
                    }
                });

                $.ajax({
                    url:APP_URL+'/categorias',
                    dataType:'json',
                    success:function(result){
                        app.categorias = result.data;
                    }
                });

                $.ajax({
                    url:APP_URL+'/countProducto',
                    dataType:'json',
                    success:function(result){
                        app.cantidadProducto = result.data;
                    }
                });

                $.ajax({
                    url:APP_URL+'/countVenta',
                    dataType:'json',
                    success:function(result){
                        app.cantidadVenta = result.data;
                    }
                });
            },
            methods: {
                agregarcategoria(){
                    if(this.categoriaNombre != ""){
                        $.ajax({
                            type:'POST',
                            url:APP_URL+'/agregarCategorias',
                            data:{
                                categoria:this.categoriaNombre,
                            },
                            dataType:'json',
                            success:function(resutl){
                                if(resutl.status == 'success'){
                                    Swal.fire(
                                        'Exitosamente',
                                        'Registro exitosamente.',
                                        'success'
                                    )
                                    app.categorias = resutl.data;
                                    app.categoriaNombre = '';
                                }else if(resutl.status == 'stop'){
                                    Swal.fire(
                                        'Informacion',
                                        'ya esta registrado.',
                                        'info'
                                    )
                                }else{
                                    Swal.fire(
                                        'Informacion',
                                        'Volver a intentarlo.',
                                        'info'
                                    )
                                }
                            }
                        });
                    }else{
                        Swal.fire(
                            'Llenar campos',
                            'Por favor, llenar todos los campos.',
                            'info'
                        )
                    }
                },
                agregarProducto(){
                    console.log(this.categorias.length);
                    if(this.categorias.length == 0){
                        Swal.fire(
                            'Informacion',
                            'Primero debes crear un categoria, para creal producto.',
                            'info'
                        )
                    }else{
                        if(this.producto.nombre != "" && this.producto.referencia != "" && this.producto.precio != "" && this.producto.peso != "" && this.producto.categoria != "" && this.producto.cantidad != ""){
                            $.ajax({
                                type:'POST',
                                url:APP_URL+'/agregarProduct',
                                data:this.producto,
                                dataType:'json',
                                success:function(resutl){
                                    if(resutl.status == 'success'){
                                        Swal.fire(
                                            'Exitosamente',
                                            'Registro exitosamente.',
                                            'success'
                                        )
                                        app.producto = {
                                            nombre:'',
                                            referencia:'',
                                            precio:'',
                                            peso:'',
                                            categoria:'',
                                            cantidad:'',
                                        };
                                        app.cantidadProducto = resutl.data.length;
                                        if(tablaProducto != ""){
                                            tablaProducto.destroy();
                                        }
                                        tableListadoProductos(resutl.data);
                                    }else if(resutl.status == 'stop'){
                                        Swal.fire(
                                            'Informacion',
                                            'ya esta registrado.',
                                            'info'
                                        )
                                    }else{
                                        Swal.fire(
                                            'Informacion',
                                            'Volver a intentarlo.',
                                            'info'
                                        )
                                    }
                                }
                            });
                        }else{
                            Swal.fire(
                                'Llenar campos',
                                'Por favor, llenar todos los campos.',
                                'info'
                            )
                        }
                    }
                },
                editarProducto(){
                    if(this.productoEdit.nombreEdit != "" && this.productoEdit.referenciaEdit != "" && this.productoEdit.precioEdit != "" && this.productoEdit.pesoEdit != "" && this.productoEdit.categoriaEdit != "" && this.productoEdit.cantidadEdit != ""){
                        $.ajax({
                            type:'POST',
                            url:APP_URL+'/editar',
                            data:{
                                id:app.idProducto,
                                nombre:app.productoEdit.nombre,
                                referencia:app.productoEdit.referencia,
                                precio:app.productoEdit.precio,
                                peso:app.productoEdit.peso,
                                categoria:app.productoEdit.categoria,
                                cantidad:app.productoEdit.cantidad,
                            },
                            dataType:'json',
                            success:function(resutl){
                                if(resutl.status == 'success'){
                                    Swal.fire(
                                        'Exitosamente',
                                        'Registro exitosamente.',
                                        'success'
                                    )
                                    $("#editarProductoModal").modal("hide")
                                    if(tablaProducto != ""){
                                        tablaProducto.destroy();
                                    }
                                    tableListadoProductos(resutl.data);
                                    
                                }else if(resutl.status == 'stop'){
                                    Swal.fire(
                                        'Informacion',
                                        'no esta registrado.',
                                        'info'
                                    )
                                }else{
                                    Swal.fire(
                                        'Informacion',
                                        'Volver a intentarlo.',
                                        'info'
                                    )
                                }
                            }
                        });
                    }else{
                        Swal.fire(
                            'Llenar campos',
                            'Por favor, llenar todos los campos.',
                            'info'
                        )
                    }
                },
                convertPrice(num) {
                    return new Intl.NumberFormat("en-CO", { maximumFractionDigits: 0 })
                    .format(num)
                    .replace(/,/g, ".");
                }
            },
        })

        function borrar(id){
            Swal.fire({
                title: '¿Esta seguro que lo quieres elimiar?',
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Elimiar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        url:APP_URL+'/borrar',
                        data:{id:id},
                        dataType:'json',
                        success:function(resutl){
                            if(resutl.status == 'success'){
                                Swal.fire('Borrado exitosamente!', '', 'success')
                                if(tablaProducto != ""){
                                    tablaProducto.destroy();
                                }
                                app.cantidadProducto = resutl.data.length;
                                tableListadoProductos(resutl.data);
                            }else if(resutl.status == 'stop'){
                                Swal.fire(
                                    'Informacion',
                                    'no esta registrado.',
                                    'info'
                                )
                            }else{
                                Swal.fire(
                                    'Informacion',
                                    'Volver a intentarlo.',
                                    'info'
                                )
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

        function editar(id){
            $("#editarProductoModal").modal("show");
            $.ajax({
                type:'POST',
                url:APP_URL+'/obtenerProductor',
                data:{id:id},
                dataType:'json',
                success:function(resutl){
                    app.productoEdit = {
                        nombre:'',
                        referencia:'',
                        precio:'',
                        peso:'',
                        categoria:'',
                        cantidad:'',
                    }
                    app.productoEdit = {
                        nombre:resutl.data[0].nombre,
                        referencia:resutl.data[0].referencia,
                        precio:resutl.data[0].precio,
                        peso:resutl.data[0].peso,
                        categoria:resutl.data[0].categoria,
                        cantidad:resutl.data[0].stock,
                    }
                    app.idProducto = id;
                }
            });
        }

        function tableListadoProductos(datos){
            $(document).ready(function() {
                tablaProducto = $('#idTablaClientes').DataTable({
                    data: datos,
                    columns: [{
                            data: 'nombre',
                            "render": function(data, type, row, meta) {
                                return `
                                    <p style="font-weight: 800; margin-bottom: 0px;">`+row.nombre+`</h6>
                                `;
                            }
                        },
                        {
                            data: 'referencia'
                        },
                        {
                            data: 'precio',
                            "render": function(data, type, row, meta) {
                                return `
                                    <p style="font-weight: 800; margin-bottom: 0px;"> $`+row.precio+`</h6>
                                `;
                            }
                        },
                        {
                            data: 'peso'
                        },
                        {
                            data: 'categoria',
                            "render": function(data, type, row, meta) {
                                return `
                                    <h6><span class="badge bg-success" style="color:white;">`+row.categoria+`</span></h6>
                                `;
                            }
                        },
                        {
                            data: 'stock'
                        },
                        {
                            data: 'id',
                            "render": function(data, type, row, meta) {
                                return `
                            <div>
                                <a href="javascript:void(0);" onclick="borrar(` + row.id + `)">
                                    <i class="fas fa-trash" style="font-size: 20px; color: #4172fb; cursor:pointer;">
                                    </i>
                                </a>

                                <a href="javascript:void(0);" onclick="editar(` + row.id + `)">
                                    <i class="fas fa-edit ml-2" style="font-size: 20px; color: #4172fb; cursor:pointer;">
                                    </i>
                                </a>
                            </div>`;
                            }
                        },
                        {
                            data: 'created_at'
                        },
                    ],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Filas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Filas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                });
            });
        }

    </script>

</body>

</html>