<?php include('templates/header.php') ?>

    <?php include('templates/navbar.php') ?>

      <?php include('templates/sidebar.php') ?>

      <?php 

function time_elapsed_string($datetime, $full = false) {
    date_default_timezone_set("Asia/Bangkok");
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'y',
        'm' => 'm',
        'w' => 'w',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 's',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '' : 'Now';
  }
      
      $iklan_sql = mysqli_query($koneksi, "SELECT COUNT(id) as count_iklan FROM iklan");
      $data_iklan = mysqli_fetch_assoc($iklan_sql);
      $brand_sql = mysqli_query($koneksi, "SELECT COUNT(id) as count_brand FROM brand");
      $data_brand = mysqli_fetch_assoc($brand_sql);
      $jenis_iklan_sql = mysqli_query($koneksi, "SELECT COUNT(id) as count_jenis_iklan FROM jenis_iklan");
      $data_jenis_iklan = mysqli_fetch_assoc($jenis_iklan_sql);
      $users_sql = mysqli_query($koneksi, "SELECT COUNT(id) as count_users FROM users");
      $data_user = mysqli_fetch_assoc($users_sql);

      ?>


      <!-- Main Content -->
      
      <div class="main-content">
      
        <section class="section">
          <div class="section-header">
            <h1>General Page</h1>
          </div>

          <div class="section-body">

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    <?= $data_user['count_users'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Iklan</h4>
                  </div>
                  <div class="card-body">
                    <?= $data_iklan['count_iklan'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Brand</h4>
                  </div>
                  <div class="card-body">
                    <?= $data_brand['count_brand'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Jenis Iklan</h4>
                  </div>
                  <div class="card-body">
                    <?= $data_jenis_iklan['count_jenis_iklan'] ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>

          <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistics</h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <a href="#" class="btn btn-primary">Week</a>
                      <a href="#" class="btn">Month</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                  <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                      <div class="detail-value">$243</div>
                      <div class="detail-name">Today's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                      <div class="detail-value">$2,902</div>
                      <div class="detail-name">This Week's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                      <div class="detail-value">$12,821</div>
                      <div class="detail-name">This Month's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                      <div class="detail-value">$92,142</div>
                      <div class="detail-name">This Year's Sales</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Recent Activities</h4>
                </div>
                <div class="card-body">             
                  <ul class="list-unstyled list-unstyled-border">
                    <?php 
                    
                    $query = mysqli_query($koneksi, "SELECT activity_log.id, activity_log.activity, activity_log.detail_activity, users.nama as user, users.image, activity_log.ip, activity_log.time, activity_log.date_created FROM activity_log INNER JOIN users ON activity_log.user = users.id WHERE MONTH(activity_log.date_created) = MONTH(CURRENT_DATE) ORDER BY activity_log.time DESC LIMIT 5");
                    while($data_log = mysqli_fetch_assoc($query)) : ?>

                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="<?= "assets/img/".$data_log['image'] ?>" alt="Profile">
                      <div class="media-body">
                        <div class="float-right text-primary"><?= time_elapsed_string($data_log['time']) ?></div>
                        <div class="media-title"><?= $data_log['user'] ?></div>
                        <span class="text-small text-muted"><?= $data_log['detail_activity'] ?></span>
                      </div>
                    </li>

                    <?php endwhile; ?>
                  </ul>
                  <div class="text-center pt-1 pb-1">
                    <a href="activity_log.php" class="btn btn-primary btn-lg btn-round">
                      View All
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
      </div>
      
     <?php include('templates/footer.php'); ?>
