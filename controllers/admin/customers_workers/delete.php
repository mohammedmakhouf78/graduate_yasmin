<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $result = delete($conn, "customers_workers", $id);

    if ($result) {
        addSuccessToSession('db', "User Deleted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("customers_workers/index.php"));
} else {
    redirect(getPage("customers_workers/index.php"));
}
