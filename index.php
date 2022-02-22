<?php



if($_SERVER['REQUEST_URI'] == "/admin")
{
    include "./public/admin/index.php";
}
else
{
    include "./public/site/index.php";
}