<!-- Data tables plugin --> 
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>asset/js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="<?php echo base_url();?>asset/js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/
  // Datatables
		

    $(document).ready(function() {
      var dontSort = [];
                $('#mydata thead th').each( function () {
                    if ( $(this).hasClass( 'no_sort' )) {
                        dontSort.push( { "bSortable": false } );
                    } else {
                        dontSort.push( null );
                    }
      } );
      $('#mydata').dataTable( {

    
        "sDom": "<'row-fluid table_top_bar'<'span12'<'to_hide_phone' f>>>t<'row-fluid control-group full top' <'span4 to_hide_tablet'l><'span8 pagination'p>>",
         "aaSorting": [[ 1, "asc" ]],

        "bJQueryUI": false,
	'iCookieDuration': 60,
        'bStateSave'     : true,
        'bServerSide'    : true,
        'bAutoWidth'     : true,
        'sPaginationType': 'full_numbers',
        'sAjaxSource'    : '<?php echo base_url();?>index.php/petugas/getList',
        'aoColumns'      :
      [

        {'sName' : 'id_petugas' },
        {'sName' : 'nama_petugas' },
  	{'sName' : 'username' },
	{'sName' : 'type' },
	{'sName' : 'no_hp' },
	{'sName' : 'sms_gateway' },
	{'sName' : 'aksi'}

      ],
      'aoColumns': dontSort,
      'fnServerData': function(sSource, aoData, fnCallback)
      {
        $.ajax
        ({
          'dataType': 'json',
          'type'    : 'POST',
          'url'     : sSource,
          'data'    : aoData,
          'success' : fnCallback
        });
      }
	
	
        
      } );
      $.extend( $.fn.dataTableExt.oStdClasses, {
        "s`": "dataTables_wrapper form-inline"
      } );

       $(".chzn-select, .dataTables_length select").chosen({
                   disable_search_threshold: 10

        });
    });
  

</script>
</body>
</html>
