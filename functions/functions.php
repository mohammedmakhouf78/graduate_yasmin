<?php

session_start();

function validatePhone($data,$name,$message,$path)
{
    $data = preg_replace("/[^0-9]/",'', $data);
    $data = test_input($data);
    if(empty($data));
    {
        addErrorToSession($name,$message);
        redirect($path);   
    }
    return true;
}

function validateString($data,$name,$message,$path)
{
    $data = test_input($data);
    if (!(preg_match('/^[A-Za-z]*$/', $data) && !empty($data))) {
        addErrorToSession($name,$message);
        redirect($path);        
    }
    return true;
}

function validateEmail($data,$name,$message,$path)
{
    $data = test_input($data);
    if(!(filter_var($data, FILTER_VALIDATE_EMAIL) && !empty($data)))
    {
        addErrorToSession($name,$message);
        redirect($path);
    }
    return true;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validatePassword($data,$name,$path)
{
    if(!empty($data)) {
        $password = test_input($data);
        if (strlen($data) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
            addErrorToSession($name,$passwordErr);
            redirect($path);
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
            addErrorToSession($name,$passwordErr);
            redirect($path);
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
            addErrorToSession($name,$passwordErr);
            redirect($path);
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
            addErrorToSession($name,$passwordErr);
            redirect($path);
        }
    }
    else {
         $passwordErr = "Please enter password   ";
         addErrorToSession($name,$passwordErr);
            redirect($path);
    }
}

function addErrorToSession($key,$value)
{
    $_SESSION['errors'][$key] = $value;
}

function redirect($path)
{
    header("location: $path");
}