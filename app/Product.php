<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasApiTokens;
    protected $fillable = ['company_id','product_name','product_desc','product_qty','product_price'];
}
