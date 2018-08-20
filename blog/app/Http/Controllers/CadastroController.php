<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cadastro;

//Crud Controller do cadastro de usuario
class CadastroController extends Controller
{


    //Busca no banco de dados os registros para montar a tabela
    public function index() {
        $cart = session('logado');
        if($cart == true) {
            $Cadastro = DB::table('usuarios')->get();


            return view('user.cadastro', compact('Cadastro'));
        }
        else echo "Necessario estar logado para acessar essa tela";
     }


    //Inserre novo registro no banco de dados
    public function insert(Request $request) {
        $cart = session('logado');
        if($cart == true) {

        try {

            DB::table('usuarios')->insert(
                [
                    'user' => $request->user,
                    'password' => $request->password,
                    'admin' => $request->admin,
                    'manterProduto' => $request->manterProduto,
                    'manterCategoria' => $request->manterCategoria,
                    'manterMarca' => $request->manterMarca,
                ]
            );
        } catch (\Exception $e) {
            return $e;
        }


        return redirect()->route('user.cadastrar')->with('message', 'Produto criado com sucesso!');
        }else {
            echo "Porfavor realize o login antes de fazer qualquer ação";
        }
    }


    //Redireciona usuario pra tela de edit
    public function edit($id) {
        $cart = session('logado');
        if($cart == true) {

        //Busca os dados do usuario pelo id e os envia para serem setados no formulario de edit
        $Cadastro = null;
        $Cadastro = DB::table('usuarios')->get()->where('id', '=', $id);



        return view('user.alterar', compact('Cadastro'));
        }else {
            echo "Porfavor realize o login antes de fazer qualquer ação";
        }

    }


    //Realiza update dos dados
    public function update(Request $request) {
        $cart = session('logado');
        if($cart == true) {
         $dadosNew['id'] = $request->id;
         $dadosNew['user'] = $request->user;
         $dadosNew['password'] = $request->password;
         $dadosNew['admin'] = $request->admin;
         $dadosNew['manterProduto'] = $request->manterProduto;
         $dadosNew['manterCategoria'] = $request->manterCategoria;
         $dadosNew['manterMarca'] = $request->manterMarca;

        var_dump(DB::table('usuarios')
            ->where('id',  $dadosNew['id'])
            ->update(
                ['user' =>  "{$dadosNew['user']}"]
                ,['password' => "{$dadosNew['password']}"]
                ,['admin' => "'{$dadosNew['admin']}'"]
                ,['manterProduto' => "'{$dadosNew['manterProduto']}'"]
                ,['manterCategoria' => "'{$dadosNew['manterCategoria']}'"]
                ,['manterMarca' => "'{$dadosNew['manterMarca']}'"]
            ));


        return redirect()->route('user.cadastrar')->with('message', 'Produto alterado com sucesso!');
        }else {
            echo "Porfavor realize o login antes de fazer qualquer ação";
        }
    }

    //deleta da tabela os dados do id trazido por parametro
    public function destroy($id) {
        //Valida se o usuario esta logado
        $cart = session('logado');
        if($cart == true) {
            DB::table('usuarios')->where('id', '=', $id)->delete();

            return redirect()->route('user.cadastrar')->with('message', 'Produto deletado com sucesso!');
        }
        else {
                echo "Porfavor realize o login antes de fazer qualquer ação";
            }

    }

}
