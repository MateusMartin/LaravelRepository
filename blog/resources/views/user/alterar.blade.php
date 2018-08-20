<!-- Tela de edit dos usuarios casdastrados -->
<!-- Valida se usuario esta logado -->
<?php if( session('logado') == true) {?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>

    <head>
        <!-- Carrega os arquivos de stilos -->
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Document</title>

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



    </head>
</head>
<body>

            <!-- Trata os arquivos retornados pela função para serem inseridos automaticamente no formulario  -->
            @foreach($Cadastro as $itens)
                <?php

                 $dados['id'] = $itens->id;
                 $dados['user'] = $itens->user;
                 $dados['password'] = $itens->password;
                 $dados['admin'] = $itens->admin;
                 $dados['manterPodutos'] = $itens->manterProduto;
                 $dados['manterCategoria'] = $itens->manterCategoria;
                 $dados['manterMarca'] = $itens->manterMarca;

                 if($dados['admin'] == 's'){
                     $admS='sim';
                 }
                 else {
                     $admS = 'não';
                 }

                 if($dados['manterPodutos'] == 's'){
                     $mtP='sim';
                 }
                 else {
                     $mtP = 'não';
                 }

                 if($dados['manterCategoria'] == 's'){
                     $mtC='sim';
                 }
                 else {
                     $mtC = 'não';
                 }

                 if($dados['manterMarca'] == 's'){
                     $mtM='sim';
                 }
                 else {
                     $mtM = 'não';
                 }


                ?>


            @endforeach

            <h3> Alterando o Registro do Usuario : <?php echo  $dados['user'] ?> </h3>


            <!-- Formulario de edição-->
            <section id="dados-view" class="login">
                {!! Form::open(['route' => 'user.alterar','method' => 'post']) !!}

                <label>
                    {!! Form::hidden('id', $dados['id'],['class' => 'input form-control','placeholder' => 'Insira usuario']) !!}
                </label>

                <label> Usuario:
                    {!! Form::text('user',$dados['user'],['class' => 'input form-control','placeholder' => 'Insira usuario']) !!}
                </label>
                <br />
                <br />

                <label> Senha:
                    {!! Form::text('password',$dados['password'],['class' => 'input','placeholder' => 'Insira Senha']) !!}
                </label>

                <br />
                <br />

                <label> administrdor :
                    {!!Form::select('admin', array(
                      'default' => array($dados['admin'] => $admS),
                      'sim' => array('s' => 'sim'),
                      'não' => array('n' => 'não')));
                     !!}
                </label>

                <br />
                <br />

                <label> Manter Podutos :
                    {!!Form::select('manterProduto', array(
                    'default' => array($dados['manterPodutos'] => $mtP),
                    'sim' => array('s' => 'sim'),
                    'não' => array('n' => 'não')));
                   !!}
                </label>

                <br />
                <br />

                <label> Manter Categoria :
                    {!!Form::select('manterCategoria', array(
                    'default' => array($dados['manterCategoria']=>$mtC),
                    'sim' => array('s' => 'sim'),
                    'não' => array('n' => 'não')));
                   !!}
                </label>

                <br />
                <br />

                <label> Manter Marcas :
                    {!!Form::select('manterMarca', array(
                     'default' => array($dados['manterMarca'] => $mtM),
                     'sim' => array('s' => 'sim'),
                     'não' => array('n' => 'não')));
                     !!}
                </label>

                <br />
                <br />

                {!! Form::submit('Cadastrar',['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </section>




</body>
</html>
<?php } else  return view('user.login') ?>