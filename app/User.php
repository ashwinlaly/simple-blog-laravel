<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Make the Laravel Application to accept mass assignment
    /*protected $fillable = [
    	"name", "email", "password"
    ];*/

    //Opposite of the Fillable, Here Nothing is Guarded so accept mass values
    protected $guarded = [];



    // Make the Query cleaner
    public function scopeActive($query)
    {
    	return $query->where("active", 1);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
