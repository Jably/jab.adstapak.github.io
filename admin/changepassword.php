<?php include('templates/header.php') ?>

    <?php include('templates/navbar.php') ?>

      <?php include('templates/sidebar.php') ?>

<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Change Password</h1>
          </div>
          <div class="section-body">

          <?php 
            if(isset($_SESSION['error'])) {
              echo '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        '. $_SESSION['error'] .'
                      </div>
                    </div>';
              unset($_SESSION['error']);
            } else {

            }
          ?>

            <div class="row mt-sm-4">

              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="POST" action="../function/changepassword.php" class="needs-validation"  novalidate="" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Current Password</label>
                            <input type="password" class="form-control" required="" name="current_password">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>New Password</label>
                            <input type="password" class="form-control" required="" name="new_password">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Repeat Password</label>
                            <input type="password" class="form-control" required="" name="repeat_password">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-outline-primary" type="submit">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <?php include('templates/footer.php'); die; ?>
