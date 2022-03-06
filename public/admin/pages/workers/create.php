<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
$users = select($conn, 'users', 'id,name');
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
              <h3 class="card-title">Create Worker</h3>
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



              <form id="quickForm" action="<?= getController("admin/workers/create.php") ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                    <label for="id_number">Id Number</label>
                    <input type="text" name="id_number" class="form-control" id="id_number">
                    <?php if (isset($_SESSION['errors']['id_number'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['id_number'] ?></p>
                    <?php endif ?>
                  </div>


                  <div class="form-group">
                    <label for="exp">Experience</label>
                    <input type="text" name="exp" class="form-control" id="exp">
                    <?php if (isset($_SESSION['errors']['exp'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['exp'] ?></p>
                    <?php endif ?>
                  </div>

                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <?php if (isset($_SESSION['errors']['image'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['image'] ?></p>
                    <?php endif ?>
                  </div>

                  <div class="form-group">
                    <label for="job">Job</label>
                    <input type="text" name="job" class="form-control" id="job">
                    <?php if (isset($_SESSION['errors']['job'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['job'] ?></p>
                    <?php endif ?>
                  </div>


                  <div class="form-group">
                    <label for="birth_date">Birthdate</label>
                    <input type="date" name="birth_date" class="form-control" id="birth_date">
                    <?php if (isset($_SESSION['errors']['birth_date'])) : ?>
                      <p class="text-danger"><?= $_SESSION['errors']['birth_date'] ?></p>
                    <?php endif ?>
                  </div>

                  <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="user_id">
                      <?php foreach ($users as $user) : ?>
                        <option value="<?= $user['id']; ?>"><?= $user['name'] ?></option>
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