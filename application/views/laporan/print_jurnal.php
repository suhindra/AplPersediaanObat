<table width="100%" align="center">
    <td colspan="11" align="center"></td>
	</tr>
      </tr>
      <tr>
        <td colspan="11" align="center"></td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Jurnal Umum</strong> 
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
<table  border="true" cellpadding="2" cellspacing="1" bgcolor="#82A1D9" width="80%">
  
                <tr>
                  <th class="to_hide_phone span2">Tanggal Transaksi</th>
		  <th class="to_hide_phone span2">Ref</th>
                  <th class="to_hide_phone span2">Akun</th>
		  <th class="to_hide_phone span2">Kode Akun</th>
	  	  <th class="to_hide_phone span2">Debet</th>
		  <th class="to_hide_phone span2">Kredit</th>
                </tr>
		<tr>
	<?php
$jum = 1;
if(!empty($jurnal)){
foreach($jurnal as $jur){
if($jum <= 1) {?>

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
}
?>
		  <td><?php echo $jur->akun?></td>
		  <td><?php echo $jur->kode_akun?></td>
		  <td><?php echo $jur->debet?></td>
		  <td><?php echo $jur->kredit?></td>
		  </tr>       
	<?php }
}
else {
?>
		<td><?php echo "Tidak ada jurnal";?></td>

<?php
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

