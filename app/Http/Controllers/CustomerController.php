<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function login(Request $req){
        $user=customer::where(['email'=>$req->email])->first();
        
        if(!$user || !Hash::check($req->password,$user->password)){
            return " Email Password Not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('products');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customerlayout.customerRegistration');
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
            'name'=> 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $request->all();
        customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
        return redirect("/")->withSuccess('Successfully logged-in!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session()->has('user')){
            $user=customer::find($id);
            return view('customerlayout.updateprofile')->with('data', $user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = customer::find($id);
        $input = $request->all();
        $user->update([        
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);
        return redirect('customerprofile')->with('flash_message', 'Contact Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
    public function customerProfile(){
        if(session()->has('user')){
            $userId=session()->get('user')['id'];
            $data=customer::find($userId);
            return view('customerlayout.customerprofile',['data'=>$data]);
        }
    }
}
