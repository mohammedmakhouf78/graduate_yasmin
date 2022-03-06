<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    validateString($title, "title", "error in title", getPage("works/index.php"));
    
    $description = $_POST['description'];
    validateString($description, "description", "error in description", getPage("works/index.php"));


    $date = $_POST['date'];
    required($date, "date", "error in date", getPage("works/index.php"));

    $worker_id = $_POST['worker_id'];

    $data = [
        'title' => $title,
        'description' => $description,
        'date' => $date,
        'worker_id' => $worker_id
    ];
    
    $result = update($conn, "works", $data, $id);
    if ($result) {
        addSuccessToSession('db', "Work Updated Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("works/index.php"));
} else {
    redirect(getPage("works/index.php"));
}
