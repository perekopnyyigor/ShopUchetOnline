<?php
require_once "Pages/main.php";

$main = new Main();
switch ($_GET["action"])
{
    case "":
        $main->view();
        break;
    case "enter":
        echo "qwer";
        break;
    case "reg":
        echo "reg";
        break;
}

