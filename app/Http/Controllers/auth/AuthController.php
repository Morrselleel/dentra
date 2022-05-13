<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class AuthController extends Controller
{
    
    public function loginAuth(Request $request){

    $user = user::where('email',$request->loginUser)->orWhere('user_name',$request->loginUser)->where('password',$request->loginPassword);
        
      

      if(( $user->value('email')  == $request->loginUser || $user->value('user_name')  == $request->loginUser) && $user->value('password')  == $request->loginPassword  )
      {
                session()->put('AuthSuccess' , $user->value('user_type'));
                session()->put('AuthName',  $user->value('user_name'));
                session()->put('id',  $user->value('id'));
                return redirect()->Back();
      }
      else
      {
                $fail = 'fail';
                session()->put('AuthSuccess' , 'fail' );
                return  response()->json(compact('fail'));

                //make a session to show a worning for wrong user name or password

      }
    }




    public function logoutAuth(){

        session()->forget('AuthSuccess');
        return redirect()->Back();

    }





    public function emailChecker(Request $request)
    {

        $auths = user::select('email')->where('email',$request->email)->get();

        foreach($auths as $auth)
        {
      
            return response()->json(compact('auth'));
            
        }
    }


    public function userNameCheck(Request $request)
    {

        $auths = user::select('user_name')->where('user_name',$request->username)->get();

        foreach($auths as $auth)
        {
      
            return response()->json(compact('auth'));
            
        }
    }




    public function createUser(Request $request)
    {


        $user = user::create([

            'first_name' => $request->firstname ,
            'last_name' => $request-> lastname,
            'email' => $request-> email,
            'user_name' => $request-> username,
            'password' => $request-> password,
            'user_type' => $request-> usertype

        ]);

        $new_user = $user->id;


        return response()->json(compact('new_user'));


    }




}
