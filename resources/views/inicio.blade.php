<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Cafetería Konecta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        input[type=number] { -moz-appearance:textfield; }
    </style>
    <!-- =======================================================
  * Template Name: OnePage - v4.9.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body id>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="javascript:void(0);" style="cursor: text;">Cafetería Konecta</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
                    <li class="dropdown"><a href="#"><span>Categorias</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li v-for="vector in categorias"><a href="javascript:void(0)"  @click="obtenerProductos(vector.id);" v-text="vector.nombre"></a></li>
                        </ul>
                    </li>
                    <li><a class="getstarted scrollto" href=" {{ route('login') }} ">admin</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1>Cafetería Konecta</h1>
                    <h2>¡Encuentra todo lo que quieras!</h2>
                </div>
            </div>

            <div class="row icon-boxes">

                <div v-if="listadoProductos.length == 0" class="col-xl-12 col-lg-12 text-center">
                    <h2>¡No hay productos en esa categoria!</h2>
                </div>
                <div v-else style="padding-bottom: 30px;" v-for="vector in listadoProductos" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box w-100">
                        <div class="icon"><i class="ri-command-line"></i></div>
                        <h4 class="title" v-text="vector.nombre"></h4>
                        <p class="description" v-text="'Referencia: '+vector.referencia"></p>
                        <p class="description" v-text="'Peso: '+vector.peso"></p>
                        <p class="description" v-text="'Precio: $'+convertPrice(vector.precio)"></p>
                        <p class="description" v-text="'Cantidad: '+vector.stock"></p>
                        <p class="description mt-3">
                            <button class="btn w-100" @click="obtenerProductos(vector.id);" style="background-color: #124265; color:white;">Comprar</button>
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="compraModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realizar compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center" v-text="productoCompra.nombre">Titulo</h3>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Referencia</span>
                                <input type="text"  disabled class="form-control" v-model="productoCompra.referencia">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Precio ($)</span>
                                <input type="text" disabled class="form-control" v-model="productoCompra.precio">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Peso</span>
                                <input type="text" disabled class="form-control" v-model="productoCompra.peso">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad disponible</span>
                                <input type="number" disabled class="form-control" v-model="productoCompra.cantidad">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad a comprar</span>
                                <input type="number" class="form-control"  v-model="cantidadCompra">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Total ($)</span>
                                <input type="text" disabled class="form-control" v-model="precioTotal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn" style="background-color: #124265; color:white;" @click="realizarCompra();">Confirmar Compra</button>
                </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <style>
        #hero {
            width: 100%;
            height: auto;
            position: relative;
            background: url(../img/hero-bg.jpg) top center;
            background-size: cover;
            position: relative;
        }
    </style>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var APP_URL = {!! json_encode(url('/')) !!}
        var app = new Vue({
            el: '#header',
            data: {
                categorias:[],
            },
            created() {
                $.ajax({
                    url:APP_URL+'/categorias',
                    dataType:'json',
                    success:function(result){
                        app.categorias = result.data;
                    }
                });
            },
            methods: {
                obtenerProductos(id){
                    $.ajax({
                        type:'POST',
                        url:APP_URL+'/obtenerCategoria',
                        data:{id:id},
                        dataType:'json',
                        success:function(result){
                            app2.listadoProductos = result.data;
                        }
                    });
                }
            },
        })

        var app2 = new Vue({
            el: '#hero',
            data: {
                listadoProductos:[],
                productoCompra:{
                    nombre:'',
                    referencia:'',
                    precio:'',
                    peso:'',
                    cantidad:'',
                    categoria:''
                },
                cantidadCompra:0,
                precioTotal:0,
                idCompra:0,
            },
            created() {
                $.ajax({
                    url:APP_URL+'/productos',
                    dataType:'json',
                    success:function(result){
                        app2.listadoProductos = result.data;
                    }
                });
            },
            methods: {
                obtenerProductos(id){
                    $.ajax({
                        type:'POST',
                        url:APP_URL+'/obtenerProductor',
                        data:{id:id},
                        dataType:'json',
                        success:function(resutl){
                            app2.idCompra = id;
                            app2.productoCompra = {
                                nombre:'',
                                referencia:'',
                                precio:'',
                                peso:'',
                                cantidad:'',
                                categoria:''
                            }
                            app2.cantidadCompra = 0;
                            app2.precioTotal = 0;
                            app2.productoCompra = {
                                nombre:resutl.data[0].nombre,
                                referencia:resutl.data[0].referencia,
                                precio:app2.convertPrice(resutl.data[0].precio),
                                peso:resutl.data[0].peso,
                                cantidad:resutl.data[0].stock,
                                categoria:resutl.data[0].categoria,
                            }
                        }
                    });
                    $("#compraModal").modal("show");
                },
                realizarCompra(){
                    if(parseInt(app2.cantidadCompra) <= parseInt(app2.productoCompra.cantidad)){
                        if(app2.cantidadCompra > 0){
                            $.ajax({
                                type:'POST',
                                url:APP_URL+'/comprar',
                                data:{
                                    id:app2.idCompra,
                                    precio:parseInt(app2.productoCompra.precio.replace('.', '')) * app2.cantidadCompra,
                                    nombre:app2.productoCompra.nombre,
                                    stock:app2.cantidadCompra,
                                    categoria:app2.productoCompra.categoria,
                                },
                                dataType:'json',
                                success:function(result){
                                    if(result.status == 'success'){
                                        Swal.fire(
                                            'Exitosa',
                                            'Compra realizada exitosamente.',
                                            'success'
                                        )   
                                        app2.precioTotal = 0;
                                        app2.cantidadCompra = 0;
                                        app2.listadoProductos = result.data;
                                        $("#compraModal").modal("hide");
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
                                'Informacion',
                                'Selecciona la cantidad que deseas comprar.',
                                'info'
                            )
                        }
                    }else{
                        Swal.fire(
                            'Informacion',
                            'Cantidad no disponible.',
                            'info'
                        )
                        app2.precioTotal = 0;
                    }
                },
                convertPrice(num) {
                    return new Intl.NumberFormat("en-CO", { maximumFractionDigits: 0 })
                    .format(num)
                    .replace(/,/g, ".");
                }
            },
            watch:{
                cantidadCompra:function(val) {
                    if(val != ""){
                        app2.precioTotal = 0;
                        if(parseFloat(val) <= parseFloat(app2.productoCompra.cantidad)){
                                app2.precioTotal = app2.convertPrice(val * parseInt(app2.productoCompra.precio.replace('.', '')));
                        }else{
                            Swal.fire(
                                'Informacion',
                                'Cantidad no disponible.',
                                'info'
                            )
                        }
                    }
                },
            }
        });
    </script>
</body>

</html>