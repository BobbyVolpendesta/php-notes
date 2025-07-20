<?php

// log in the user if the credentials match

use Core\Authenticator;
use Core\ValidationException;
use Core\Session;
use Http\Forms\LoginForm;

try {
    $form = LoginForm::validate(
        $attributes =
        [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]
    );
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect('/login');
}

// throw new ValidationException();


if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}
$form->error('email', 'No matching account found for that email address and password.');




return redirect('login');
