<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/functions/frontFunctions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/backFunctions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunctions.php";
$users = select($conn, 'users', '*');
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
                            <h3 class="card-title">Create User</h3>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone1</th>
                                        <th>Phone2</th>
                                        <th>Address</th>
                                        <th>Is Admin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $user['id']; ?></td>
                                            <td>
                                                <?= $user['name']; ?>
                                            </td>
                                            <td>
                                                <?= $user['email']; ?>
                                            </td>
                                            <td>
                                                <?= $user['phone1']; ?>
                                            </td>
                                            <td>
                                                <?= $user['phone2']; ?>
                                            </td>
                                            <td>
                                                <?= $user['address']; ?>
                                            </td>
                                            <td>
                                                <?= $user['is_admin']; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success" href="">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <form action="<?= getController("admin/users/delete.php") ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone1</th>
                                        <th>Phone2</th>
                                        <th>Address</th>
                                        <th>Is Admin</th>
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