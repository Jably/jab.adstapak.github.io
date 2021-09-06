<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">Tapak Media</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">TM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              
              <?php 
              //get path
              $urlPath = $_SERVER["REQUEST_URI"];
              //get last element
              $end = array_slice(explode('/', rtrim($urlPath, '/')), -1)[0];
              //replace dashes with spaces and display 
              $url = str_replace('-',' ',$end);

              if($url == 'index.php') { 
              ?>
              <!-- Cek jika page sedang di buka maka tambah class Active -->
              
              <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-fire"></i><span>General</span></a>
              </li>
              <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-fire"></i><span>General</span></a>
              </li>
              <?php } ?>
              
              <li class="menu-header">Iklan</li>
              <?php if($url == 'iklan.php') { ?>
              <li class="nav-item active">
                <a href="iklan.php" class="nav-link"><i class="fas fa-columns"></i> <span>Upload Iklan</span></a>
              </li>
              <?php } else { ?>
              <li class="nav-item">
                <a href="iklan.php" class="nav-link"><i class="fas fa-columns"></i> <span>Upload Iklan</span></a>
              </li>
              <?php } ?>

              <li class="menu-header">Users</li>
              <?php if($url == 'profile.php') { ?>
              <li class="nav-item active">
                <a href="profile.php" class="nav-link"><i class="fas fa-user"></i> <span>My Profile</span></a>
              </li>              
              <?php } else { ?>
              <li class="nav-item">
                <a href="profile.php" class="nav-link"><i class="fas fa-user"></i> <span>My Profile</span></a>
              </li>       
              <?php } ?>       
              <?php if($url == 'changepassword.php') { ?>
              <li class="nav-item active">
                <a href="changepassword.php" class="nav-link"><i class="fas fa-key"></i> <span>Change Password</span></a>
              </li>              
              <?php } else { ?>
              <li class="nav-item">
                <a href="changepassword.php" class="nav-link"><i class="fas fa-key"></i> <span>Change Password</span></a>
              </li>       
              <?php } ?>    
              <li class="menu-header">Settings</li>
              <?php if($url == 'activity_log.php') { ?>
              <li class="nav-item active">
                <a href="activity_log.php" class="nav-link"><i class="fas fa-bolt"></i> <span>Activity Log</span></a>
              </li>              
              <?php } else { ?>
              <li class="nav-item">
                <a href="activity_log.php" class="nav-link"><i class="fas fa-bolt"></i> <span>Activity Log</span></a>
              </li>       
              <?php } ?>    
            
            </ul>
        </aside>
      </div>