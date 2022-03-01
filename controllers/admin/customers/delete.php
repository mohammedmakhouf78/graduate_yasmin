<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $result = delete($conn, "customers", $id);

    if ($result) {
        addSuccessToSession('db', "Customer Deleted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("customers/index.php"));
} else {
    redirect(getPage("customers/index.php"));
}
