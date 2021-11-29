<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\cart;
use App\Models\order;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            if(Auth::check()){
                $userId=Auth::user()['id'];
                $product=DB::table('products')->where('user_id',$userId)->get();
                return view ('products.products')->with('product', $product);
            }
        return redirect("/")->withSuccess('Access is not permitted');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
        return view('products.create-product');
    }
    return redirect("/")->withSuccess('Access is not permitted');
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
            'title'=>'required',
            'price'=> 'required',
            'description' => 'required',
            'src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('src')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['src'] = "$profileImage";
        }
        $user=Auth::user()['id'];
        $product=new product;
        $product->title=$request->title;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->src= $input['src'];
        $product->user_id=$user;
        $product->save();
        
        return redirect('admin/product')->with('flash_message', 'Contact Addedd!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=Crypt::decrypt($id);
        $productdetails = product::find($id);
        return view('products.productdetails')->with('productdetails', $productdetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        return view('products.productedit')->with('productedit', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=product::find($id);
        $input = $request->all();
        if ($image = $request->file('src')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['src'] = "$profileImage";
        }else{
            unset($input['src']);
        }
        $product->update($input);
        return redirect('admin/product')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::destroy($id);
        return redirect('admin/product')->with('flash_message', 'Contact deleted!');
    }

    /////// customer product display
    public function customerproduct(){
        $data=product::all();
        return view('products.customerproduct',['product'=>$data]);
    }
    public function productDetails($id){
        $productDetails= product::find($id);
        return view('products.customerProductDetails',['productDetails'=>$productDetails]);
    }
    function addToCart(Request $req){

        if($req->session()->has('user')){
            $cart=new cart();
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('products');
           
        }
    else{
        session()->forget('user');
        return redirect('/');
        }
    }
    static function cartItem()
    {
     $userId=session()->get('user')['id'];
     return cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId=session()->get('user')['id'];
        $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('products.cartlist',['products'=>$products]);
    }
    public function RemoveCartItem($id){
        cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow(){
        $userId=session()->get('user')['id'];
        $total= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');

        return view('orders.ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req)
    {
        $userId=session()->get('user')['id'];
         $allCart= cart::where('user_id',$userId)->get();
         $req->validate([
             'address'=>'required',
             'payment'=> 'required'
         ]);
         foreach($allCart as $cart)
         {
             $order= new order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             cart::where('user_id',$userId)->delete(); 
         }
         $req->input();
         return redirect('products');
    }
    function myOrders()
    {
        $userId=session()->get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();
 
         return view('orders.myorders',['orders'=>$orders]);
    }
}