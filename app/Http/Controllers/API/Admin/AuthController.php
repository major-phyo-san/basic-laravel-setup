<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;

use App\Actions\Auth\APILoginAction;

use App\Http\Controllers\Controller;

class AuthController extends Controller{

    /**
     * log the authenticated user in to the system
     *
     * @param Request $request user request data
     *
     * @return Response json data
     */
    public function login(Request $request)
    {
        $token_name = 'admintoken';
        $input = $request->collect()->except('password', 'token_name');
        $credential_name = (string) $input->keys()[0];

        if (isset($request->token_name)) {
            $token_name = $request->token_name;
        }

        $loginAction = new APILoginAction($credential_name, $request[$credential_name], $request['password'], 'App\Models\Admin');

        $login_response = $loginAction->run($token_name);
        $token = ["token" => $login_response["token"]];
        $code = $login_response["code"];
        $success = $login_response["success"];
        $message = $login_response["message"];

        ResponseData($token, $code, $success, $message);
    }

    /**
     * delete existing sanctum tokens and log the authenticated user out of the system
     *
     * @param Request $request   user request data
     *
     * @return Response   json message
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        ResponseMessage('Admin logged out');
    }
}
