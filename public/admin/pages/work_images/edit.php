<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $oldData = selectWhere($conn, 'work_images', '*', "id = $id")[0];
}
$works = select($conn, 'works', 'id,title');
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
                            <h3 class="card-title">Update Worker</h3>
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



                            <form id="quickForm" action="<?= getController("admin/work_images/update.php") ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?= $oldData['id'] ?>">



                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <?php if (isset($_SESSION['errors']['image'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['image'] ?></p>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="work_id">Work</label>
                                        <select name="work_id" id="work_id" class="form-control">
                                            <?php foreach ($works as $work) : ?>
                                                <option value="<?= $work['id'] ?>">
                                                    <?= $work['title'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
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