<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id_number'])) {
    $id = $_POST['id'];
    $old_image = selectWhere($conn, 'workers', 'image',"id = $id")[0]['image'];

    $id_number = $_POST['id_number'];
    validateString($id_number, "id_number", "error in Id Number", getPage("workers/index.php"));

    $exp = $_POST['exp'];
    validateString($exp, "exp", "error in Experience", getPage("workers/index.php"));

    if(!empty($_FILES['image']['name']))
    {
        $is_valid = validateImage('image', "error in Image", getPage("workers/index.php"));
        if ($is_valid == true) {
            $image = uploadImage('image', 'workers', 'worker');
            if($image == false)
            {
                addErrorToSession('image', 'Error In Uploading The image');
                redirect(getPage("workers/index.php"));
            }
        }
    }
    else
    {
        $image = "";
    }


    $job = $_POST['job'];
    validateString($job, "job", "error in Job", getPage("workers/index.php"));

    $birth_date = $_POST['birth_date'];
    required($birth_date, "birth_date", "error in BirthDate", getPage("workers/index.php"));

    $user_id = $_POST['user_id'];

    if($image == "")
    {
        $data = [
            'id_number' => $id_number,
            'exp' => $exp,
            'job' => $job,
            'birth_date' => $birth_date,
            'user_id' => $user_id
        ];
    }
    else
    {
        $data = [
            'id_number' => $id_number,
            'exp' => $exp,
            'job' => $job,
            'birth_date' => $birth_date,
            'image' => $image,
            'user_id' => $user_id
        ];
    }
   

    $result = update($conn, "workers", $data, $id);
    if ($result) {
        if($image != "")
        {
            deleteImage('workers',$old_image);
        }
        addSuccessToSession('db', "Worker Updated Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("workers/index.php"));
} else {
    redirect(getPage("workers/index.php"));
}
