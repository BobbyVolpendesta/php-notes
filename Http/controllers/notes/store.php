<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';        
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'create note',
        'errors' => $errors
    ]);}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 3
]);

// Redirect after successful submission to reset the form
header("Location: /notes");
die();