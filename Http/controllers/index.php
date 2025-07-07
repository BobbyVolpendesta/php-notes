<?php

$_SESSION['name'] = 'Jeffrey';

$heading = 'Welcome';

view("index.view.php", [
    'heading' => 'Home'
]);