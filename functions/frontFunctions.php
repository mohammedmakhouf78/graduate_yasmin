<?php

include __DIR__. "/../settings.php";

/**
 * asset
 *
 * @param  string $path
 * @return string
 * بتجيب المسار الخاص بملفات الفرونت
 * من خلال السرفر
 */
function asset(string $path)
{
    return "/assets/$path";
}

/**
 * layout
 *
 * @param  mixed $path
 * @return void
 */
function layout($path)
{
    return ROOT . "/public/admin/layouts/$path";
}