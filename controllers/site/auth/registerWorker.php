<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    validateString($name, "name", "error in name", getPageSite("auth/registerWorker.php"));

    $email = $_POST['email'];
    validateEmail($email, "email", "email is bad", getPageSite("auth/registerWorker.php"));

    $password = $_POST['password'];
    validatePassword($password, "password", getPageSite("auth/registerWorker.php"));

    $phone1 = $_POST['phone1'];
    validatePhone($phone1, "phone1", "phone is wrong", getPageSite("auth/registerWorker.php"));

    $phone2 = $_POST['phone2'];
    $phone2 = test_input($phone2);

    $address = $_POST['address'];
    $address = test_input($address);


    $id_number = $_POST['id_number'];
    validateString($id_number, "id_number", "error in Id Number", getPageSite("auth/registerWorker.php"));

    $exp = $_POST['exp'];
    validateString($exp, "exp", "error in Experience", getPageSite("auth/registerWorker.php"));

    //image
    $is_valid = validateImage('image', "error in Image", getPageSite("auth/registerWorker.php"));

    if ($is_valid == true) {
        $image = uploadImage('image', 'workers', 'worker');
        if($image == false)
        {
            addErrorToSession('image', 'Error In Uploading The image');
            redirect(getPageSite("auth/registerWorker.php"));
        }
    }

    $job = $_POST['job'];
    validateString($job, "job", "error in Job", getPageSite("auth/registerWorker.php"));

    $birth_date = $_POST['birth_date'];
    required($birth_date, "birth_date", "error in BirthDate", getPageSite("auth/registerWorker.php"));

    


    $data = [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'phone1' => $phone1,
        'phone2' => $phone2,
        'address' => $address,
        'is_admin' => 0
    ];

    $result = insert($conn, "users", $data);

    $user_id = mysqli_insert_id($conn);

    $data = [
        'id_number' => $id_number,
        'exp' => $exp,
        'job' => $job,
        'birth_date' => $birth_date,
        'image' => $image,
        'user_id' => $user_id
    ];

    $result2 = insert($conn, "workers", $data);
    $worker_id = mysqli_insert_id($conn);
   
    if($result == true && $result2 == true)
    {
        $_SESSION['worker'] = [
            'id' => $worker_id,
            'name' => $name,
            'email' => $email
        ];
    }

    
    redirect(getPageSite("auth/registerWorker.php"));
} else {
    redirect(getPageSite("auth/registerWorker.php"));
}
