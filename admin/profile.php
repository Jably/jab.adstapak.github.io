<?php include('templates/header.php') ?>

    <?php include('templates/navbar.php') ?>

      <?php include('templates/sidebar.php') ?>

<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
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
            } elseif(isset($_SESSION['success'])) {
              echo '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        '. $_SESSION['success'] .'
                      </div>
                    </div>';
              unset($_SESSION['success']);
            } else {

            }
          ?>
            <h2 class="section-title">Hi, <?= $user['nama'] ?></h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="<?= "assets/img/".$user['image'] ?>" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?= $user['nama'] ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Administrator</div></div>
                        <?= $user['bio'] ?>
                    </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="POST" action="../function/edit_profile.php" class="needs-validation"  novalidate="" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Full Name</label>
                            <input type="text" class="form-control" value="<?= $user['nama'] ?>" required="" name="nama">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?= $user['email'] ?>" required="" readonly>
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="<?= $user['no_telp'] ?>" name="no_telp">
                            <div class="invalid-feedback">
                              Please fill in the phone
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple" name="bio"><?= $user['bio'] ?></textarea>
                            <div class="invalid-feedback">
                              Please fill in the bio
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="input-file-now">Image</label>
                            <input type="file" id="input-file-now" class="dropify" name="gambar" data-default-file="<?= "assets/img/".$user['image'] ?>" />
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-outline-primary" name="upload" type="submit">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <?php include('templates/footer.php'); ?>
