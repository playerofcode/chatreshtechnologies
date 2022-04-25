

    <footer class="footer footer-static footer-light navbar-border  navbar-fixed-bottom">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">All Rights Reserved by <strong><?php echo APP_NAME;?></strong>.<span class="float-md-right d-xs-block d-md-inline-block">&nbsp;  <a href="#"><?php echo COPYRIGHT;?></a> & Made with <i class="icon-heart5 pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
     <script>
         CKEDITOR.replace( 'ckeditor' );
    </script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
        $('#my_table').DataTable({
    buttons: [ 'copy', 'csv', 'excel' ]
});
        });
    </script>

    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url('assets/admincss/'); ?>js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL JS-->
    
  </body>
</html>
