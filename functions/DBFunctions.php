<?php

$conn = mysqli_connect("localhost","mohammed","","graduate_yasmin",3309);

$data = [
    'name' => "ahmed",
    "email" => "a@a.com",
    "password" => "asdfsadf"
];

function insert($table,$data)
{
    $query = "INSERT INTO $table(`name`,`email`,`password`,`phone1`,
    `phone2`,`address`,`is_admin`) VALUES ('$name','$email','$password','$phone1','$phone2','$address',$is_admin)";
    
    $reslut = mysqli_query($conn,$query);
}