<?php
require('models/UsersColors.php');
session_start();

if(!isset($_GET['action'])) {
    
    $colors = new UsersColors();
    $colors->findAllUsers();
    
  }
  
if(isset($_GET['action']) && $_GET['action'] == 'insertColor'){

  $color = new UsersColors();
  $color->insertColor();
}

if(isset($_GET['action']) && $_GET['action'] == 'pickUser'){

  $color = new UsersColors();
  $color->findAll();
  $_SESSION['idUser'] = $_GET['id'];

}

if(isset($_GET['action']) && $_GET['action'] == 'insertColor' ) {
    
  $colors = new UsersColors();
  $colors->showColors();
  var_dump($_SESSION['idUser']);
  
}

if(isset($_GET['action']) && $_GET['action'] == 'removeColor'){

  $color = new UsersColors();
  $color->removeColor();

}

if(isset($_GET['action']) && $_GET['action'] == 'sendColors'){

  $color = new UsersColors();

  echo json_encode($color->sendColors());

  return;

}