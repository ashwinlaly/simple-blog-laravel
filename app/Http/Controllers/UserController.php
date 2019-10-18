<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;

use App\Mail\TestEmail;

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
        Mail::to('ashwinlaly@gmail.com')->send(new TestEmail());
        $products = $this->product::all();
        return view('products.product_list', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = $this->category::active()->get();
        return view('products.product_create',["categories" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "quantity" => "required",
            "category" => "required",
        ]);

        $file = $request->file('image');
        $extension = array('jpg','png','jpeg');
        $file_ext =  $file->getClientOriginalExtension();
        $ori_name = $file->getClientOriginalName();
        if (in_array($file_ext, $extension)) {
            $image_name = md5(date("Y-m-d H:i:s")."-".rand(1,10000)).".".$file_ext;
            $file->move('uploads',$image_name);
            $name = $request->input('name');
            $price = $request->input('price');
            $quantity = $request->input('quantity');
            $category = $request->input('category');

            $this->product->name = $name;
            $this->product->price = $price;
            $this->product->quantity = $quantity;
            $this->product->category_id = $category;
            $this->product->original_name = $ori_name;
            $this->product->image_ext = $file_ext;
            $this->product->image = $image_name;
            $this->product->save();
            session()->flash('notify-success', 'Product created Sucessfully.');
            return redirect('/product');
        } else {
            session()->flash('notify-error', 'Invalid file selected');
            return redirect('/product');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = $this->category::all();
        return view('products.product_edit', compact("product", "categories"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->category::all();
        return view('products.product_edit', compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $product->update($this->validateRequestUser());
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }

    public function login(Request $req)
    {
        $req->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $email = $req->input("email");
        $password = md5($req->input("password"));
        $where = array("email" => $email, "password" => $password);
        $count = $this->user::where($where)->count();
        if ($count == 1) {
            session()->put('loggedin',1);
            session()->put('loggerId',$email);
            session()->flash('notify-success','Logged in sucessfully');
            return redirect('/product');
        } else {
            session()->flash('notify-error','Account does not exists');
        }
        return back()->withInput();
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function signup(Request $req)
    {
        $req->validate([
            "name" => "required|min:3|max:20",
            "email" => "required|min:8",
            "password" => "required|min:8|max:15"
        ]);

        $name = $req->input("name");
        $email = $req->input("email");
        $password = $req->input("password");
        $where = array("email" => $email);
        $count = $this->user::where($where)->count();
        if ($count == 1) {
            session()->flash('notify-error','Email already taken');
            return redirect('/signin');
        } else {
            $this->user->name = $name;
            $this->user->email = $email;
            $this->user->password = md5($password);
            $this->user->save();
            session()->flash('notify-success','Account Created Sucessfully');
        }
        return redirect('/');
    }

    private function validateRequestUser()
    {
        return request()->validate([
            "name" => "required|min:5",
            "price" => "required",
            "quantity" => "required",
            "status" => "required"
        ]);
    }

    public function pay(){
        $stripe_public_key = array("stripe_public_key" => env("STRIPE_PUBLISHABLE_KEY"));
        return view('pay.stripe', $stripe_public_key);
    }

    public function payment(Request $request){
        \Stripe\Stripe::setApiKey(env("STRIPE_SECRET_KEY"));
        try {
            \Stripe\Charge::create(array(
                "amount" =>  $request->input('amount') * 1,
                "currency" => "inr",
                "source" => $request->input('stripeToken'),
                "description" => "test"
            ));
            return redirect('/product');
        } catch( \Exception $e){
            dd($e);
        }
    }

}
