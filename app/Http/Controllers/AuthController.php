<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    use HttpResponses;

    public function login(LoginUserRequest $request){
        $request->validated($request->all());  //Validate all the fields using the LoginUserRequest
        if(!Auth::attempt($request->only('email','password'))){
            return $this->error('',401,'Credentials do not match');
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken
        ]);
    }
    public function register(StoreUserRequest $request){

        $request->validated($request->all());//Validate all the fields using the StoreUserRequest
        $user  = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken
        ]);
    }
    public function logout(){
        Auth::user()->currentAccessToken()->delete(); //End the user session
        return $this->success([
            'message' => 'You have successfully logged out!'
        ]);
    }

    //Token validation function
    public function validateToken(){
        $user = Auth::user();
        if ($user) {
            return $this->success([
                'user' => $user
            ]);
        }

        return $this->error('',401,'Token is not valid');
    }
}
