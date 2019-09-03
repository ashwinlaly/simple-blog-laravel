<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    //
    public function getAllProducts()
    {
    	$res = DB::table('products')
    					->join("categories", "categories.id" , "=" , "products.category_id")
    					->select("products.*", "categories.name as category_name")
    					->get();
    	return $res;
    }
}
