<?php



function getController($path)
{
    return "/../controllers/$path";
}

function getPage($path)
{
    return "/public/admin/pages/$path";
}

function getUrl()
{
    return $_SERVER['REQUEST_URI'];
}
