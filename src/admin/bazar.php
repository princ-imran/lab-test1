<?php
namespace App\admin;
if(!isset($_SESSION)){
    session_start();
}
use App\Connection;
use PDO;
use PDOException;
class Bazar extends Connection{
    private $id;
    private $name;
    private $price;
    private $gender;
    private $detail;
    /*private $image;*/
     public function set($data = array()){
        if(array_key_exists('name',$data)){
            $this->name = $data['name'];
        }
        if(array_key_exists('price',$data)){
            $this->price = $data['price'];
        }
         if(array_key_exists('gender',$data)){
            $this->gender = $data['gender'];
        }
        if(array_key_exists('detail',$data)){
            $this->detail = $data['detail'];
        }       
        if(array_key_exists('id',$data)){
            $this->id = $data['id'];
        }
        return $this;
    }
 /*   public function image(){
        $this-image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name, 'img/'.$img_name);
    }
*/
    
    public function store(){
        try {
            $stmt = $this->con->prepare("INSERT INTO `product`(`name`,`price`,`gender`,`detail`) VALUES(:n,:p,:g,:d)");
            $result = $stmt->execute(array(
                ':n' => $this->name,
                ':p' => $this->price,
                ':g' => $this->gender,
                ':d' => $this->detail,
                /*':i' => $this->image*/
            ));
            if($result){
                $_SESSION['store'] = 'DATA successfully Inserted!!';
                header('location: index.php');
            }           
        }
        catch (PDOException $e){
                print "Error!: " . $e->getMessage() . "<br>";
                die();
            }
    }
    public function index(){
        try {
            $query = ("SELECT * FROM `product`");
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch (PDOException $e){
            print "Error!: " . $e->getMassage() . "<br>";
            die();
        }
    }
    public function view($id){
        try {
            $query = ("SELECT * FROM `product` WHERE id = :id");
            $stmt = $this->con->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        
    }
    public function delete($id){
        try {
            $query = ("DELETE FROM `product` WHERE id = :id");
            $stmt = $this->con->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        
        if($stmt){
            $_SESSION['delete'] = "DATA has been DELECTED";
            header('location: index.php');
        }
    }
        catch (PDOExcepteion $e){
            print "Error!: " .$e->getMessage() . "<br>";
        }
    }
    public function update(){
        try {
            $query = ("UPDATE `product` SET `name` = :name, `price` = :price, `gender` = :gender, `detail` = :detail WHERE `product`.`id` = :id;");
            $stmt = $this->con->prepare($query);
            $stmt->bindValue(':name', $this->name, PDO::PARAM_INT);         
            $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);         
            $stmt->bindValue(':gender', $this->gender, PDO::PARAM_INT);         
            $stmt->bindValue(':detail', $this->detail, PDO::PARAM_INT);         
            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);         
            $stmt->execute();
            if($stmt){
                $_SESSION['update'] = "Data update Successfully";
                header('location: index.php'); 
            }
        }
        catch (PDOException $e){
            print "ERROR!: " . $e->getMessage() . "<br>";
        }
        
    }
    
}