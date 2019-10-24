<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PostExport implements FromView
{
    public function view() : View
    {
    	$posts = Post::all();
    	return view('exports.post.list', compact("posts"));
    }
}
