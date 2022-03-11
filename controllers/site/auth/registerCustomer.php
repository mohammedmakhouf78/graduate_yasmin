<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    validateString($name, "name", "error in name", getPageSite("auth/registerCustomer.php"));

    $email = $_POST['email'];
    validateEmail($email, "email", "email is bad", getPageSite("auth/registerCustomer.php"));

    $password = $_POST['password'];
    validatePassword($password, "password", getPageSite("auth/registerCustomer.php"));

    $phone1 = $_POST['phone1'];
    validatePhone($phone1, "phone1", "phone is wrong", getPageSite("auth/registerCustomer.php"));

    $phone2 = $_POST['phone2'];
    $phone2 = test_input($phone2);

    $address = $_POST['address'];
    $address = test_input($address);

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
    
    $result2 = insert($conn,'customers',[
        'user_id' => $user_id
    ]);
    $customer_id = mysqli_insert_id($conn);
    
    if($result == true && $result2 == true)
    {
        $_SESSION['customer'] = [
            'id' => $customer_id,
            'name' => $name,
            'email' => $email
        ];
    }

    
    redirect(getPageSite("auth/registerCustomer.php"));
} else {
    redirect(getPageSite("auth/registerCustomer.php"));
}
