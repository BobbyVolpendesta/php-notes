<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id']
    
    ]);
} else {

    $heading = 'Note';
    $currentUserId = 3;


    $id = $_GET['id'];

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    //echo '<pre>';
    //print_r($note);
   // echo $note['user_id'];
    //die();

    authorize($note['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);

}