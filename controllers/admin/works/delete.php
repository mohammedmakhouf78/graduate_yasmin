<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $result = delete($conn, "works", $id);

    if ($result) {
        addSuccessToSession('db', "Work Deleted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("works/index.php"));
} else {
    redirect(getPage("works/index.php"));
}
