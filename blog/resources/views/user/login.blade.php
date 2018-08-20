<!-- Tela de login do sistema -->
<!doctype html>
<html>
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

    <title>LOGIN</title>
</head>
<body>

    <h3>Realize login no sistema</h3>

    <section id="conteudo-view" class="login">
        {!! Form::open(['route' => 'user.login','method' => 'post']) !!}

        <label>
            {!! Form::text('user',null,['class' => 'input form-control','placeholder' => 'Insira usuario']) !!}
        </label>

        <label>
            {!! Form::password('password',['class' => 'input form-control','placeholder' => 'Insira Senha']) !!}
        </label>
            {!! Form::submit('Entrar' ,['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
    </section>
</body>
</html>