<?php
require_once "Pages/main.php";
require_once "Pages/reg.php";

$main = new Main();
$reg = new Reg();
switch ($_GET["action"])
{
    case "":
        $main->view();
        break;
    case "enter":
        echo "qwer";
        break;
    case "reg":
        $reg->view();
        break;
}

