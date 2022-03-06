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

function dd($data)
{
    var_dump($data);
    die;
}


function uploadImage($field, $dir, $name)
{
    $type = $_FILES[$field]['type'];
    $ext = explode('/', $type)[1];
    $image_name = $_FILES[$field]['tmp_name'];
    $rand = rand(10000, 1000000);
    $result = move_uploaded_file($image_name, ROOT . "/public/images/$dir/{$name}{$rand}.$ext");

    /**
     * دي بترجع نتيجه عشان نعرف نتيجة الي حصل في الداله
     * في حالة نجاح رفع الصورة بنرجع اسم الصورة
     * في حالة الفشل بنرجع خطا
     */
    if($result == true)
    {
        return "{$name}{$rand}.$ext";
    }
    else
    {
        return false;
    }
}


function deleteImage($dir,$old_image)
{
    $old_image = getImageRoot("$dir/$old_image");
    if(file_exists($old_image))
    {
        unlink($old_image);
    }
}
