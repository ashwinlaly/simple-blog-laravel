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

    protected $attributes = [
        "status" => 1
    ];

    public function getStatusAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public static function activeOptions(){
        return [
            0 => 'InActive',
            1 => 'Active',
            2 => 'Progress'
        ];
    }

}
