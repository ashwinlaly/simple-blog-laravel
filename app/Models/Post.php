<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $attributes = [
    	"status" => 1
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public static function insertNewPost(){
    	$res = DB::insert('insert into posts(user_id, comments, status, created_at, updated_at) values(:user_id, :comments, :status, :created_at, :updated_at)', ["user_id" => 1, "comments" => "My New Comment", "status" => 1, "created_at" => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")]);
    	print_r($res);
    }

    public static function getAllPosts()
    {
    	$res = DB::select('select * from posts');
    	print_r($res);
    }

    public static function updatePost($comments,$id){
    	$res = DB::update('update posts set comments = :comments where id = :id', ["comments" => $comments, "id" => $id]);
    	print_r($res);
    }

    public static function deletePost($id){
    	$res = DB::delete('delete from posts where id = :id', ["id" => $id]);
    	print_r($res);
    }
}
