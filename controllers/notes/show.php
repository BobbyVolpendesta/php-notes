<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 3;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id']
    
    ]);

    header('location: /notes');
    exit();
} else {

    $heading = 'Note';
    
    $id = $_GET['id'];
    
    $note = $db->query('select * from notes where id = :id', [
        'id' =>  $_GET['id']
    ])->findOrFail();

    authorize((string)$note['user_id'] === (string)$currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);

}