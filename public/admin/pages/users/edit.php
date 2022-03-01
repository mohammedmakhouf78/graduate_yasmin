<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $oldData = selectWhere($conn, 'users', '*', "id = $id")[0];
}
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



                            <form id="quickForm" action="<?= getController("admin/users/update.php") ?>" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?= $oldData['id'] ?>">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="<?= $oldData['name'] ?>">
                                        <?php if (isset($_SESSION['errors']['name'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?= $oldData['email'] ?>">
                                        <?php if (isset($_SESSION['errors']['email'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <?php if (isset($_SESSION['errors']['password'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone1">Phone1</label>
                                        <input type="text" name="phone1" class="form-control" id="phone1" value="<?= $oldData['phone1'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone2">Phone2</label>
                                        <input type="text" name="phone2" class="form-control" id="phone2" value="<?= $oldData['phone2'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" value="<?= $oldData['address'] ?>">
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="is_admin" class="custom-control-input" id="is_admin" value="1" <?= $oldData['is_admin'] == 1 ? 'checked' : '' ?>>
                                            <label class="custom-control-label" for="is_admin">Is Admin ?</label>
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