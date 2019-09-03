<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->user = new User();
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        $product = $this->product->getAllProducts();
        return view('products.list_product', ["products" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => 'required',
            "password" => 'required'
        ]);
        $email = $request->input("email");
        $password = md5($request->input("password"));
        $count = $this->user::where(array('email' => $email, "password" => $password))->count();
        if ($count >= 1) {
            session()->flash('notify-success','Sucessfully logged in');
            session()->put('loggedIn', 1);
            session()->put('loggerId', $email);
            return redirect('/products');
        } else {
            session()->flash('notify-error','Account Does not exists');
        }
        return redirect('/login');        
    }

    public function signin(Request $request)
    {
        $request->validate([
            "name" => 'required|min:5',
            "email" => 'required',
            "password" => 'required|min:8|max:15'
        ]);

        $name = $request->input("name");
        $email = $request->input("email");
        $password = md5($request->input("password"));

        $count = $this->user::where(array('email' => $email))->count();
        if ($count >= 1) {
            session()->flash('notify-error','Email Already registered');
            return redirect('/signin');
        } else {
            $this->user->name = $name;
            $this->user->email = $email;
            $this->user->password = $password;
            $this->user->save();
            session()->flash('notify-success','Account Created');
        }
        return redirect('/login');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
