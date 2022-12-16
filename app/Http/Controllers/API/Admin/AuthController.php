<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;

use App\Actions\Auth\APILoginAction;

use App\Http\Controllers\Controller;

class AuthController extends Controller{
    public function login(Request $request){
        $token_name = 'admintoken';
        $input = $request->collect()->except('password','token_name');
        $credential_name = $input->keys()[0];

        if(isset($request->token_name)){
            $token_name = $request->token_name;
        }

        $loginAction = new APILoginAction($credential_name, $request[$credential_name], $request['password'], 'App\Models\Admin');
        $loginAction->run($token_name);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        ResponseMessage('Admin logged out');
    }
}
