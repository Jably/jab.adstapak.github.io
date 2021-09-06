<?php include('templates/header.php') ?>

    <?php include('templates/navbar.php') ?>

      <?php include('templates/sidebar.php') ?>


      <!-- Main Content -->
      
      <div class="main-content">
      
        <section class="section">
          <div class="section-header">
            <h1>Iklan Page</h1>
          </div>

          <div class="section-body">
          <h2 class="section-title">Iklan</h2>
            <p class="section-lead">
              List Iklan Disini
            </p>

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

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Table Iklan</h4>
                    <div class="card-header-action">
                      <a href="upload_iklan.php" class="btn btn-primary">Upload Iklan</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="datatables">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Image Iklan</th>
                            <th>Image Harga</th>
                            <th>Brand</th>
                            <th>Jenis Iklan</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $query = mysqli_query($koneksi, "SELECT iklan.id, brand.nama_brand, jenis_iklan.jenis_iklan, iklan.iklan, iklan.harga, iklan.status FROM iklan INNER JOIN brand ON iklan.brand = brand.id INNER JOIN jenis_iklan ON iklan.jenis_iklan = jenis_iklan.id");
                            $num = 1;
                            while($iklan = mysqli_fetch_assoc($query)) :
                            ?>
                          <tr>
                            <td class="align-middle">
                              <?= $num++ ?>
                            </td>
                            <td>
                              <a href="../assets/img/<?= $iklan['iklan'] ?>" data-lightbox="iklan-<?= $iklan['nama_brand'] ?>-<?= $iklan['jenis_iklan'] ?>-<?= $iklan['status'] ?>" data-title="iklan-<?= $iklan['nama_brand'] ?>-<?= $iklan['jenis_iklan'] ?>-<?= $iklan['status'] ?>"><?= $iklan['iklan'] ?></a>
                            </td>
                            <td>
                              <a href="../assets/img/<?= $iklan['harga'] ?>" data-lightbox="harga-<?= $iklan['nama_brand'] ?>-<?= $iklan['jenis_iklan'] ?>-<?= $iklan['status'] ?>" data-title="harga-<?= $iklan['nama_brand'] ?>-<?= $iklan['jenis_iklan'] ?>-<?= $iklan['status'] ?>"><?= $iklan['harga'] ?></a>
                            </td>
                            <td>
                                <?= $iklan['nama_brand'] ?>
                            </td>
                            <td><?= $iklan['jenis_iklan'] ?></td>
                            <td>
                              <?php if($iklan['status'] == 'desktop') : ?>
                              <div class="badge badge-primary"><?= $iklan['status'] ?></div>
                              <?php else : ?>
                              <div class="badge badge-success"><?= $iklan['status'] ?></div>
                              <?php endif; ?>
                            </td>
                            <td>
                              <a href="edit_iklan.php?id=<?= $iklan['id'] ?>" class="btn btn-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Iklan"><i class="fas fa-edit"></i></a>
                              <a href="../function/delete_iklan.php?id=<?= $iklan['id'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Iklan"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                            <?php endwhile; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

        </section>
      </div>
      
     <?php include('templates/footer.php'); ?>
