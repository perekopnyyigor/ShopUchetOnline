<?php
require_once "database.php";
class DealPunkt
{

    public $discount;
    public $price;
    public $quantity;
    public $product;
    public static function add($punkt,$deal_list)
    {

        $database = new Database();

        $database->connect();



        $sql = "INSERT INTO deal_punkt (quantity, discount, price, product, deal_list)
        VALUES ($punkt->quantity, $punkt->discount, $punkt->price,$punkt->product,$deal_list )";
        $database->conn->query($sql);


        // Check
        if ($database->conn->error)
        {
            die("failed: " . $database->conn->error);
        }


    }
    public static function find($deal)
    {
        $database = new Database();

        $database->connect();
        $list = $database->select("id","deal_punkt","WHERE deal_list =".$deal);
        return $list;
    }
    public function __construct($id)
    {
        $database = new Database();
        $database->connect();

        $this->id = $id;

        $this->discount = $database->select_one("discount","deal_punkt","WHERE id =".$id);
        $this->price = $database->select_one("price","deal_punkt","WHERE id =".$id);
        $this->quantity = $database->select_one("quantity","deal_punkt","WHERE id =".$id);
        $this->product = $database->select_one("product","deal_punkt","WHERE id =".$id);
    }
}
