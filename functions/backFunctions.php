<?php

include_once __DIR__. "/../settings.php";

function getController($path)
{
    return "/../controllers/$path";
}

function getPage($path)
{
    return "/public/admin/pages/$path";
}