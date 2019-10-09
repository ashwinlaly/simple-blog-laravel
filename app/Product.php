<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{

    protected $fillable = [
        "name","price","quantity","category_id","image","status","image_ext","original_name"
    ];


    public function category() {
        return $this->belongsTo('Category');
    }

    public function getAllProducts()
    {
    	$res = DB::table('products')
    					->join('categories', 'categories.id', '=', 'products.category_id')
    					->select('products.*', 'categories.name as category_name')
    					->get();
    	return $res;
    }
    public function getProductById($id)
    {
    	$res = DB::table('products')
    					->join('categories', 'categories.id', '=', 'products.category_id')
    					->where(array('products.id' => $id))
    					->select('products.*', 'categories.name as category_name')
    					->get();
    	return $res;
    }
}
