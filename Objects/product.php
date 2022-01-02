<?php
require_once "database.php";
class Product
{
    public $id;
    public $name;
    public $price1;
    public $price2;
    public $quantity;
    public $img;
    public $shop;
    public $code;
    public static function add($name, $code, $price1, $price2, $shop,$img)
    {
        $database = new Database();

        $database->connect();

        $sql = "INSERT INTO product (name, code, quantity, price1, price2, shop, img) 
        VALUES ('".$name."', '".$code."',0 ,$price1,$price2,$shop,'".$img."')";
        $database->conn->query($sql);

        // Check
        if ($database->conn->error)
        {
            die("failed: " . $database->conn->error);
        }

    }

    public function __construct($id)
    {
        $database = new Database();
        $database->connect();

        $this->id = $id;

        $this->name = $database->select_one("name","product","WHERE id =".$id);
        $this->price1 = $database->select_one("price1","product","WHERE id =".$id);
        $this->price2 = $database->select_one("price2","product","WHERE id =".$id);
        $this->code = $database->select_one("code","product","WHERE id =".$id);
        $this->quantity = $database->select_one("quantity","product","WHERE id =".$id);
        $this->img = $database->select_one("img","product","WHERE id =".$id);
        $this->shop = $database->select_one("shop","product","WHERE id =".$id);
    }
    public function update($name, $price1, $price2, $code, $img)
    {

        $datadase = new Database();

        $datadase->connect();

        $sql = "UPDATE product SET name = '$name', 
        price1 = $price1 ,
        price2 = $price2,
        code = '$code',
        img ='$img'
        WHERE id = $this->id";

        $result = $datadase->conn->query($sql);
        // Check
        if ($datadase->conn->error)
        {
            echo $datadase->conn->error;
        }
    }

}