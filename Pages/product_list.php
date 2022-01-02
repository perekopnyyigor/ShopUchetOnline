<?php
session_start();
require_once "page.php";
require_once "Objects/deal_list.php";
require_once "Objects/shop.php";
require_once "Objects/product.php";
class ProductList extends Page
{
    public function view()
    {

         $this->list();

    }
    public function list()
    {
        $id = $_SESSION["id"];

        $shop = new Shop($id);

        $shopProducts = $shop->showProduct("");


        echo "<table>";
        echo "<tr><th>Изображение</th><th>Код</th><th>Наименование</th><th>Цена закупа</th><th>Цена продажи</th></tr>";

        foreach ($shopProducts as $productId)
        {
            $product = new Product($productId);
            echo "<tr>
            <td><img src='$product->img'></td>
            <td>$product->code</td>
            <td>$product->name</td>
            <td>$product->price1</td>
            <td>$product->price2</td>
            </tr>";
        }

        echo "<table>";

    }
    public function product()
    {
        $id = $_POST["id"];
        $product = new Product($id);

        echo json_encode($product);
    }
    public function productList()
    {
        $product=$_POST["find_product"];
        $shop_id =$_POST["shop_id"];
        $shop = new Shop($shop_id);

        $products_id = $shop->showProduct($product);
        $products=[];
        for($i=0; $i<count($products_id);$i++)
            $products[$i]= new Product($products_id[$i]);

        echo json_encode($products);

    }
    public function addList()
    {
       DealList::add($_POST["list"]);

    }
    public function findDeals()
    {
        $deals_id = DealList::find($_POST["shop_id"]);
        $deals = [];

        foreach ($deals_id as $id)
            $deals[]=new DealList($id);

        echo json_encode($deals);

    }
    public function findDealPunkt()
    {

        $list=[];
        $deals_punkt_id=DealPunkt::find($_POST["deal_id"]);
        for ($i=0;$i<count($deals_punkt_id);$i++)
        {
            $id=$deals_punkt_id[$i];
            $list[$i]["punkt"]=new DealPunkt($id);
            $list[$i]["product"]=new Product( $list[$i]["punkt"]->product);
        }

        echo json_encode($list);

    }


        


}