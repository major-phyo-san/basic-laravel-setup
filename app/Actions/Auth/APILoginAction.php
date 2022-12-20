<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Hash;

/**
* Sanctum token generator
*
*/
class APILoginAction {
    /**
     * constructor
     *
     * @param String $credential_name   name of the authentication column in database table (e.g username,email,phone etc.)
     * @param String $identity   identity to be checked for validity of the user
     * @param String $password   password to be checked for authenticity of the user
     * @param String $credential_type   model of the authneticatable user
     *
     * @return APILoginAction   instance of APILoginAction
     */
    public function __construct(string $credential_name, string $identity, string $password, string $credential_type)
    {
        $this->credential_name = $credential_name;
        $this->identity = $identity;
        $this->password = $password;
        $this->credential_type = $credential_type;
    }

    /**
     * check the user, returns authentication token data array
     *
     * @param String $token_name   token_name
     *
     * @return Array   authentication token data
     */
    public function run($token_name): array
    {
        $user = $this->credential_type::where($this->credential_name, $this->identity)->get()->first();
        $login_response = [
            "token" => null,
            "code" => 401,
            "success" => false,
            "message" => null
        ];

        if(!isset($user))
        {
            $login_response["message"] = "Credential error, user not found";

            return $login_response;
        }

        if(!Hash::check($this->password, $user->getAuthPassword()))
        {
            $login_response["message"] = "Credential error, password not match";

            return $login_response;
        }

        $login_response["user"] = $user;
        $login_response["token"] = $user->createToken($token_name)->plainTextToken;
        $login_response["code"] = 200;
        $login_response["success"] = true;
        $login_response["message"] = 'Authenticated';

        return $login_response;
    }
}
