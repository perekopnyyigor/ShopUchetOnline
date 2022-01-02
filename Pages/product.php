<?php
session_status();
require_once "page.php";
require_once "Objects/product.php";
class ProductPage extends Page
{
    public function view()
    {

        $this->form();
    }
    private function form()
    {
        print <<<_HTML_
        <form class="reg_form" method="post" action="index.php?action=add_product" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Наименование">
        <input type="text" name="code" placeholder="Код">
        <input type="text" name="price1" placeholder="Цена закупа">
        <input type="text" name="price2" placeholder="Цена продажи"> 
        <input type="file" name="file[]" />
        <input type="submit" value="Добавить">       
        </form >
    _HTML_;
    }
    public function addProduct()
    {
        $name = $_POST["name"];
        $code = $_POST["code"];
        $price1=$_POST["price1"];
        $price2=$_POST["price2"];
        $shop = $_SESSION["id"];
        $img=$this->uploadImg($shop,$name);
        Product::add($name,$code,$price1,$price2,$shop,$img);
    }
    public function addProductMob()
    {
        $name = $_POST["name"];
        $code = $_POST["code"];
        $price1=$_POST["price1"];
        $price2=$_POST["price2"];
        $shop = $_POST["shop"];
        $img=$this->uploadImg($shop,$name);

        Product::add($name,$code,$price1,$price2,$shop,$img);
        echo $name;

    }
    private function uploadImg($shop,$name_orig)
    {
        if(isset($_FILES["file"]))
        {

            $tmp_name = $_FILES["file"]["tmp_name"][0];

            $name_img = basename($_FILES["file"]["name"][0]);
            $name =str_replace(" ", "_",$name_orig);
            $name_img = $name."_".$shop."_".$name_img;
            $path=$_SERVER['DOCUMENT_ROOT']."/img/".$name_img;

            if(move_uploaded_file($tmp_name, $path))
            {
                $source = imagecreatefrompng($path);
                imagejpeg($source, $path, 100);
                echo "файл был загружен";
            }

            else {
                echo "загрузка не удалась";
            }


        }
        else
        {
            echo "загрузка не удалась1";
        }



        return "img/".$name_img;
    }
    public function update()
    {

        $product = new Product($_POST["id"]);
        $img=$this->uploadImg($product->shop,$_POST["name"]);
        $product->update($_POST["name"],$_POST["price1"],$_POST["price2"],$_POST["code"],$img);

    }
}
