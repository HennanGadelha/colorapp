<?php

require('core/Database.php');

Class Colors {

    private $conn;
    


    public function __construct(){

        $this->conn = (new Database())->connect();

    }


    public function insert($data) {

        $sql = "INSERT INTO color (name) VALUES (:name)";

        $color = $this->conn->prepare($sql);

        $color->BindValue(':name',$data['name'], PDO::PARAM_STR);

        $color->execute();

        return $this->conn->lastInsertId();

    }


    public function update($data) {


        $sql = 'UPDATE  color SET name=:name ';
        $sql .= 'WHERE id=:id';

        $color = $this->conn->prepare($sql);

        $color->BindValue(':id', $data['id'], PDO::PARAM_INT);
        $color->BindValue(':name', $data['name'], PDO::PARAM_STR);

        return $color->execute();

    }


    public function deleted($id){

        $sql = 'DELETE  FROM color WHERE id=:id';

        $color = $this->conn->prepare($sql);

        $color->BindValue(':id', $id, PDO::PARAM_INT);

        return $color->execute();

    }


    public function findAll(){

        $sql = 'SELECT * FROM color';

        $color = $this->conn->prepare($sql);

        $color->execute();

        return $color->fetchAll(PDO::FETCH_OBJ);
    }

    public function findOne($id) {

        $sql = 'SELECT * FROM color WHERE id=:id';

        $color = $this->conn->prepare($sql);

        $color->BindValue(':id',$id, PDO::PARAM_INT);

        $color->execute();

        return $color->fetch(PDO::FETCH_OBJ);


    } 

    public function findName($name){

        $sql = 'SELECT * FROM color WHERE name LIKE :name';

        $color = $this->conn->prepare($sql);

        $color->BindValue(':name', '%'.$name.'%',PDO::PARAM_STR);

        $color->execute();

        return $color->fetchAll(PDO::FETCH_OBJ);
    }


}