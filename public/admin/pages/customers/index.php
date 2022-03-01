<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
$customers = DBjoin($conn, 'customers.id,users.name', 'customers', 'users', 'customers.user_id = users.id');
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
                            <h3 class="card-title">All Customers</h3>
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
                                        <th>User_id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($customers as $customer) : ?>
                                        <tr>
                                            <td><?= $customer['id']; ?></td>
                                            <td><?= $customer['name']; ?></td>
                                            <td>
                                                <a class="btn btn-success" href="<?= getPage("customers/edit.php") ?>?id=<?= $customer['id']; ?>">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <form action="<?= getController("admin/customers/delete.php") ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?= $customer['id']; ?>">
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
                                        <th>User_id</th>
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