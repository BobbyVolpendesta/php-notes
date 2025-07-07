<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 3;

$heading = 'Note';

$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize((int) $note['user_id'] === (int) $currentUserId);

view("notes/edit.view.php", [
    'heading' => 'Edit note',
    'errors' => [],
    'note' => $note
]);