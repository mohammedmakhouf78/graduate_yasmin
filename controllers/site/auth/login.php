<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['email'])) {

    $email = $_POST['email'];
    validateEmail($email, "email", "email is bad", getPageSite("auth/login.php"));

    $password = $_POST['password'];
    validatePassword($password, "password", getPageSite("auth/login.php"));

    $users = select($conn,'users',"*");


    
    foreach($users as $user)
    {
        if($user['email'] == $email && password_verify($password,$user['password']))
        {
            $worker = selectWhere($conn,'workers','*','user_id = '. $user['id'])[0];
            $customer = selectWhere($conn,'customers','*','user_id = ' .$user['id'])[0];
            if(!empty($worker))
            {
                $_SESSION['worker'] = [
                    'id' => $worker['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ];
            }
            else if(!empty($customer))
            {
                $_SESSION['customer'] = [
                    'id' => $customer['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ];
            }
            else
            {
                redirect(getPageSite("auth/login.php"));
            }
            redirect(getPageSite("index.php"));
        }
        else
        {
            redirect(getPageSite("auth/login.php"));
        }
    }
    
} else {
    redirect(getPageSite("auth/login.php"));
}
