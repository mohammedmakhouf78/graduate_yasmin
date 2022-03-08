<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $old_image = selectWhere($conn, 'work_images', 'image',"id = $id")[0]['image'];
    


    if(!empty($_FILES['image']['name']))
    {
        //image
        $is_valid = validateImage('image', "error in Image", getPage("work_images/create.php"));
        if ($is_valid == true) {
            $image = uploadImage('image', 'work_images', 'worker');
            if ($image == false) {
                addErrorToSession('image', 'Error In Uploading The image');
                redirect(getPage("work_images/create.php"));
            }
        }
    }
    else
    {
        $image = "";
    }


    $work_id = $_POST['work_id'];



    if ($image == "") {
        $data = [
            'work_id' => $work_id
        ];
    } else {
        $data = [
            'image' => $image,
            'work_id' => $work_id
        ];
    }


    $result = update($conn, "work_images", $data, $id);
    if ($result) {
        if ($image != "") {
            deleteImage('work_images', $old_image);
        }
        addSuccessToSession('db', "Work Image Updated Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("work_images/index.php"));
} else {
    redirect(getPage("work_images/index.php"));
}
