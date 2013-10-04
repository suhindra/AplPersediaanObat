<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_25">
          <div class="title">
            <h4> <span>Daftar Kode Akun</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
           
                <tr>
		  <th class="to_hide_phone ue">Kode Akun</th>
                  <th class="">Nama Akun</th>
		  <th class="">Edit</th>
                </tr>
		<tr>
	<?php
if(!empty($data_akun)){
foreach($data_akun as $coa){
?>
		  <td><?php echo $coa->kode_akun?></td>
		  <td><?php echo $coa->akun?></td>
		  <td><a href="<?php echo base_url();?>index.php/akun/formEditAkun/<?php echo $coa->kode_akun?>"  class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Edit"><i class="gicon-edit"></i></a></td>
		  </tr>       
	<?php }
}
?>            
	</table>
	
      
	</div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
      
    </div>


