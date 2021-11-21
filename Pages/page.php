<?php


abstract class Page
{
    public function head($name="Онлайн учет")
    {
        echo "<html>";
        echo "<head>";
        echo "<title>$name</title>";
        echo "<link rel=\"stylesheet\" href=\"Styles/style.css\">";
        echo "</head>";
    }
    public function header()
    {
        echo "<body>";
        echo "<div class='name'>Он-лайн учет</div>";
        echo "<div class='main_menu'>";
        echo "<a href='index.php'>Главная</a>";
        echo "<a href='index.php?action=enter'>Вход</a>";
        echo "<a href='index.php?action=reg'>Регистрация</a>";
        echo "</div>";
    }
}