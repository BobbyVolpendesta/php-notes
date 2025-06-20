<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

//validate form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$result = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

//if yes, redirect to login 
if ($user) {

    header('location: /');
} else {
    $db->query('insert into users(email, password) values(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    //if not, save one to the database, then log hte user in, and redirect

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}