<?php

class Database {

    public function connect() {
        
        return new PDO('mysql:host=localhost;dbname=colorapp', 'root', '');
        
    }

    
}