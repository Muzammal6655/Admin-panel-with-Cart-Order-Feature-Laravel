<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }  
      
    public function createSignin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('Logged-in');
        }
        return redirect("adminlogin")->withSuccess('Credentials are wrong.');
    }
    public function signup()
    {
        if(Auth::check()){
        return view('registration');
        }
        return redirect('adminlogin')->withSuccess('Access is not premitted');
    }

    public function adminSignup(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->createUser($data);
        return redirect("admin/dashboard")->withSuccess('Successfully logged-in!');
    }
    public function createUser(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    public function dashboardView()
    {
        if(Auth::check()){
            $data=Auth::user();
            $userId=Auth::user()['id'];
            $orders=DB::table('users')
            ->join('products','products.user_id','=','users.id')
            ->join('orders','orders.product_id','=','products.id')
            ->where('users.id',$userId)
            ->count('orders.id');
            return view('dashboard',['name'=>$data,'orders'=>$orders]);
        }
        return redirect("adminlogin")->withSuccess('Access is not permitted');
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
    // Admin Profile
    public function Profile(){
        if(Auth::check()){
            $data=Auth::user();
            return view('adminProfile',['data'=>$data]);
        }
    }
    public function edit($id){
        $user = Auth::user();
        return view('update')->with('data', $user);
    }
    public function update(Request $request,$id)
    {
        $user = user::find($id);
        $input = $request->all();
        $user->update([        
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);
        return redirect('admin/dashboard')->with('flash_message', 'Contact Updated!');  
    }

    public function joins(){
        $userId=Auth::user()['id'];
        $data=DB::table('users')
        ->join('products','products.user_id','=','users.id')
        ->join('orders','orders.product_id','=','products.id')
        ->join('customers','orders.user_id','=','customers.id')
        ->where('users.id',$userId)
        ->select('customers.name','customers.email','products.*','orders.*')
        ->get();
        return view('orders.adminOrdersDetails',['data'=>$data]);
    }
}