<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login - Konecta</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('recursos/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5 mt-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar Konecta</h1>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="usuario" name="usuario" 
                                            placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="contra" name="contra" placeholder="Contraseña">
                                    </div>
                                    <button onclick="inicarSession();" class="btn btn-primary btn-user btn-block">
                                        Iniciar
                                    </button>
                                    <a href="{{ route('inicio') }}" class="btn btn-primary btn-user btn-block">
                                        Ir a Cafetería
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var APP_URL = {!! json_encode(url('/')) !!}
        function inicarSession(){
            let usuario = $("#usuario").val(),
                contra = $("#contra").val();
            if(usuario != "" && contra != ""){
                $.ajax({
                    type:'POST',
                    url:APP_URL+'/login',
                    data:{
                        usuario:usuario,
                        contra:contra,
                    },
                    dataType:'json',
                    success:function(resutl){
                        if(resutl.status == 'success'){
                            $(location).attr('href',APP_URL+'/admin_inicio');
                        }else{
                            Swal.fire(
                                'Informacion',
                                'Volver a intentarlo, usuario o contraseña erronea.',
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
    </script>
</body>

</html>