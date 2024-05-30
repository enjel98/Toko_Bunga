<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $table = "shoppings";
    protected $fillable = [
        'id_product',
        'name_customer',
        'qty',
        'description'
    ];
}
