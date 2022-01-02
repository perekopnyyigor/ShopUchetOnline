<?php
require_once "Objects/shop.php";
class Reg extends Page
{
    public function view()
    {
        $this->head();
        $this->header();
        $this->reg_form();

    }
    private function reg_form()
    {
        print <<<_HTML_
        <form class="reg_form" method="post" action="index.php?action=reg_action">
        <input type="text" name="name" placeholder="Наименование">
        <input type="text" name="bin" placeholder="БИН">
        <input type="text" name="password1" placeholder="Пароль">
        <input type="text" name="password2" placeholder="Повторите пароль"> 
        <input type="submit" value="Регистрация">
        </form >
    _HTML_;
    }
    public function reg_action()
    {

        echo Shop::add($_POST["name"],$_POST["bin"],$_POST["password1"],$_POST["password2"]);
    }

}
