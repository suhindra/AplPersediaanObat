<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_25">
          <div class="title">
            <h4> <span>Buku Besar</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <div class="form-row control-group row-fluid">
		<label class="control-label span3">Periode</label>
		<div class="controls span3">
		<input type="text" class="row-fluid" name="nama_petugas" value="<?php echo $data_bulan;?> - <?php echo $data_tahun?>" readonly="true">
		</div></div>
              
             <div class="content top">
              <table class="responsive table table-hover">
                <tr>
                    <th class="ms" colspan="7">No akun = 112</th>
                </tr>
            </table>
            <table border='3px' style="width:100%;margin-bottom:0; ">
           
                <tr>
		  <th rowspan ='2' class="to_hide_phone">No</th>
                  <th rowspan ='2' class="to_hide_phone span1">Tanggal Transaksi</th>
		  <th rowspan ='2' class="to_hide_phone span2">Ref</th>
		  <th rowspan ='2' class="to_hide_phone span2">Debet</th>
	  	  <th rowspan ='2' class="to_hide_phone span2">Kredit</th>
		  <th colspan ='2' class="to_hide_phone span4">Saldo</th>
                </tr>
		<tr>
		  <th class="to_hide_phone span2">Debet</th>
	  	  <th class="to_hide_phone span2">Kredit</th>
		</tr>
		<tr>
	        <td colspan='5'>Saldo Awal</td>
                <?
                
$debetPersediaan = 0;
$kreditPersediaan = 0;
$no=1;
if(!empty($saldoPersediaan)){
foreach($saldoPersediaan as $salPersediaan){
    if ($salPersediaan->debet < $salPersediaan->kredit) {
    $kreditPersediaan=$salPersediaan->kredit - $salPersediaan->debet;
    $debetPersediaan=0;

    echo '<td>'.$debetPersediaan.'</td>		 
          <td>'.$kreditPersediaan.'</td>
          </tr>';
              
                
    }
    else {

                 $debetPersediaan=$salPersediaan->debet - $salPersediaan->kredit;
                 $kreditPersediaan=0;

                 echo '<td>'.$debetPersediaan.'</td>		 
		<td>'.$kreditPersediaan.'</td>
		 </tr>';
              
                 
                 
                 
    }
}
}
else {
    echo '<td>0</td>		 
          <td>0</td>
	  </tr>';
    
}
         
$no=0;
if(!empty($jurnalPersediaan)){
foreach($jurnalPersediaan as $jur){
$no++;
if($debetPersediaan>0){
    if (($debetPersediaan+$jur->debet)-$jur->kredit > 0) {
    $debetPersediaan=($debetPersediaan+$jur->debet)-$jur->kredit;
  
}
    elseif (($debetPersediaan+$jur->debet)-$jur->kredit > 0) {
    $kreditPersediaan=($kreditPersediaan+$jur->kredit)-$jur->debet;    
 
}

}
 elseif($kreditPersediaan>0) {
if (($kreditPersediaan-$jur->debet)+$jur->kredit > 0) {
    $kreditPersediaan=($kreditPersediaan-$jur->debet)+$jur->kredit;
   
}
 elseif (($kreditPersediaan+$jur->debet)+$jur->kredit > 0) {
    $debetPersediaan=($debetPersediaan-$jur->kredit)+$jur->debet;

 
}  

}
else{
    $debetPersediaan=$jur->debet;
    $kreditPersediaan=$jur->kredit;
 
}
?>
		  <td><?php echo $no;?></td>
		  <td><?php echo $jur->tgl_transaksi;?></td>
		  <?php
                  if ($jur->id_transaksimasuk) {
                  ?>
                  <td rowspan=""><?php echo $jur->id_transaksimasuk?></td>
                  <?
                  }
                  elseif ($jur->id_transaksikeluar) {
                  ?>
		  <td ><?php echo $jur->id_transaksikeluar?></td>
                  <?
                  }else{
                  ?>
                  <td><?php echo $jur->id_transaksikadaluarsa?></td>
                  <?}?>                      
                  	  
		  <td><?php echo $jur->debet?></td>
		  <td><?php echo $jur->kredit?></td>
                  <?
                  
                  ?>
                  <td><?  echo $debetPersediaan;?></td>		 
                  <td><?  echo $kreditPersediaan;?></td>		 
		  </tr>       
	<?php }
}

