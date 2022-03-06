<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    validateString($title, "title", "error in title", getPage("works/create.php"));

    $description = $_POST['description'];
    validateString($description, "description", "error in description", getPage("works/create.php"));


    $date = $_POST['date'];
    required($date, "date", "error in date", getPage("works/create.php"));

    $worker_id = $_POST['worker_id'];

    $data = [
        'title' => $title,
        'description' => $description,
        'date' => $date,
        'worker_id' => $worker_id
    ];
    $result = insert($conn, "works", $data);
    if ($result) {
        addSuccessToSession('db', "Work Inserted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("works/create.php"));
} else {
    redirect(getPage("works/create.php"));
}
