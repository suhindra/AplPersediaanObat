<table width="100%" align="center">
    <td colspan="11" align="center"></td>
	</tr>
      </tr>
      <tr>
        <td colspan="11" align="center"></td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Buku Besar </strong> 
        </td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Puskesmas Mantrijeron Yogyakarata</strong> 
        </td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Periode <?php echo $data_bulan  ?> - <?php echo $data_tahun  ?></strong> 
        </td>
      </tr>
      <tr> 
        <td colspan="11" align="center"><div align="center"> <font size="5"><strong> 
                        </strong> </font></div></td>
      </tr>
      <tr>
        <td><p></p></td>
      </tr>
    </table>

<center>



<p>&nbsp;</p>
<table class="responsive table table-hover">
                <tr>
                    <th class="ms" colspan="7">No akun = 111</th>
                </tr>
            </table>
            <table border='3px' style="width:100%;margin-bottom:0; ">
                <tr>
		  <th rowspan ='2' class="to_hide_phone">No</th>
                  <th rowspan ='2' class="to_hide_phone span1">Tanggal Transaksi</th>
		  <th rowspan ='2' class="to_hide_phone span2">Keterangan</th>
                  <th rowspan ='2' class="to_hide_phone span1">Ref</th>
		  <th rowspan ='2' class="to_hide_phone span2">Debet</th>
	  	  <th rowspan ='2' class="to_hide_phone span2">Kredit</th>
		  <th colspan ='2' class="to_hide_phone span4">Saldo</th>
                </tr>
		<tr>
		  <th class="to_hide_phone span2">Debet</th>
	  	  <th class="to_hide_phone span2">Kredit</th>
		</tr>
		<tr>
	        <td colspan='6'>Saldo Awal</td>
                <?
                
                    $debetKas = 0;
                    $kreditKas = 0;
                    $no=1;
                    if(!empty($saldoKas)){
                    foreach($saldoKas as $salKas){
                        if ($salKas->debet < $salKas->kredit) {
                        $kreditKas=$salKas->kredit - $salKas->debet;
                        $debetKas=0;

                        echo '<td>'.$debetKas.'</td>		 
                              <td>'.$kreditKas.';</td>
                              </tr>';


                        }
                        else {

                                     $debetKas=$salKas->debet - $salKas->kredit;
                                     $kreditKas=0;

                                     echo '<td>'.$debetKas.'</td>		 
                                    <td>'.$kreditKas.'</td>
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
                    if(!empty($jurnalKas)){
                    foreach($jurnalKas as $jur){
                    $no++;
                    if($debetKas>0){
                    if (($debetKas+$jur->debet)-$jur->kredit > 0) {
                        $debetKas=($debetKas+$jur->debet)-$jur->kredit;
                    }
                     elseif (($debetKas+$jur->debet)-$jur->kredit > 0) {
                        $kreditKas=($kreditKas+$jur->kredit)-$jur->debet;    
                    }
                    }
                     else {
                    if (($kreditKas-$jur->debet)+$jur->kredit > 0) {
                        $kreditKas=($kreditKas-$jur->debet)+$jur->kredit;
                    }
                     elseif (($kreditKas-$jur->debet)+$jur->kredit > 0) {
                        $debetKas=($debetKas-$jur->kredit)+$jur->debet;    
                    }  
                    }
                    ?>
		  <td><?php echo $no;?></td>
		  <td><?php echo $jur->tgl_transaksi;?></td>
		  <td></td>		 
		  <td></td>
		  <td><?php echo $jur->debet?></td>
		  <td><?php echo $jur->kredit?></td>
                  <?
                  
                  ?>
                  <td><?  echo $debetKas;?></td>		 
                  <td><?  echo $kreditKas;?></td>		 
		  </tr>       
	<?php }
}

?>            

	</table>
        
	</div>
          
       
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
		  <th rowspan ='2' class="to_hide_phone span2">Keterangan</th>
                  <th rowspan ='2' class="to_hide_phone span1">Ref</th>
		  <th rowspan ='2' class="to_hide_phone span2">Debet</th>
	  	  <th rowspan ='2' class="to_hide_phone span2">Kredit</th>
		  <th colspan ='2' class="to_hide_phone span4">Saldo</th>
                </tr>
		<tr>
		  <th class="to_hide_phone span2">Debet</th>
	  	  <th class="to_hide_phone span2">Kredit</th>
		</tr>
		<tr>
	        <td colspan='6'>Saldo Awal</td>
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
    $kreditPersediaan=0;
}
 elseif (($debetPersediaan+$jur->debet)-$jur->kredit > 0) {
    $kreditPersediaan=($kreditPersediaan+$jur->kredit)-$jur->debet;    
    $debetPersediaan=0;
}

}
 elseif($kreditPersediaan>0) {
if (($kreditPersediaan-$jur->debet)+$jur->kredit > 0) {
    $kreditPersediaan=($kreditPersediaan-$jur->debet)+$jur->kredit;
    $debetPersediaan=0;
}
 elseif (($kreditPersediaan+$jur->debet)+$jur->kredit > 0) {
    $debetPersediaan=($debetPersediaan-$jur->kredit)+$jur->debet;
    $kreditPersediaan=0;
 
}  

}
else {
    $debetPersediaan=0;
    $kreditPersediaan=0;
 
}
?>
		  <td><?php echo $no;?></td>
		  <td><?php echo $jur->tgl_transaksi;?></td>
		  <td></td>		 
		  <td></td>
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
          
        
          <div class="content top">
              <table class="responsive table table-hover">
                <tr>
                    <th class="ms" colspan="7">No akun = 511</th>
                </tr>
            </table>
            <table border='3px' style="width:100%;margin-bottom:0; ">
           
                <tr>
		  <th rowspan ='2' class="to_hide_phone">No</th>
                  <th rowspan ='2' class="to_hide_phone span1">Tanggal Transaksi</th>
		  <th rowspan ='2' class="to_hide_phone span2">Keterangan</th>
                  <th rowspan ='2' class="to_hide_phone span1">Ref</th>
		  <th rowspan ='2' class="to_hide_phone span2">Debet</th>
	  	  <th rowspan ='2' class="to_hide_phone span2">Kredit</th>
		  <th colspan ='2' class="to_hide_phone span4">Saldo</th>
                </tr>
		<tr>
		  <th class="to_hide_phone span2">Debet</th>
	  	  <th class="to_hide_phone span2">Kredit</th>
		</tr>
		<tr>
	        <td colspan='6'>Saldo Awal</td>
                <?
                
$debet = 0;
$kredit = 0;
$no=1;
if(!empty($saldoBeban)){
foreach($saldoBeban as $sal){
    if ($sal->debet < $sal->kredit) {
    $kredit=$sal->kredit - $sal->debet;
    $debet=0;

    echo '<td>'.$debet.'</td>		 
          <td>'.$kredit.';</td>
          </tr>';
              
                
    }
    else {

                 $debet=$sal->debet - $sal->kredit;
                 $kredit=0;

                 echo '<td>'.$debet.'</td>		 
		<td>'.$kredit.'</td>
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
if(!empty($jurnalBeban)){
foreach($jurnalBeban as $jur){
$no++;
if ($debet-$jur->kredit > 0) {
    $debet=($debet+$jur->debet)-$jur->kredit;
}
 else {
    $kredit=($kredit+$jur->kredit)-$jur->debet;    
}
?>
		  <td><?php echo $no;?></td>
		  <td><?php echo $jur->tgl_transaksi;?></td>
		  <td></td>		 
		  <td></td>
		  <td><?php echo $jur->debet?></td>
		  <td><?php echo $jur->kredit?></td>
                  <?
                  
                  ?>
                  <td><?  echo $debet;?></td>		 
                  <td><?  echo $kredit;?></td>		 
		  </tr>       
	<?php }
}

?>            

	</table>
</center>
<br>

<table width="100%" align="center">

  <tr>
  <td colspan="2" align="center">
  <p>
  <input name="button" type="button" onclick="window.print()" value="Print This Page" />
</p></td>
</tr>
  </table>

