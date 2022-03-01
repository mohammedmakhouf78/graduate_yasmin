<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    validateString($name, "name", "error in name", getPage("users/index.php"));

    $email = $_POST['email'];
    validateEmail($email, "email", "email is bad", getPage("users/index.php"));

    $password = $_POST['password'];
    validatePassword($password, "password", getPage("users/index.php"));

    $phone1 = $_POST['phone1'];
    validatePhone($phone1, "phone1", "phone is wrong", getPage("users/index.php"));

    $phone2 = $_POST['phone2'];
    $phone2 = test_input($phone2);

    $address = $_POST['address'];
    $address = test_input($address);
    $is_admin = $_POST['is_admin'] ?? 0;

    $data = [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'phone1' => $phone1,
        'phone2' => $phone2,
        'address' => $address,
        'is_admin' => $is_admin
    ];

    $result = update($conn, "users", $data, $id);
    if ($result) {
        addSuccessToSession('db', "User Updated Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("users/index.php"));
} else {
    redirect(getPage("users/index.php"));
}
