<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

	public function scopeActive($query)
	{
		return $query->where('status',1);
	}

	public function products(){
		return $this->hasMany(Product::class);
	}

}
