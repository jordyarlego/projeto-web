<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=[
        'nome','preco','descricao','tamanho','images'
    ];
    protected $rules=[
        'nome'      =>  'required|max:50|min:5',
        'preco'      =>  'required|max:10|min:1',
        'descricao'      =>  'required|max:250|min:10',
        'tamanho'      =>  'required|max:2|min:1',
        'images'      =>  'required',
        'quantidade'      =>  'required|integer',
    ];
}