?>            

	</table>
        
	</div>
            <table class="responsive table table-hover">
                <tr>
                    <th class="ms" colspan="7">No akun = 113</th>
                </tr>
            </table>
            <table border='3px' style="width:100%;margin-bottom:0; ">
                <tr>
		  <th rowspan ='2' class="to_hide_phone">No</th>
                  <th rowspan ='2' class="to_hide_phone span1">Tanggal Transaksi</th>
		  <th rowspan ='2' class="to_hide_phone span2">Ref</th>
		  <th rowspan ='2' class="to_hide_phone span2">Debet</th>
	  	  <th rowspan ='2' class="to_hide_phone span2">Kredit</th>
		  <th colspan ='2' class="to_hide_phone span4">Saldo</th>
                </tr>
		<tr>
		  <th class="to_hide_phone span2">Debet</th>
	  	  <th class="to_hide_phone span2">Kredit</th>
		</tr>
		<tr>
	        <td colspan='5'>Saldo Awal</td>
                <?
                
                    $debetTip = 0;
                    $kreditTip = 0;
                    $no=1;
                    if(!empty($saldoTitipan)){
                    foreach($saldoTitipan as $salTip){
                        if ($salTip->debet < $salTip->kredit) {
                        $kreditTip=$salTip->kredit - $salTip->debet;
                        $debetTip=0;

                        echo '<td>'.$debetTip.'</td>		 
                              <td>'.$kreditTip.';</td>
                              </tr>';


                        }
                        else {

                                     $debetTip=$salTip->debet - $salTip->kredit;
                                     $kreditTip=0;

                                     echo '<td>'.$debetTip.'</td>		 
                                    <td>'.$kreditTip.'</td>
                                     </tr>';
                        }
                    }
                    }
                    else {
                        echo '<td>0</td>		 
                              <td>0</td>
                              </tr>';

                    }

                    $no=0;
                    if(!empty($jurnalTitipan)){
                    foreach($jurnalTitipan as $jur){
                    $no++;
                    if($debetTip>0){
                        if (($debetTip+$jur->debet)-$jur->kredit > 0) {
                        $debetTip=($debetTip+$jur->debet)-$jur->kredit;

                    }
                        elseif (($debetTip+$jur->debet)-$jur->kredit > 0) {
                        $kreditTip=($kreditTip+$jur->kredit)-$jur->debet;    

                    }

                    }
                     elseif($kreditTip>0) {
                    if (($kreditTip-$jur->debet)+$jur->kredit > 0) {
                        $kreditTip=($kreditTip-$jur->debet)+$jur->kredit;

                    }
                     elseif (($kreditTip+$jur->debet)+$jur->kredit > 0) {
                        $debetPersediaan=($debetTip-$jur->kredit)+$jur->debet;


                    }  

                    }
                    else{
                        $debetTip=$jur->debet;
                        $kreditTip=$jur->kredit;

                    }
                    ?>
                    
		  <td><?php echo $no;?></td>
		  <td><?php echo $jur->tgl_transaksi;?></td>
		  <?php
                  if ($jur->id_transaksimasuk) {
                  ?>
                  <td rowspan=""><?php echo $jur->id_transaksimasuk?></td>
                  <?
                  }
                  elseif ($jur->id_transaksikeluar) {
                  ?>
		  <td ><?php echo $jur->id_transaksikeluar?></td>
                  <?
                  }else{
                  ?>
                  <td><?php echo $jur->id_transaksikadaluarsa?></td>
                  <?}?>
		  <td><?php echo $jur->debet?></td>
		  <td><?php echo $jur->kredit?></td>
                  <?
                  
                  ?>
                  <td><?  echo $debetTip;?></td>		 
                  <td><?  echo $kreditTip;?></td>		 
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


