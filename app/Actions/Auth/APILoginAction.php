<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Hash;

class APILoginAction {
    public function __construct($credential_name, $identity, $password, $credential_type)
    {
        $this->credential_name = $credential_name;
        $this->identity = $identity;
        $this->password = $password;
        $this->credential_type = $credential_type;
    }

    public function run($token_name)
    {
        $user = $this->credential_type::where($this->credential_name, $this->identity)->get()->first();

        if(!isset($user)){
            ResponseMessage('Credential error, user not found', 401, false);
        }

        if(!Hash::check($this->password, $user->getAuthPassword())){
            ResponseMessage('Credential error, password not match', 401, false);
        }

        $token = ['token' => $user->createToken($token_name)->plainTextToken];

        ResponseData($token, 200, true, 'Authenticated');
    }
}
