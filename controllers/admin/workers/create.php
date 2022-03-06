<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id_number'])) {

    $id_number = $_POST['id_number'];
    validateString($id_number, "id_number", "error in Id Number", getPage("workers/create.php"));

    $exp = $_POST['exp'];
    validateString($exp, "exp", "error in Experience", getPage("workers/create.php"));

    //image
    $is_valid = validateImage('image', "error in Image", getPage("workers/create.php"));

    if ($is_valid == true) {
        $image = uploadImage('image', 'workers', 'worker');
        if($image == false)
        {
            addErrorToSession('image', 'Error In Uploading The image');
            redirect(getPage("workers/create.php"));
        }
    }

    $job = $_POST['job'];
    validateString($job, "job", "error in Job", getPage("workers/create.php"));

    $birth_date = $_POST['birth_date'];
    required($birth_date, "birth_date", "error in BirthDate", getPage("workers/create.php"));

    $user_id = $_POST['user_id'];

    $data = [
        'id_number' => $id_number,
        'exp' => $exp,
        'job' => $job,
        'birth_date' => $birth_date,
        'image' => $image,
        'user_id' => $user_id
    ];

    $result = insert($conn, "workers", $data);
    if ($result) {
        addSuccessToSession('db', "Worker Inserted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("workers/create.php"));
} else {
    redirect(getPage("workers/create.php"));
}
