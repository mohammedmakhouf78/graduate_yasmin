<?php
include __DIR__ . "/../../../functions/backFunctions.php";
include __DIR__ . "/../../../functions/functions.php";
if(isset($_POST['name']))
{
    $name = $_POST['name'];
    validateString($name,"name","error in name",getPage("users/create.php"));
    
    $email = $_POST['email'];
    validateEmail($email,"email","email is bad",getPage("users/create.php"));

    $password = $_POST['password'];
    validatePassword($password,"password",getPage("users/create.php"));

    $phone1 = $_POST['phone1'];
    validatePhone($phone1,"phone1","phone is wrong",getPage("users/create.php"));
    $phone2 = $_POST['phone2'];
    $phone2 = test_input($phone2);

    $address = $_POST['address'];
    $address = test_input($address);
    $is_admin = $_POST['is_admin'] ?? 0;

    $conn = mysqli_connect("localhost","mohammed","","graduate_yasmin",3309);

    $query = "INSERT INTO users(`name`,`email`,`password`,`phone1`,
    `phone2`,`address`,`is_admin`) VALUES ('$name','$email','$password','$phone1','$phone2','$address',$is_admin)";
    
    $reslut = mysqli_query($conn,$query);

    // var_dump(mysqli_error_list($conn));
}