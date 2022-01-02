<?php
session_start();
require_once "Objects/shop.php";
class Enter extends Page
{
    public function view()
    {
        $this->head();
        $this->header();
        $this->enter_form();

    }
    private function enter_form()
    {
        print <<<_HTML_
        <form class="reg_form" method="post" action="index.php?action=enter_action">
       
        <input type="text" name="bin" placeholder="БИН">
        <input type="text" name="password" placeholder="Пароль">
        
        <input type="submit" value="Войти">
        </form >
    _HTML_;
    }
    public function enter_action()
    {

         if( Shop::find_password($_POST["bin"])==md5($_POST["password"]))
         {
             $_SESSION["id"]=Shop::bin_to_id($_POST["bin"]);
             header("Location:index.php?action=cab");

         }
         else
         {
             echo "Неправильный логин или пароль";
         }


    }
    public function json()
    {
        if( Shop::find_password($_POST["bin"])==md5($_POST["password"]))
        {
            $id=Shop::bin_to_id($_POST["bin"]);
            $shop = new Shop($id);
            echo json_encode($shop);

        }
        else
        {
            echo "Неправильный логин или пароль";
        }
    }



}