<?php
class User{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $email;
    public $phone;
    public $text;
    public $created;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function signup(){

        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    email=:email, phone=:phone, text=:text, created=:created";


        $stmt = $this->conn->prepare($query);


        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->text=htmlspecialchars(strip_tags($this->text));
        $this->created=htmlspecialchars(strip_tags($this->created));


        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":created", $this->created);


        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;

    }

    function login(){

        $query = "SELECT
                    `id`, `email`, `phone`, `text`, `phone`
                FROM
                    " . $this->table_name . "
                WHERE
                    email='".$this->email."' AND phone='".$this->phone."'";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . "
            WHERE
                email='".$this->email."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}