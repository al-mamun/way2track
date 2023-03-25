<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderHeader;
use App\Models\User;
use Auth;
use Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    
    public function login() {
         
        return view('admin.auth.index');
    }

    public function otherUserLogin() {
         
        return view('admin.auth.user_login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginCustom(Request $request)
    {
       // $remember_me = $request->has('remember_me');

        $user = User::where('email', $request->email)->firstOrFail();
        
        if ( Hash::check($request->password, $user->password) ) {
            Auth::login($user);
            return redirect('/dashboard');
        }
        Auth::logout();
        return redirect('/user/login')->with([
            'status' => 1,
            'error' => "Your user role isn't assigned. You can't login. Please contact to PCB.",
        ]);
    }


    public function logout() {

        if( Auth::user()->hasRole('super admin')){
            Auth::logout();
            return redirect('/user/login')->with([
                'status' => 1,
                'error' => "Your user role isn't assigned. You can't login. Please contact to PCB.",
            ]);
        }
       Auth::logout();
    return redirect()->route('login');
        
    }
     public function userList(){
         $userlists = User::get();
         return view('admin.user.userlist',compact('userlists' ));
     }
     public function userListSetup(){
         return view('admin.user.create-user');
     }
     
    public function newUserStore(Request $request)
    {
    // 	$request->validate([
    // 		'name'      =>'required', 
    // 		'email'     =>'required|email|unique:users',
    // 		'mobile' => 'required|digits:11|numeric',
    //         'password' => 'min:6',

    // 	]);
    	$data = new User();
    	$data ->name = $request->get('name');
    	$data ->notes = $request->get('notes');
    	$data ->mobile = $request->get('mobile');
    	$data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->save();
        return redirect('/userlist')->with('success','Created user Succesfully');
      
    }
    public function userListEdit($id)
    {
        
        return view('admin.user.edit-user')->with([
            'editUser' => User::find($id),
            'roles' => \Spatie\Permission\Models\Role::all()
        ]);
      
    }
    public function userListUpdate(Request $request, $id)
    {
        
    // 	$request->validate([
    // 	    'name'      =>'required',
    // 	    'email' => 'required|email'
    //     ]);
    	$dataUpdate = User::find($id);
    	$dataUpdate ->name = $request->get('name');
    	$dataUpdate ->notes = $request->get('notes');
    	$dataUpdate ->mobile = $request->get('mobile');
    	$dataUpdate->email = $request->get('email');
    
        if($request->has('password')){
            $dataUpdate->password = \Hash::make($request->password);
        }
        $dataUpdate->update();
        
        if($request->has('roles')){
            $dataUpdate->syncRoles($request->roles);
        }

        return redirect('/userlist')->with('success','user updated Succesfully');
      
    }
     public function userListDelete($id){
        $userDelete = User::where('ID', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Deleted Successfully.']);
      
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            auth()->login($existingUser, true);
            return redirect()->route('dashboard');
        }
        return view('admin.auth.user_login')->with([
            'error' => 'This user email does not registered in our system'
        ]);
        
       
    }
}

