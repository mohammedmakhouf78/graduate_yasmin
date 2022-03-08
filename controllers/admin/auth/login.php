<?php

include __DIR__ . "/../../../functions/functions.php";

if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = select($conn,'users',"*");
    
    foreach($users as $user)
    {
        if($user['email'] == $email && password_verify($password,$user['password']) && $user['is_admin'])
        {
            $_SESSION['admin'] = [
                'name' => $user['name'],
                'email' => $user['email']
            ];
            redirect(getPageAdmin("index.php"));
        }
        else
        {
            addErrorToSession('login', "There is no such user!!!");
            redirect(getPageAdmin("auth/login.php"));
        }
    }
}