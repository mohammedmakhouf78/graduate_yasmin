<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
$jobs = query($conn,"select c.id,c.date,c.price,c.address,c.job,c.description,c.is_done, u.name as customer_name , u2.name as worker_name
from customers_workers as c
join customers as cm
on c.customer_id = cm.id
join users as u
on cm.user_id = u.id
join workers as w
on c.worker_id = w.id
join users as u2
on w.user_id = u2.id");
?>

<?php include layout("header.php"); ?>

<?php include layout("navbar.php"); ?>

<?php include layout("aside.php"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard v2</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Jobs</h3>
                        </div>

                        <div>
                            <?php if (isset($_SESSION['success']['db'])) : ?>
                                <p class="alert alert-success">
                                    <?= $_SESSION['success']['db']; ?>
                                </p>
                            <?php elseif (isset($_SESSION['errors']['db'])) : ?>
                                <p class="text-danger">
                                    <?= $_SESSION['errors']['db']; ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">



                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Address</th>
                                        <th>Job</th>
                                        <th>Description</th>
                                        <th>Is Done</th>
                                        <th>Customer_Name</th>
                                        <th>Worker_Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jobs as $job) : ?>
                                        <tr>
                                            <td><?= $job['id']; ?></td>
                                            <td><?= $job['date']; ?></td>
                                            <td><?= $job['price']; ?></td>
                                            <td><?= $job['address']; ?></td>
                                            <td><?= $job['job']; ?></td>
                                            <td><?= $job['description']; ?></td>
                                            <?php if ($job['is_done'] == 1) : ?>
                                                <td class="text-success">
                                                    Done
                                                </td>
                                            <?php else : ?>
                                                <td class="text-info">
                                                    Not Done
                                                </td>
                                            <?php endif; ?>
                                            <td><?= $job['customer_name']; ?></td>
                                            <td><?= $job['worker_name']; ?></td>
                                            
                                            

                                            <td>
                                                <a class="btn btn-success" href="<?= getPage("customers_workers/edit.php") ?>?id=<?= $job['id']; ?>">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <form action="<?= getController("admin/customers_workers/delete.php") ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?= $job['id']; ?>">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Address</th>
                                        <th>Job</th>
                                        <th>Description</th>
                                        <th>Is Done</th>
                                        <th>Customer_Name</th>
                                        <th>Worker_Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

            </div>
    </section>
    <?php include layout("footer.php"); ?>