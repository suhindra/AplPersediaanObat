<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_25">
          <div class="title">
            <h4> <span>Persedian Obat</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
           
                <tr>
		  <th class="to_hide_phone ue">Kode Obat</th>
                  <th class="">Nama Obat</th>
                  <th class="to_hide_phone span2">Stok</th>
		  <th class="to_hide_phone span2">Satuan</th>
                </tr>
		<tr>
	<?php
if(!empty($data_persediaan)){
foreach($data_persediaan as $pers){
?>
		  <td><?php echo $pers->kode_obat?></td>
		  <td><?php echo $pers->nama_obat?></td>
		  <td><?php echo $pers->stok?></td>
		  <td><?php echo $pers->satuan?></td>
		</tr>       
	<?php }
}
?>            
	</table>
	<button class="btn btn-success">
	<?php echo anchor('laporan/cetakLaporanPersediaan/','Print', array('target' => '_blank')); ?> 
        </button> 
      
	</div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
      
    </div>


