<?php
include __DIR__ . "/../../../functions/backFunctions.php";
include __DIR__ . "/../../../functions/DBFunctions.php";
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $result = delete($conn, "users", $id);

    if ($result) {
        addSuccessToSession('db', "User Deleted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("users/index.php"));
} else {
    redirect(getPage("users/index.php"));
}
