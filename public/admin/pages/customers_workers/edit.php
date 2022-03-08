<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $oldData = selectWhere($conn, 'customers_workers', '*', "id = $id")[0];
}
$customers = query($conn, 'select customers.id,users.name
from customers
join users
on customers.user_id = users.id');

$workers = query($conn, 'select workers.id,users.name
from workers
join users
on workers.user_id = users.id');
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
                            <h3 class="card-title">Update User</h3>
                        </div>

                        <div class="card-body">
                            <?php if (isset($_SESSION['success']['db'])) : ?>
                                <p class="alert alert-success">
                                    <?= $_SESSION['success']['db']; ?>
                                </p>
                            <?php elseif (isset($_SESSION['errors']['db'])) : ?>
                                <p class="text-danger">
                                    <?= $_SESSION['errors']['db']; ?>
                                </p>
                            <?php endif; ?>



                            <form id="quickForm" action="<?= getController("admin/customers_workers/update.php") ?>" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?= $oldData['id'] ?>">


                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" class="form-control" id="date" value="<?= $oldData['date'] ?>">
                                        <?php if (isset($_SESSION['errors']['date'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['date'] ?></p>
                                        <?php endif ?>
                                    </div>




                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price" value="<?= $oldData['price'] ?>">
                                        <?php if (isset($_SESSION['errors']['price'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['price'] ?></p>
                                        <?php endif ?>
                                    </div>



                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" value="<?= $oldData['address'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="job">Job</label>
                                        <input type="text" name="job" class="form-control" id="job" value="<?= $oldData['job'] ?>">
                                        <?php if (isset($_SESSION['errors']['job'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['job'] ?></p>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                                        <?= $oldData['description'] ?>
                                        </textarea>
                                        <?php if (isset($_SESSION['errors']['description'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['description'] ?></p>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Customers </label>
                                        <select class="form-control" name="customer_id">
                                            <?php foreach ($customers as $customer) : ?>
                                                <option value="<?= $customer['id']; ?>"><?= $customer['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Workers</label>
                                        <select class="form-control" name="worker_id">
                                            <?php foreach ($workers as $worker) : ?>
                                                <option value="<?= $worker['id']; ?>"><?= $worker['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="is_done" class="custom-control-input" id="is_done" value="1" <?= $oldData['is_done'] == true ? "checked" : "" ?> >
                                            <label class="custom-control-label" for="is_done">Is Done ?</label>
                                        </div>
                                    </div>
                                </div>


                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->

        </div>
    </section>

    <?php include layout("footer.php"); ?>