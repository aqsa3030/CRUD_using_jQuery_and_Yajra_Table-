<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Usersinfo;
use App\Models\User;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class UserinfoController extends Controller
{

  public function log(Request $request){
    $user =  Usersinfo::where('email', $request->email, )->first();
    if(!$user ||!Hash::check($request->password,$user->password)){
      return response([
        'error'=>'email and password is not matched'
      ]);

    }
    else{
      return response([
        'msg' =>'User Login Successfully'
      ]);
    }
   
  }
     public function index(){
        return view('reglog');
     }
     public function loginpage()
     {
        return view('login');
     }
     public function store(Request $request){

       }
    public function edit($id)
    {
      
      
    }
    public function destroy($id)
    {
     
    }

     public function display(Request $request){
      
  }

 


     public function customLogin(Request $request)
{
  $request->validate([
    'email' => 'required|email|unique:users',
    'password' => 'required|min:6',
]);


  if(Auth::attempt($request->only('email','password')));
  return redirect('/dashboard');
  // $user = Usersinfo::where('email',$request->input('email'))->get();
  // //return Crypt:: decrypt($user[0]->password);
  // if(Crypt::decrypt($user[0]->password==$request->input('password')))
  // {
  //  // $request->session()->put('user', $user[0]->name);
  //   return view('dashboard');
  // }
  


    // $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required',
    // ]);

    // $credentials = $request->only('email', 'password');
    // if (Auth::attempt($credentials)) {
    //     $request->session()->regenerate();
    //     return redirect()->intended('dashboard')->withSuccess('You have successfully logged in!');
    // }

    // return redirect()->back()->withErrors([
    //     'email' => 'Your provided credentials do not match our records.',
    // ])->withInput($request->only('email'));
}

     public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'p_no' => 'required',
            'country' => 'required',
            'password' => 'required|min:6',
        ]);
           

        $user = new Usersinfo;
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->p_no = $request->input("p_no");
        $user->country = $request->input("country");
        $user->password = Hash::make($request->input("password"));
        $user->save();
        $email = $request['email'];
        $messagedata = ['name'=>$request['name'], 'p_no'=>$request['p_no'],'email'=>$request['email']];
        Mail::send('email',$messagedata, function($message)use($email){
          $message->to($email)->subject('Successfully Registered');
        });
        return redirect("dashboard")->withSuccess('You have successfully registered');
     }



     public function dashboard(){
        return view('dashboard');
     }

     public function viewusers(){
      $user = Usersinfo::all();
      return view('viewusers')->with('user', $user);
   }

     function loginApi(Request $request)
  {
    $validator = Validator::make($request->all(), [

      'email' => 'required|email',
      'password' => 'required',
    ]);

    if ($validator->fails()) {
      // The given data did not pass validation
      return response()->json([
        'message' => 'Validations fails',
        'error' => $validator->errors()
      ], 422);
    }
    $user = Usersinfo::where('email', $request->email)->first();
    if ($user) {
      if (Hash::check($request->password, $user->password)) {
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
          'message' => 'Login successfully',
          'token' => $token,
          'data' => $user
        ], 200);
      } else {
        return response()->json([
          'message' => 'incorrect credentials',
        ], 400);
      }
}
  }


}
  