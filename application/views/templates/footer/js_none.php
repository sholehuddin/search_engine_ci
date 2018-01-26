<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <!-- page specific plugin scripts -->
		<!-- Select2 -->
		<script src="<?=base_url('assets/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
        <!-- inline scripts related to this page -->
		<script>
		  $(function () {
		    //Initialize Select2 Elements
		    $(".select2").select2();
		  });
		</script>
    </body>
</html>