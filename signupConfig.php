<?php

require_once("database.php");

class signupConfig{

    private $id;
    private $firstName;
    private $lastName;
    private $address;
    protected $conn;

    public function __construct($id = 0, $firstName="", $lastName="", $address=""){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->conn = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function getAddress(){
        return $this->address;
    }

    public function insertData(){
        try{
            $stm = $this->conn->prepare("INSERT INTO users (firstName, lastName, address) values (?,?,?)");
            $stm->execute([$this->firstName, $this->lastName, $this->address]);
            echo "<script>alert('Data inserted successfully');document.location='allData.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchAll(){
        try{
            $stm = $this->conn->prepare("SELECT * FROM users");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchOne(){
        try{
        $stm = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stm->execute([":id" => $this->id]);
        return $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateData(){
        try{
            $stm = $this->conn->prepare("UPDATE users SET firstName = :firstName, lastName = :lastName, address = :address WHERE id = :id");
            $stm->execute([":firstName" => $this->firstName, ":lastName" => $this->lastName, ":address" => $this->address, ":id" => $this->id]);
            echo "<script>alert('Data updated successfully');document.location='allData.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteData(){
        try{
            $stm = $this->conn->prepare("DELETE FROM users WHERE id = :id");
            $stm->execute([":id" => $this->id]);
            return $stm->fetchAll();
            echo "<script>alert('Data deleted successfully');document.location='allData.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

}

?>