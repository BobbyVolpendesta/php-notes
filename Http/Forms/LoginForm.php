<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function Validate($email, $password)
    {
        if (!Validator::email($email)) {
            $errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($password, 7, 255)) {
            $errors['password'] = 'Please provide a password of at least seven characters';
        }

        return empty($errors);

    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}