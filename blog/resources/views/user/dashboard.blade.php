<?php if( session('logado') == true) {?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>

    <meta charset="UTF-8">
    <!-- Favicon -->
    <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" />

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('js/ajax.js')}}"></script>
    <script src="{{URL::asset('js/lightbox.js')}}"></script>
    <script src="{{URL::asset('js/lightbox.js')}}"></script>
    <title>Document</title>
</head>
<body>
          <h1>Benvindo <?php echo session('usuario') ?></h1>


          <a class="btn btn-danger" href="/deslogar">Deslogar Usuarios</a>

          </br>
          </br>
          </br>

          <a class="btn btn-primary" href="/cadastro" target="_blank">Cadastrar Usuarios</a>

          </br>
          </br>


          <a class="btn btn-primary" href="/produtos" target="_blank">Ir para Produtos</a>

          </br>
          </br>

          <a  class="btn btn-primary" href="/marcas" target="_blank">Ir para Marcas</a>

          </br>
          </br>

          <a  class="btn btn-primary" href="/categoria"  target="_blank">Ir para Categorias</a>





</body>
</html>


<?php } else  return view('user.login') ?>


