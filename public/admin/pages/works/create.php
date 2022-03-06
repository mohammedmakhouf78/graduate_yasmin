<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
// $workers = select($conn, 'workers', '*');
$workers = query($conn, 'select workers.id,users.name
from workers
join users
on workers.user_id = users.id
');
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
              <h3 class="card-title">Create Work</h3>
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



              <form id="quickForm" action="<?= getController("admin/works/create.php") ?>" method="POST">
                <div class="card-body">

                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                    <?php if (isset($_SESSION['errors']['title'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['title'] ?></p>
                    <?php endif ?>
                  </div>


                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    <?php if (isset($_SESSION['errors']['description'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['description'] ?></p>
                    <?php endif ?>
                  </div>



                  <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" id="date">
                    <?php if (isset($_SESSION['errors']['date'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['date'] ?></p>
                    <?php endif ?>
                  </div>


                  <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="worker_id">
                      <?php foreach ($workers as $worker) : ?>
                        <option value="<?= $worker['id']; ?>"><?= $worker['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>


                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <input type="submit" name="submit" class="btn btn-primary" />
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