<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_7">
          <div class="title">
            <h4> <span>Detail Obat <?php echo $nama_obat;?></span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
              <thead>
                <tr>                 
		  <th class="to_hide_phone span3">Dari Transaksi</th>
                  <th class="to_hide_phone span3">Jumlah Masuk</th>
                  <th class="to_hide_phone span3">Sisa Stok</th>
		  <th class="to_hide_phone span3">Tanggal Kadaluarsa</th>
                  
                </tr>
              </thead>
     <tbody>
<?php
if(isset($detail_obat)){
    foreach($detail_obat as $row){
    ?>
		<tr>                 
		  <td><?php echo $row->id_transaksi;?></td>
                  <td><?php echo $row->jumlah_obatmasuk;?></td>
                  <td><?php echo $row->stok;?></td>
		  <td><?php echo $row->tgl_kadaluarsa;?></td>
                  
                </tr>  
<?php
}
}
?>
  </tbody>
            </table>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
      
    </div>


