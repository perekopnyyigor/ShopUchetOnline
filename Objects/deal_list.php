<?php
require_once "database.php";
require_once "deal_punkt.php";
class DealList
{
    public $id;
    public $sum;
    public $contragent;
    public $type;
    public $shop;
    public $date;

    public function __construct($id)
    {
        $database = new Database();
        $database->connect();

        $this->id = $id;

        $this->sum = $database->select_one("sum","deal_list","WHERE id =".$id);
        $this->type = $database->select_one("type","deal_list","WHERE id =".$id);
        $this->date = $database->select_one("date","deal_list","WHERE id =".$id);
    }

    public static function find($shop)
    {
        $database = new Database();

        $database->connect();
        $list = $database->select("id","deal_list","WHERE shop =".$shop);
        return $list;
    }


    public static function add($list_json)
    {

        $database = new Database();

        $database->connect();

        $list = json_decode($list_json);

        $sql = "INSERT INTO deal_list (sum, type, shop)
        VALUES ($list->sum, '".$list->type."',$list->shop)";
        $database->conn->query($sql);


        // Check
        if ($database->conn->error)
        {
            die("failed: " . $database->conn->error);
        }
        $punkts = $list->dealPunkts;
        $deal=$database->conn->insert_id;
        for($i=0;$i<count($punkts);$i++)
        {
            DealPunkt::add($punkts[$i],$deal);
        }

    }
}
