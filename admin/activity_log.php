<?php include('templates/header.php') ?>
    <?php 
    
    $query = mysqli_query($koneksi, "SELECT activity_log.id, activity_log.activity, activity_log.detail_activity, users.nama as user, activity_log.ip, activity_log.time, activity_log.date_created FROM activity_log INNER JOIN users ON activity_log.user = users.id WHERE MONTH(activity_log.date_created) = MONTH(CURRENT_DATE) ORDER BY activity_log.time DESC LIMIT 10");
    $data_logs = mysqli_fetch_assoc($query);
    $date = substr($data_logs['date_created'],0,7);
    $date2 = substr($data_logs['date_created'], 0, 10);
    
    function bulan_tahun_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      
     
      return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    
    function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      
     
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    echo tgl_indo($date2);
    
    function time_elapsed_string($datetime, $full = false) {
      date_default_timezone_set("Asia/Bangkok");
      $now = new DateTime;
      $ago = new DateTime($datetime);
      $diff = $now->diff($ago);
    
      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;
    
      $string = array(
          'y' => 'year',
          'm' => 'month',
          'w' => 'week',
          'd' => 'day',
          'h' => 'hour',
          'i' => 'minute',
          's' => 'second',
      );
      foreach ($string as $k => &$v) {
          if ($diff->$k) {
              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
          } else {
              unset($string[$k]);
          }
      }
    
      if (!$full) $string = array_slice($string, 0, 1);
      return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    
    ?>

    <?php include('templates/navbar.php') ?>

      <?php include('templates/sidebar.php') ?>


    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Activities Log</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title"><?= bulan_tahun_indo($date) ?></h2>

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
                <div class="activities">
                  <?php 
                  $query = mysqli_query($koneksi, "SELECT activity_log.id, activity_log.activity, activity_log.detail_activity, users.nama as user, activity_log.ip, activity_log.time, activity_log.date_created FROM activity_log INNER JOIN users ON activity_log.user = users.id WHERE MONTH(activity_log.date_created) = MONTH(CURRENT_DATE) ORDER BY activity_log.time DESC LIMIT 10");
                  while($data_log = mysqli_fetch_assoc($query)) : ?>
                  
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <?php if($data_log['activity'] == 'Update') : ?>
                      <i class="fas fa-edit"></i>
                      <?php elseif($data_log['activity'] == 'Delete') : ?>
                      <i class="fas fa-trash"></i>
                      <?php elseif($data_log['activity'] == 'Insert') : ?>
                      <i class="fas fa-pen"></i>
                      <?php elseif($data_log['activity'] == 'Login') : ?>
                      <i class="fas fa-unlock"></i>
                      <?php else : ?>
                      <i class="fas fa-sign-out-alt"></i>
                      <?php endif; ?>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary"><?= time_elapsed_string($data_log['time']) ?></span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" id="toggle_activity_detail" class="dropdown-item has-icon" 
                                data-toggle="modal" data-target="#detailActivityModal"
                                data-activity="<?= $data_log['activity'] ?>"
                                data-detailactivity="<?= $data_log['detail_activity'] ?>"
                                data-user="<?= $data_log['user'] ?>"
                                data-ip="<?= $data_log['ip'] ?>"
                                data-datecreated="<?= tgl_indo($date2) ?>">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="../function/delete_log.php?id=<?= $data_log['id'] ?>" class="dropdown-item has-icon text-danger"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div>
                      </div>
                      <p><?= $data_log['detail_activity'] ?></p>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div> 
            </div>

          </div>
        </section>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="detailActivityModal">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Activity Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                          <th>Activity</th>
                          <td><span id="activity_details"></span></td>
                        </tr>
                        <tr>
                          <th>Detail Activity</th>
                          <td><span id="detail_activity_details"></span></td>
                        </tr>
                        <tr>
                          <th>User</th>
                          <td><span id="user_details"></span></td>
                        </tr>
                        <tr>
                          <th>IP</th>
                          <td><span id="ip_details"></span></td>
                        </tr>
                        <tr>
                          <th>Date Created</th>
                          <td><span id="date_created_details"></span></td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include('templates/footer.php'); ?>
