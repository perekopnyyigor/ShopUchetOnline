<?php
session_start();
require_once "Objects/shop.php";
class Cabinet extends Page
{
    public function view()
    {
        $this->head();
        $this->header();
        $this->form();
        $this->menu();

    }
    private function form()
    {
        $shop = new Shop($_SESSION["id"]);
        echo $shop->name;
        echo '<br>';
        echo $shop->bin;

    }
    private function menu()
    {
        print <<<_HTML_
        <div class="cab_menu">
            <div class="cab_menu_punkt"><a href='index.php?action=product'>Добавить товар</a></div>
            <div class="cab_menu_punkt"><a href='index.php?action=product_list'>Список товаров</a></div>
            <div class="cab_menu_punkt"><a href='index.php?action=product_list'>Отчет</a></div>
        </div>
       _HTML_;
    }

}
