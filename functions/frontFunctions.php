<?php

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
    return "/public/assets/$path";
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


/**
 * getImage
 *
 * @param  mixed $path
 * @return void
 */
function getImage(string $path)
{
    return "/public/images/$path";
}


function getImageRoot($path)
{
    return ROOT . "/public/images/$path";
}