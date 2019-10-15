<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{

    /*protected $fillable = [
        "name","price","quantity","category_id","image","status","image_ext","original_name"
    ];*/

    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
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
