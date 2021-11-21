<?php
require_once "database.php";
class Shop
{
    static function add($name, $bin, $pass1, $pass2)
    {
        $datadase = new Database();

        $datadase->connect();


        if ($pass1 != $pass2)
            $result = "Пароли не совпадают";
        else if ($datadase->select("id","shop","WHERE bin =".$bin)!=null)
        {
            $result = "Магазин с таким номером уже зарегистрирован";
        }
        else
        {
            $password = md5($pass1);
            $sql = "INSERT INTO shop (name, bin, password, cashbox) VALUES ('".$name."', '".$bin."', '".$password."',0)";
            $result = $datadase->conn->query($sql);
            // Check
            if ($datadase->conn->error)
            {
                die("failed: " . $datadase->conn->error);
            }
            $result = "Магазин зарегистрирован";
        }
        return $result;
    }
}
