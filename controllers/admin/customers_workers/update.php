<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['date'])) {
    $id = $_POST['id'];

    $date = $_POST['date'];
    required($date, "date", "error in Date", getPage("customers_workers/create.php"));


    $price = $_POST['price'];
    validateString($price, "price", "error in price", getPage("customers_workers/create.php"));

    $job = $_POST['job'];
    validateString($job, "job", "error in job", getPage("customers_workers/create.php"));

    $description = $_POST['description'];
    validateString($description, "description", "error in description", getPage("customers_workers/create.php"));

    $address = $_POST['address'];
    $address = test_input($address);
    $is_done = $_POST['is_done'] ?? 0;

    $customer_id = $_POST['customer_id'];
    $worker_id = $_POST['worker_id'];
    $data = [
        'date' => $date,
        'price' => $price,
        'job' => $job,
        'description' => $description,
        'address' => $address,
        'is_done' => $is_done,
        'customer_id' => $customer_id,
        'worker_id' => $worker_id
    ];

    $result = update($conn, "customers_workers", $data, $id);
    if ($result) {
        addSuccessToSession('db', "Custuomers Workers Updated Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("customers_workers/index.php"));
} else {
    redirect(getPage("customers_workers/index.php"));
}
