<?php

require('core/Database.php');

Class UsersColors {

    private $conn;
   
    public function __construct(){

        $this->conn = (new Database())->connect();
    }

    public function findAll(){

        $sql = 'SELECT * FROM color';

        $color = $this->conn->prepare($sql);

        $color->execute();

        $select = $color->fetchAll();

        foreach($select as $c){

            echo 'Cor: ' .$c['name']. 
             '<a href="http://localhost/colorapp/index.php?action=insertColor&id=' .$c['id']. '"> ADD COLOR</a> <br/>';

        }
        $_SESSION['idUser']= (int)$_GET['id'];
        ;
        
        
    }

   
    public function findAllUsers(){

        $sql= 'SELECT * FROM users';
        $user= $this->conn->prepare($sql);
        $user->execute();
        $select = $user->fetchAll();
      

        foreach($select as $u){

            echo 'Id: '.$u['id'].'<br/>'.'Usuario: ' .$u['name']. '<br/>'. 'Email: ' .$u['email']. '<br/>' 
                . 'age: ' .$u['age']. '<br/>'. 'phone: ' .$u['phone'].'<br/>'. 
                '<a href= "http://localhost/colorapp/index.php?action=pickUser&id=' .$u['id'].'"> Ir a escolha de cores </a>'. '<br/>' . '<hr/>';
                    
        }
                
    }
    
    public function showColors(){

        $_SESSION['data'] = array();
        
        foreach($_SESSION['colors'] as $idColor){

            $sql = 'SELECT * FROM color WHERE id=:id';

            $color = $this->conn->prepare($sql);

            $color->BindValue(':id',$idColor, PDO::PARAM_INT);

            $color->execute();

            $colors = $color->fetchAll();

            $id= $_SESSION['idUser'];
            
            echo $colors[0]['name']. '<a href="http://localhost/colorapp/index.php?action=removeColor&id=' .$idColor. '"> Remove Color</a> <br/>' ;

            array_push($_SESSION['data'], 
                array('idColor' => $idColor,
                'idUser' => $id
            ));
        }

        echo '<a href="http://localhost/colorapp/finish.php">Finalizar<a/>';

        echo '<pre>';
            var_dump( $_SESSION['data']); 
        echo '<pre>';

        var_dump($_SESSION['idUser']);
    }

    public function insertColor(){
        
        $idColor = $_GET['id'];

        if(!isset($_SESSION['colors'][$idColor])){
            $_SESSION['colors'][$idColor] = $idColor;
        }else{
            $_SESSION['colors'][$idColor]  += $idColor;
        }

    }

    public function removeColor(){

        $idColor = $_GET['id'];
        unset($_SESSION['colors'][$idColor]);
        echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/colorapp/index.php?action=pickUser&id=' . $_SESSION['idUser'].'"/>';
    }

}