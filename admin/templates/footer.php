<footer class="main-footer">
        <div class="footer-left">
          Copyright Tapak Media &copy; 2021
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../assets/vendor/dropify-master/dist/js/dropify.min.js"></script>
  <script src="../assets/vendor/select2/dist/js/select2.min.js"></script>
  <script src="../assets/vendor/lightbox2/dist/js/lightbox.min.js"></script>
  <script src="../assets/vendor/datatable/js/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/vendor/datatable/responsive/js/dataTables.responsive.min.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script>
    $(document).ready(function() {
      $(document).on('click', '#toggle_activity_detail', function() {
          var activity = $(this).data('activity');
          var detail_activity = $(this).data('detailactivity');
          var user = $(this).data('user');
          var ip = $(this).data('ip');
          var date_created = $(this).data('datecreated');

          console.log(activity);

          $('#activity_details').html(activity);
          $('#detail_activity_details').html(detail_activity);
          $('#user_details').html(user);
          $('#ip_details').html(ip);
          $('#date_created_details').html(date_created);
      });
    });
  </script>
</body>
</html>