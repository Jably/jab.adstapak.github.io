<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/pages.css">

    <title>Tapak Ads</title>

    <link rel="icon" type="../img/favicon.ico" href="../favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

</head> 

<body>
    <?php 
    include "../function/config.php";

    $query = mysqli_query($koneksi, "SELECT brand.nama_brand, jenis_iklan.jenis_iklan, iklan.iklan, iklan.harga, iklan.status FROM iklan INNER JOIN brand ON iklan.brand = brand.id INNER JOIN jenis_iklan ON iklan.jenis_iklan = jenis_iklan.id WHERE brand.nama_brand = 'tapakstudio' AND jenis_iklan.jenis_iklan = 'sidebar' AND status = 'desktop'");
    $data = mysqli_fetch_assoc($query);
    $image_name = $data['iklan'];
    $image_name1 = $data['harga'];
    ?>
  <div class="desktopimg">
    <img src="<?= "../assets/img/".$image_name; ?>" class="brandimg">
    <img src="<?= "../assets/img/".$image_name1; ?>" class="priceimg">
  </div>
  <nav id="navbar-cus" class="navbar navbar-custom fixed-top">
    <div class="menu-btn">
      <i class="fas fa-bars"></i>
    </div>
    <div class="close-btn" style="visibility: hidden">
      <i class="fas fa-bars"></i>
    </div>
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">
            <img src="../assets/img/tapakads.png" style="height: 50px;" class="img-fluid">
         </a>
    <ul class="nav navbar-nav navbar-right">
<!--
            <li>
                <a href="page/idntimes/contact-us.html" class="contact-us" target="myiframe" onclick="remove_home()">Contact Us</a>
            </li>
-->
        </ul>
    </div>
 </nav>
 <div class="side-bar active">
        <div class="menu">
            <div class="item">
                <a class="sub-btn"><img src="../assets/img/cnc.png" class="img img-fluid4"><i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Advertorial</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/cnc-adv-mbl.php"></i>Mobile</a>
                      <a href="../pages/cnc-adv-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Pop-Up</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/cnc-pop-mbl.php"></i>Mobile</a>
                      <a href="../pages/cnc-pop-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Home</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/cnc-bnr-hm-mbl.php"></i>Mobile</a>
                      <a href="../pages/cnc-bnr-hm-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Artikel</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/cnc-bnr-art-mbl.php"></i>Mobile</a>
                      <a href="../pages/cnc-bnr-art-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Rubrik</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/cnc-bnr-art-mbl.php"></i>Mobile</a>
                      <a href="../pages/cnc-bnr-art-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Sidebar</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/cnc-bnr-art-mbl.php"></i>Mobile</a>
                      <a href="../pages/cnc-bnr-art-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                </div>
          </div>
            <div class="item">
              <a class="sub-btn"><img src="../assets/img/tapak-studio.png" class="img img-fluid3"><i class="fas fa-angle-right dropdown rotate"></i></a>
            <div class="sub-menu" style="display:block">
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Advertorial</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/tpks-adv-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpks-adv-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Pop-Up</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/tpks-pop-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpks-pop-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Home</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/tpks-bnr-hm-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpks-bnr-hm-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Artikel</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/tpks-bnr-art-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpks-bnr-art-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Rubrik</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/tpks-bnr-rbrk-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpks-bnr-rbrk-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown rotate"></i>Sidebar</a>
                    <div class="sub-menu2" style="display:block">
                      <a class="sub-btn" href="../pages/tpks-sdb-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpks-sdb-dsktp.php" class="sub-item selector">Desktop</a>
                    </div>
            </div>
            <div class="item">
              <a class="sub-btn"><img src="../assets/img/logo-sdb.png" class="img img-fluid2"><i class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Advertorial</a>
                <div class="sub-menu2">
                  <a class="sub-btn" href="../pages/tpkm-adv-mbl.php"></i>Mobile</a>
                  <a href="../pages/tpkm-adv-dsktp.php" class="sub-item">Desktop</a>
                </div>
                <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Pop-Up</a>
                <div class="sub-menu2">
                  <a class="sub-btn" href="../pages/tpkm-pop-mbl.php"></i>Mobile</a>
                  <a href="../pages/tpkm-pop-dsktp.php" class="sub-item">Desktop</a>
                </div>
                <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Home</a>
                <div class="sub-menu2">
                  <a class="sub-btn" href="../pages/tpkm-bnr-hm-mbl.php"></i>Mobile</a>
                  <a href="../pages/tpkm-bnr-hm-dsktp.php" class="sub-item">Desktop</a>
                </div>
                <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Artikel</a>
                <div class="sub-menu2">
                  <a class="sub-btn" href="../pages/tpkm-bnr-art-mbl.php"></i>Mobile</a>
                  <a href="../pages/tpkm-bnr-art-dsktp.php" class="sub-item">Desktop</a>
                </div>
                <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Banner Rubrik</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/tpkm-bnr-rbrk-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpkm-bnr-rbrk-dsktp.php" class="sub-item">Desktop</a>
                    </div>
                    <a class="sub-btn"><i class="fas fa-angle-right dropdown"></i>Sidebar</a>
                    <div class="sub-menu2">
                      <a class="sub-btn" href="../pages/tpkm-sdb-mbl.php"></i>Mobile</a>
                      <a href="../pages/tpkm-sdb-dsktp.php" class="sub-item">Desktop</a>
                    </div>
             </div>
            </div>
         </div>
         </div>
         <script type="text/javascript">
  //jquery for toggle sub menus
  $('.sub-btn').click(function(){
    $(this).next('.sub-menu' ).slideToggle();
    $(this).next('.sub-menu2').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate');
  });

  //jquery for expand and collapse the sidebar
   $('.menu-btn').click(function(){
     $('.side-bar').addClass('active');
     $('.menu-btn').css("visibility", "hidden");
     $('.close-btn').css("visibility", "visible");
   });

  $('.close-btn').click(function(){
    $('.side-bar').removeClass('active');
    $('.menu-btn').css("visibility", "visible");
    $('.close-btn').css("visibility", "hidden");
  });
</script>
     
</body>
</html>