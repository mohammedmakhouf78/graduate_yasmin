<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['user_id'])) {
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $data = [
        'user_id' => $user_id
    ];
    $result = update($conn, "customers", $data, $id);
    if ($result) {
        addSuccessToSession('db', "Customer Updated Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("customers/index.php"));
} else {
    redirect(getPage("customers/index.php"));
}
