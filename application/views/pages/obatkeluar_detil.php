<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_12">
          <div class="title">
            <h4> <span>Detail Obat Keluar</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
           
                <tr>
		  <th class="to_hide_phone ue">Kode Obat</th>
                  <th class="">Jumlah Keluar</th>
		  <th class="ms">Harga Satuan</th>
                  <th class="ms">Sub Total</th>
                </tr>
		<tr>
	<?php
if(!empty($data_keluardetil)){
foreach($data_keluardetil as $row){
    $sub = $row->jumlah_obatkeluar * $row->harga_obatkeluar ;
?>
		  <td><?php echo $row->kode_obat?></td>
		  <td><?php echo $row->jumlah_obatkeluar?></td>
		  <td class="ms">Rp. <?php echo number_format($row->harga_obatkeluar)?>.00</td>
		  <td class="ms">Rp. <?php echo number_format($sub)?>.00</td>
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


