<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PostExport implements FromView
{

	public function __construct(){

	}

    public function view() : View
    {
    	// $posts = Post::where(["id" => 1])->get();
    	// $posts = Post::all();
    	$users = \App\Models\User::first();
    	return view('exports.post.list', compact("users"));
    }
}
