
<!-- Custom made scripts for this template --> 
<script src="<?php echo base_url();?>asset/js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/
 $(document).ready(function () {
      
        // Chosen select plugin
        $(".chzn-select").chosen({
          disable_search_threshold: 10
        });
     
       // Datepicker
        $('#datepicker1').datepicker({
          format: 'mm-dd-yyyy'
        });
        $('#tgl_transaksi').datepicker();
	$('#tgl_kadaluarsa').datepicker();
        $('.colorpicker').colorpicker()
        $('#colorpicker3').colorpicker();


    });


</script>
</body>
</html>
