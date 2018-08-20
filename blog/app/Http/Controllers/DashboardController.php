<?php

namespace App\Http\Controllers;

use App\Repositories\UsuarioRepository;
use App\Validators\UsuarioValidator;
use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

//Controller para fazer login
class DashboardController extends Controller
{

    protected $repository;
    protected $validator;
    /**
     * UsuariosController constructor.
     *
     * @param UsuarioRepository $repository
     * @param UsuarioValidator $validator
     */
    public function __construct(UsuarioRepository $repository, UsuarioValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    //abre a tela de dashboard do
    public function index(){
        $logado = session('logado');
       if($logado == true){

           return view('user.dashboard');
       }
    }

    public function auth(Request $request){

        //limpa registros caso tenha algum nas variaveis de sessao
        session()->forget('manterProduto');
        session()->forget('usuario');
        session()->forget('manterCategoria');
        session()->forget('admin');
        session()->forget('manterMarca');
        session()->forget('logado');


        $data = [
          'user' => "'{$request->get('user')}'",
          'password' => $request->get('password'),
        ];

        //Busca por registros com o nome e senha do usuario
        $quety = "select * from usuarios where user = '{$request->get('user')}' and password = {$request->get('password')} ";

        $results = DB::table('usuarios')->get()->where('user', "{$request->get('user')}")
                                                    ->where('password',"{$request->get('password')}");

        foreach ($results as $user)
        {
            //Reseta variaveis de sessao

            //armazena dados do usuario "Logado" em variaveis de sessao
            session(['manterProduto' => $user->manterProduto]);
            session(['usuario' => $user->user]);
            session(['manterCategoria' => $user->manterCategoria]);
            session(['admin' => $user->admin]);
            session(['manterMarca' => $user->manterMarca]);
            session(['logado' => true]);


        }

        $cart = session('usuario');

        //caso ele tenha um usuario logado vai para o index
        if($cart != null){
            $_SESSION['Logado'] = true;

            return redirect()->route('user.dashboard');
        }
        else{
            echo "falha no login";
        }


    }

    //Função desloga o Usuario
    public function Deslogar(){


        session()->forget('manterProduto');
        session()->forget('usuario');
        session()->forget('manterCategoria');
        session()->forget('admin');
        session()->forget('manterMarca');
        session()->forget('logado');

        return view('user.login');
    }

}
