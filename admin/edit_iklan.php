<?php include('templates/header.php') ?>

    <?php include('templates/navbar.php') ?>

      <?php include('templates/sidebar.php') ?>

        <?php 
        
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT iklan.id, brand.nama_brand, jenis_iklan.jenis_iklan, iklan.iklan, iklan.harga, iklan.status FROM iklan INNER JOIN brand ON iklan.brand = brand.id INNER JOIN jenis_iklan ON iklan.jenis_iklan = jenis_iklan.id WHERE iklan.id = '$id' LIMIT 1");
        $data_iklan = mysqli_fetch_assoc($query);
        ?>

      <!-- Main Content -->
      
      <div class="main-content">
      
        <section class="section">
          <div class="section-header">
            <h1>Edit Iklan Page</h1>
          </div>

          <div class="section-body">
          <h2 class="section-title">Form Edit Iklan</h2>
            <p class="section-lead">
              Edit Foto Dan Isi Page Iklan Disini
            </p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Foto Isi</h4>
                  </div>
                  <div class="card-body">
                    <form action="../function/edit_iklan.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data_iklan['id'] ?>">
                    <div class="form-group">
                      <label>Brand</label>
                        <select class="form-control select2" name="brand">
                            <optgroup label="Pilih Brand">
                        <?php   
                            $brand = mysqli_query($koneksi, "SELECT * FROM brand ORDER BY nama_brand ASC");
                            $data_brand = mysqli_fetch_assoc($brand);
                            $selected_brand = $data_iklan['nama_brand'];
                            foreach($brand as $b) :
                        ?>
                                
                            <?php if($b['nama_brand'] == $selected_brand) : ?>
                                <option value="<?= $b['id']; ?>" selected><?= $b['nama_brand'] ?></option>
                                <?php else : ?>
                                <option value="<?= $b['id']; ?>"><?= $b['nama_brand'] ?></option>
                                <?php endif; ?> 
                            <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Iklan</label>
                        <select class="form-control select2" name="jenis_iklan">
                            <optgroup label="Pilih Jenis Iklan">
                        <?php   
                            $jenis_iklan = mysqli_query($koneksi, "SELECT * FROM jenis_iklan ORDER BY jenis_iklan ASC");
                            $data_jenis = mysqli_fetch_assoc($jenis_iklan);
                            $selected_jenis_iklan = $data_iklan['jenis_iklan'];
                            foreach($jenis_iklan as $ji) :
                        ?>
                                
                            <?php if($ji['jenis_iklan'] == $selected_jenis_iklan) : ?>
                                <option value="<?= $ji['id']; ?>" selected><?= $ji['jenis_iklan'] ?></option>
                                <?php else : ?>
                                <option value="<?= $ji['id']; ?>"><?= $ji['jenis_iklan'] ?></option>
                                <?php endif; ?> 
                            <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Status Iklan</label>
                      <select class="form-control" name="status">
                        <?php if($data_iklan['status'] == "desktop") : ?>
                        <option value="desktop" selected>Desktop</option>
                        <option value="mobile">Mobile</option>
                        <?php else : ?>
                        <option value="desktop">Desktop</option>
                        <option value="mobile" selected>Mobile</option>
                        <?php endif; ?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="input-file-now">Iklan</label>
                        <input type="file" id="input-file-now" class="dropify" data-default-file="<?= "../assets/img/".$data_iklan['iklan'] ?>" name="gambar" />
                      </div>
                      <div class="col-md-6">
                        <label for="input-file-now">Harga</label>
                        <input type="file" id="input-file-now" class="dropify" data-default-file="<?= "../assets/img/".$data_iklan['harga'] ?>" name="gambar2" />
                      </div>
                    </div>
                    <button class="btn btn-outline-primary mt-3 ml-3 float-right" type="submit">Save Changes</button>
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
