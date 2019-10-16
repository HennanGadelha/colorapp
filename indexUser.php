<?php
require('models/Users.php');


if(isset($_POST['action']) && $_POST['action'] == 'insert') {
      
  $user = new Users();
  echo json_encode($user->insert($_POST));
  return;
}


if(isset($_POST['action']) && $_POST['action'] == 'update') {
  $user = new Users();
    if($user->update($_POST)){
        echo 'updated';
    }
  return;
}
  
if(isset($_GET['action']) && $_GET['action'] == 'deleted' && isset($_GET['id'])) {
    
  $user = new Users();
    
    if($user->deleted($_GET['id'])) {
      echo 'Deleted!';
    }
    
  return;
}


if(!isset($_GET['action'])) {
    
  $user = new Users();
  $user->findAll();
      
}

if(isset($_GET['action']) && $_GET['action'] == 'findOne' && isset($_GET['id'])) {
  $user = new Users();
  echo json_encode($user->findOne($_GET['id']));
    
}





if(isset($_GET['action']) && $_GET['action'] == 'findName' && isset($_GET['name']))   {
    
  $user = new Users();
  echo json_encode($user->findName($_GET['name']));
    
      
          
}

  

  
if(isset($_GET['action']) && $_GET['action'] == 'findEmail' && isset($_GET['email']))   {
   
  $user = new Users();
  echo json_encode($user->findEmail($_GET['email']));
        
}



if(isset($_GET['action']) && $_GET['action'] == 'findAge' && isset($_GET['age'])) {
    $user = new Users();
    echo json_encode($user->findAge($_GET['age']));
}

if(isset($_GET['action']) && $_GET['action'] == 'findPhone' && isset($_GET['phone'])) {
  $user = new Users();
  echo json_encode($user->findPhone($_GET['phone']));
}
  
  
  
  
  
  