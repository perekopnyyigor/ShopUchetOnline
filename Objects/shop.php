<?php
require_once "database.php";
class Shop
{
    public $name;
    public $bin;
    public $cashbox;
    public $id;


    static function add($name, $bin, $pass1, $pass2)
    {


        $database = new Database();

        $database->connect();


        if ($pass1 != $pass2)
            $result = "Пароли не совпадают";
        else if($name==null || $bin==null || $pass1==null || $pass2==null)
            $result = "Не все поля заполнены";
        else if ($database->select("id","shop","WHERE bin =".$bin)!=null)
        {
            $result = "Магазин с таким номером уже зарегистрирован";
        }
        else
        {
            $password = md5($pass1);
            $sql = "INSERT INTO shop (name, bin, password, cashbox) VALUES ('".$name."', '".$bin."', '".$password."',0)";
            $result = $database->conn->query($sql);
            // Check
            if ($database->conn->error)
            {
                die("failed: " . $database->conn->error);
            }
            $result = "Магазин зарегистрирован";
        }
        return $result;

    }
    static function bin_to_id($bin)
    {

        $database = new Database();

        $database->connect();

        $id = $database->select_one("id","shop","WHERE bin =".$bin);
        return $id;

    }
    static function find_password($bin)
    {
        $database = new Database();

        $database->connect();

        $password = $database->select_one("password","shop","WHERE bin =".$bin);
        return $password;
    }
    public function __construct($id)
    {
        $database = new Database();
        $database->connect();

        $this->name = $database->select_one("name","shop","WHERE id =".$id);
        $this->bin = $database->select_one("bin","shop","WHERE id =".$id);
        $this->cashbox = $database->select_one("cashbox","shop","WHERE id =".$id);
        $this->id = $id;
    }
    public function showProduct($prod)
    {
        $database = new Database();
        $database->connect();

        $products= $database->select("id","product","WHERE shop =".$this->id." AND name LIKE '".$prod."%' ORDER BY name");
        return $products;
    }
}
