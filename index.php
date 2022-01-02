<?php
require_once "Pages/main.php";
require_once "Pages/reg.php";
require_once "Pages/enter.php";
require_once "Pages/cabinet.php";
require_once "Pages/product.php";
require_once "Pages/product_list.php";

$main = new Main();
$reg = new Reg();
$enter = new Enter();
$cabinet = new Cabinet();
$product = new ProductPage();
$productList = new ProductList();

switch ($_GET["action"])
{
    case "":
        $main->view();
        break;
    case "enter":
        echo "ok";
        $enter->view();
        break;
    case "enter_action":

        $enter->enter_action();
        break;
    case "reg":
        $reg->view();
        break;
    case "reg_action":
        $reg->reg_action();
        break;
    case "cab":
        $cabinet->view();
        break;
    case "product":
        $cabinet->view();
        $product->view();
        break;
    case "add_product":
        $product->addProduct();
        break;
    case "product_list":
        $cabinet->view();
        $productList->view();
        break;
        //------------------
    case "enter_mob":
        $enter->json();
        break;
    case "add_product_mob":
        $product->addProductMob();
        break;
    case "product_mob":
        $productList->product();
        break;
    case "find_product":
        $productList->productList();
        break;
    case "add_list":
        $productList->addList();
        break;
    case "find_deal":
        $productList->findDeals();
        break;
    case "find_deal_punkt":
        $productList->findDealPunkt();
        break;
    case "update_product":
        $product->update();
        break;

}

