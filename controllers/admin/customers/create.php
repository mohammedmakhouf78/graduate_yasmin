<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    $data = [
        'user_id' => $user_id
    ];

    $result = insert($conn, "customers", $data);
    if ($result) {
        addSuccessToSession('db', "Customer Inserted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("customers/create.php"));
} else {
    redirect(getPage("customers/create.php"));
}
