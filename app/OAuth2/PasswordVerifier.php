<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 12/07/2016
 * Time: 21:36
 */

namespace CodeDelivery\OAuth2;

use Illuminate\Support\Facades\Auth;

class PasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}