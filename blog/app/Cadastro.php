<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = ['user','password','admin','manterProduto','manterMarca','manterCategoria'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $table = ['usuarios'];
}
