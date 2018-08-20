<!-- Tela de index dos usuarios casdastrados -->
<!-- Valida se usuario esta logado -->
<?php if( session('logado') == true) {?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
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
<body>

      <div class ="panel-body">
            <h3>Inserir Registro</h3>

          <!-- Formulario para inserir novos Registros -->
          <section id="conteudo-view" class="login">
              {!! Form::open(['route' => 'user.cadastrar','method' => 'post']) !!}

              <label> Usuario:
                  {!! Form::text('user',null,['class' => 'input form-control','placeholder' => 'Insira usuario']) !!}
              </label>
              <br />
              <br />

              <label> Senha:
                  {!! Form::password('password',['class' => 'input form-control','placeholder' => 'Insira Senha']) !!}
              </label>

              <br />
              <br />

              <label> administrdor :
                  {!!Form::select('admin', array(
                    'sim' => array('s' => 'sim'),
                    'não' => array('n' => 'não')));
                   !!}
              </label>

              <br />
              <br />

              <label> Manter Podutos :
                  {!!Form::select('manterProduto', array(
                    'sim' => array('s' => 'sim'),
                    'não' => array('n' => 'não')));
                   !!}
              </label>

              <br />
              <br />

              <label> Manter Categoria :
                  {!!Form::select('manterCategoria', array(
                    'sim' => array('s' => 'sim'),
                    'não' => array('n' => 'não')));
                   !!}
              </label>

              <br />
              <br />

              <label> Manter Marcas :
                  {!!Form::select('manterMarca', array(
                    'sim' => array('s' => 'sim'),
                    'não' => array('n' => 'não')));
                   !!}
              </label>

              <br />
              <br />

              {!! Form::submit('Cadastrar',['class' => 'btn btn-primary']) !!}

              {!! Form::close() !!}
          </section>

      </div>

      <br />
      <br />
      <br />
      <br />



      <!-- Monta os dados da table -->
   <div class="row">
      <div class="panel-body">
            <table class="table table">
                <thead>
                <tr>
                    <th id="center">Código</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Admin</th>
                    <th>Manter Produto</th>
                    <th>Manter Categoria</th>
                    <th>Manter Marca</th>
                    <th>Editar/Exluir</th>

                </tr>
                </thead>
                <tbody>
                @foreach($Cadastro as $itens)

                    <?php if($itens->admin == 's'){
                            $admin = 'Sim';
                            }
                            else $admin = 'Não';


                         if($itens->manterProduto == 's'){
                            $manterProduto = 'Sim';
                            }
                            else $manterProduto = 'Não';


                         if($itens->manterCategoria == 's'){
                             $manterCategoria = 'Sim';
                            }
                            else $manterCategoria = 'Não';


                         if($itens->manterMarca == 's'){
                            $manterMarca = 'Sim';
                            }
                            else $manterMarca = 'Não';



                     ?>

                    <tr>
                        <td>{{$itens->id}}</td>
                        <td>{{$itens->user}}</td>
                        <td>{{$itens->password}}</td>
                        <td>{{$admin}}</td>
                        <td>{{$manterProduto}}</td>
                        <td>{{$manterCategoria}}</td>
                        <td>{{$manterMarca}}</td>
                        <td>
                            &nbsp;<!--Carrega botoes de edit e de delete -->
                            <a href="{{route('destroi.edit', $itens->id)}}"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Alterar"><i class="fa fa-pencil"></i></a>
                            <form style="display: inline-block;" method="post"
                                  action="{{route('destroi.destroy', $itens->id)}}"
                                  data-toggle="tooltip" data-placement="top"
                                  title="Excluir"
                                  onsubmit="return confirm('Confirma exclusão?')">
                                {{method_field('DELETE')}}{{ csrf_field() }}
                         <button type="post" style="background-color: #fff">
                                    <a><i class="fa fa-trash-o"></i></a>
                          </button></form></td>




                    </tr>
                @endforeach
                </tbody>
            </table>
      </div>
   </div>
</body>
</html>
<?php } else  return view('user.login') ?>