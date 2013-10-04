<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_25">
          <div class="title">
            <h4> <span>Jurnal Umum</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
              <div class="form-row control-group row-fluid">
		<div class="form-row control-group row-fluid">
		<label class="control-label span3">Periode</label>
		<div class="controls span3">
		<input type="text" class="row-fluid" name="nama_petugas" value="<?php echo $data_bulan?>-<?php echo $data_tahun?>"  readonly="true">
		</div></div>
		
                  
            <table class="responsive table table-hover" border="3">
                <thead border="3">
                <tr>
		  <th class="to_hide_phone span1">No</th>
                  <th class="to_hide_phone span2">Tanggal Transaksi</th>
		  <th class="to_hide_phone span2">Ref</th>
                  <th class="to_hide_phone span2">Akun</th>
		  <th class="to_hide_phone span1">Kode Akun</th>
	  	  <th class="to_hide_phone span2">Debet</th>
		  <th class="to_hide_phone span2">Kredit</th>
                </tr>
                </thead>
                <tbody border="3">
                <tr>
	<?php
$jum = 1;
$no = 1;
if(!empty($jurnal)){
foreach($jurnal as $jur){
if($jum <= 1) {
?>
		  <td rowspan="<?php echo $jur->jumlah?>"><?php echo $no;?></td>
		  <td rowspan="<?php echo $jur->jumlah?>"><?php echo $jur->tgl_transaksi;?></td>
                  <?php
                  if ($jur->id_transaksimasuk) {
                  ?>
                  <td rowspan="<?php echo $jur->jumlah?>"><?php echo $jur->id_transaksimasuk?></td>
                  <?
                  }
                  elseif ($jur->id_transaksikeluar) {
                  ?>
		  <td rowspan="<?php echo $jur->jumlah?>"><?php echo $jur->id_transaksikeluar?></td>
                  <?
                  }else{
                  ?>
                  <td rowspan="<?php echo $jur->jumlah?>"><?php echo $jur->id_transaksikadaluarsa?></td>
                  <?}?>
                      
                  
<?php
$jum = $jur->jumlah;
}
else{
		 $jum = $jum - 1;
		 $no++;
}
?>
		  <td><?php echo $jur->akun?></td>
		  <td><?php echo $jur->kode_akun?></td>
                  <td class="ms">Rp.<?php echo number_format($jur->debet)?>.00</td>
                  <td class="ms">Rp.<?php echo number_format($jur->kredit)?>.00</td>
		  </tr> 
                  </body>
	<?php }
                    }
                    else {
                    ?>
		<td><?php echo "Tidak ada jurnal";?></td>

<?php
}
?>            
            </table>
	<form action="<?php echo site_url('laporan/cetakJurnalUmum')?>" target="_blank" method="POST">
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


