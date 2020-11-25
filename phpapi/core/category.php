<?php

class Category{
    //db stuff
    private $conn;
    private $table = 'categories';

    //post properties
    public $id;
    public $name;
    public $created_at;

    //constructor with db connection
    public function construct($db){
        $this->conn = $db;
    }

    //getting posts from our database
    public function read(){
        //create query
        $query = 'SELECT*
        
        FROM
        ' .$this->table;
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;

    } 

}