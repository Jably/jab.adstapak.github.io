<?php include('templates/header.php') ?>

    <?php include('templates/navbar.php') ?>

      <?php include('templates/sidebar.php') ?>


      <!-- Main Content -->
      
      <div class="main-content">
      
        <section class="section">
          <div class="section-header">
            <h1>Upload Iklan Page</h1>
          </div>

          <div class="section-body">
          <h2 class="section-title">Form Upload</h2>
            <p class="section-lead">
              Upload Foto Dan Isi Page Iklan Disini
            </p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Upload Foto Isi</h4>
                  </div>
                  <div class="card-body">
                    <form action="../function/upload.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Brand</label>
                      <select class="form-control select2" name="brand">
                        <optgroup label="Pilih Brand">
                        <?php 
                            $brand = mysqli_query($koneksi, "SELECT * FROM brand ORDER BY nama_brand ASC");
                            $data = mysqli_fetch_assoc($brand);
                            foreach($brand as $b) {
                        ?>
                        <option value="<?= $b['id']; ?>"><?= $b['nama_brand'] ?></option>
                        <?php } ?>
                        </optgroup>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Iklan</label>
                        <select class="form-control select2" name="jenis_iklan">
                        <optgroup label="Pilih Jenis Iklan">
                        <?php 
                            $jenis_iklan = mysqli_query($koneksi, "SELECT * FROM jenis_iklan ORDER BY jenis_iklan ASC");
                            $data = mysqli_fetch_assoc($jenis_iklan);
                            foreach($jenis_iklan as $ji) {
                        ?>
                        <option value="<?= $ji['id']; ?>"><?= $ji['jenis_iklan'] ?></option>
                        <?php } ?>
                        </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Status Iklan</label>
                      <select class="form-control" name="status">
                        <option value="desktop">Desktop</option>
                        <option value="mobile">Mobile</option>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="input-file-now">Iklan</label>
                        <input type="file" id="input-file-now" class="dropify" name="gambar" />
                      </div>
                      <div class="col-md-6">
                        <label for="input-file-now">Harga</label>
                        <input type="file" id="input-file-now" class="dropify" name="gambar2" />
                      </div>
                    </div>
                    <button class="btn btn-outline-primary mt-3 ml-3 float-right" type="submit">Insert</button>
                    <a href="iklan.php" class="btn btn-outline-secondary mt-3 float-right">Back to Table</a>
                    </div>
                    </div>
                    </div>  
                    </form>
                  </div>
                </div>
              </div>
            </div>

        </section>
      </div>
      
     <?php include('templates/footer.php'); ?>
