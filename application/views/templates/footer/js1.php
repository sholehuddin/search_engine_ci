<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    </div><!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?=base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- PACE -->
    <script src="<?=base_url('assets/bower_components/PACE/pace.min.js')?>"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/dist/js/demo.js')?>"></script>
    <!-- page script -->
    <script type="text/javascript">
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() { Pace.restart(); });
        //Popup
        function popupsession(url) {
            newwindow=window.open(url,'name','height=575,width=625');
            if (window.focus) {newwindow.focus()}
            return false;
        }
    </script>