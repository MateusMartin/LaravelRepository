<?php

namespace App\Http\Controllers;



class ProdutosController {

  public function index(){
    $permissao = session('manterProduto');
    $admin = session('admin');
    if($admin == 's'){
        echo "Admininstradores não podem acessar as telas de Manter Categoria/Marcas e Produts";
    }
    else if($permissao == 's'){

        echo "Voce Tem acesso a essa pagina";
    }
    else
        echo "Vocé não tem permissão para acessar essa pagina";
        }


}
