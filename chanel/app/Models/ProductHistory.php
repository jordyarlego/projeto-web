<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    protected $table = "products_history";
    protected $fillable = [
        'date', 'product_id','user_id','paymentMethod','country','state','address','cep','status','quantity','cost'
    ];
}
