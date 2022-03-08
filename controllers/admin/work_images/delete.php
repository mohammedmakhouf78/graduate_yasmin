<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $old_image = selectWhere($conn, 'work_images', 'image',"id = $id")[0]['image'];


    $result = delete($conn, "work_images", $id);

    if ($result) {
        deleteImage('work_images',$old_image);
        addSuccessToSession('db', "Worker Deleted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("work_images/index.php"));
} else {
    redirect(getPage("work_images/index.php"));
}
