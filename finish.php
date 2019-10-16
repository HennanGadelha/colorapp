<?php

session_start();

echo '<pre>';
    var_dump(($_SESSION['data']));
echo '<pre>';

foreach($_SESSION['data'] as $color){
    
    $conn = new PDO('mysql:host=localhost;dbname=colorapp', 'root', '');
    
    $sql = 'INSERT INTO userforcolors (userColor, colorUser) ';
    $sql .= 'VALUES (:userColor, :colorUser)';
    
    $colors = $conn->prepare($sql);
    
    $colors->BindValue(':userColor', $color['idUser'], PDO::PARAM_INT);
    $colors->BindValue(':colorUser', $color['idColor'], PDO::PARAM_INT);
    $colors->execute();


}

echo '<a href="http://localhost/colorapp/">Usuarios</a>';