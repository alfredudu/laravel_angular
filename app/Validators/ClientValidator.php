<?php
/**
 * Created by PhpStorm.
 * User: alfre_000
 * Date: 01/08/2015
 * Time: 19:05
 */

namespace LaravelProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = array(
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required'
    );
}