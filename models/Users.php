<?php
require('core/Database.php');




Class Users {

    private $conn;

    public function __construct(){

        $this->conn = (new Database())->connect();

    }

    public function insert($data){

        $sql = 'INSERT INTO users';
        $sql .= '(name, email, age, phone)';
        $sql .= 'VALUES (:name, :email, :age, :phone)';

        $user = $this->conn->prepare($sql);

        $user->BindValue(':name', $data['name'],PDO::PARAM_STR);
        $user->BindValue(':email', $data['email'], PDO::PARAM_STR);
        $user->BindValue(':age', $data['age'], PDO::PARAM_INT);
        $user->BindValue(':phone', $data['phone'], PDO::PARAM_INT);

        $user->execute();
        return $this->conn->lastInsertId();
    }

    public function update($data){

        $sql = 'UPDATE  users ';
        $sql .= 'SET name=:name, email=:email, age=:age, phone=:phone';
        $sql .= ' WHERE id=:id';

        $user = $this->conn->prepare($sql);

        $user->BindValue(':id', $data['id'], PDO::PARAM_INT);
        $user->BindValue(':name', $data['name'], PDO::PARAM_STR);
        $user->BindValue(':email', $data['email'], PDO::PARAM_STR);
        $user->BindValue(':age', $data['age'], PDO::PARAM_INT);
        $user->BindValue(':phone', $data['phone'], PDO::PARAM_INT);

        return  $user->execute();

    }


    public function deleted($id){

        $sql = 'DELETE FROM users WHERE id=:id';

        $user = $this->conn->prepare($sql);

        $user->BindValue(':id', $id, PDO::PARAM_INT);

        return  $user->execute();

    }

    public function findAll() {
        $sql= 'SELECT * FROM users';
        $user= $this->conn->prepare($sql);
        $user->execute();
        $select = $user->fetchAll();
      

        foreach($select as $u){

            echo 'Id: '.$u['id'].'<br/>'.'Usuario: ' .$u['name']. '<br/>'. 'Email: ' .$u['email']. '<br/>' 
                . 'age: ' .$u['age']. '<br/>'. 'phone: ' .$u['phone'].'<br/>'. 
                '<a href= "http://localhost/colorapp/indexuc.php"> Ir a escolha de cores </a>'. '<br/>' . '<hr/>';
                
            
        }
        
    }

    public function findOne($id) {
        $sql= 'SELECT * FROM users WHERE id=:id';
        $user= $this->conn->prepare($sql);

        $user->BindValue(':id', $id, PDO::PARAM_INT);
        $user->execute();
         
        return $user->fetch(PDO::FETCH_OBJ);
        
    }

    public function findName($name){

        $sql= "SELECT * FROM users WHERE name  LIKE :name ";
        $user= $this->conn->prepare($sql);

        $user->BindValue(':name', '%'.$name.'%', PDO::PARAM_STR);
        $user->execute();
        return $user->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function findEmail($email){

        $sql= "SELECT * FROM users WHERE email LIKE :email";
        $user= $this->conn->prepare($sql);

        $user->BindValue(':email', '%'.$email.'%', PDO::PARAM_STR);
        $user->execute();
        return $user->fetchAll(PDO::FETCH_OBJ);
    }


    public function findAge($age) {
        $sql= 'SELECT * FROM users WHERE age=:age';
        $user= $this->conn->prepare($sql);

        $user->BindValue(':age', $age, PDO::PARAM_INT);
        $user->execute();
        return $user->fetch(PDO::FETCH_OBJ);
    }

    public function findPhone($phone) {
        $sql= 'SELECT * FROM users WHERE phone=:phone';
        $user= $this->conn->prepare($sql);

        $user->BindValue(':phone', $phone, PDO::PARAM_INT);
        $user->execute();
        return $user->fetch(PDO::FETCH_OBJ);
    }


    

}