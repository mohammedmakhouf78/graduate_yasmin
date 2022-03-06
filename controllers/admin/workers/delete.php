<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $old_image = selectWhere($conn, 'workers', 'image',"id = $id")[0]['image'];


    $result = delete($conn, "workers", $id);

    if ($result) {
        deleteImage('workers',$old_image);
        addSuccessToSession('db', "Worker Deleted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("workers/index.php"));
} else {
    redirect(getPage("workers/index.php"));
}
