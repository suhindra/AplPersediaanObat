<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_25">
          <div class="title">
            <h4> <span>Laporan Obat Keluar</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
           
                <tr>
		  <th class="to_hide_phone ue">Tanggal Transaksi</th>
		  <th class="to_hide_phone ue">Id Transaksi</th>
                  <th class="">Nama Obat</th>
                  <th class="to_hide_phone span2">Jumlah Keluar</th>
		  <th class="to_hide_phone span2">Satuan</th>
                </tr>
		<tr>
	<?php
if(!empty($data_obatkeluar)){
foreach($data_obatkeluar as $pers){
?>
		  <td><?php echo $pers->tgl_transaksi?></td>
		  <td><?php echo $pers->id_transaksi?></td>
		  <td><?php echo $pers->nama_obat?></td>
		  <td><?php echo $pers->jumlah_obatkeluar?></td>
		  <td><?php echo $pers->satuan?></td>
		</tr>       
	<?php }
}
?>            
	</table>
	<form action="<?php echo site_url('laporan/cetakLaporanObatKeluar')?>" target="_blank" method="POST">
	<input type='hidden' name='bulan' value="<?php echo $data_bulan?>">
	<input type='hidden' name='tahun' value="<?php echo $data_tahun?>">
	 <button type="submit" id="print" value="Submit" class="btn btn-primary">Print</button>
      	</form>
      
	</div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
      
    </div>


