<?php
/**
 * Created by PhpStorm.
 * User: alfre_000
 * Date: 15/08/2015
 * Time: 17:25
 */

namespace LaravelProject\OAuth;

use Auth;

class Verifier
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
