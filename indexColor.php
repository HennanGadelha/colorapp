<?php

require('models/Colors.php');


if(isset($_POST['action']) && $_POST['action'] == 'insert'){

    $color = new Colors();

    echo json_encode($color->insert($_POST));

    return;

}


if(isset($_POST['action']) && $_POST['action'] == 'update'){

    $color = new Colors();

    if($color->update($_POST)){
        echo 'updated';
    }
}


if(isset($_GET['action']) && $_GET['action']== 'deleted' && isset($_GET['id'])){

    $color = new Colors();

    if($color->deleted($_GET['id'])){

        echo 'deleted';
    }

    return;
}

if(!isset($_GET['action'])){

    $color = new Colors();

    echo json_encode($color->findAll());

}


if(isset($_GET['action']) && $_GET['action'] == 'findOne' && isset($_GET['id'])){


    $color = new Colors();

    echo json_encode($color->findOne($_GET['id']));
}


if(isset($_GET['action']) && $_GET['action'] == 'findName' && isset($_GET['name'])){

    $color = new Colors();

    echo json_encode($color->findName($_GET['name']));

}

  
