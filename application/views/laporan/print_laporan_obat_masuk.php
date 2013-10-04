<table width="100%" align="center">
    <td colspan="11" align="center"></td>
	</tr>
      </tr>
      <tr>
        <td colspan="11" align="center"></td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Laporan Obat Masuk</strong> 
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
		  <th>Tanggal Transaksi</th>
		  <th class="to_hide_phone ue">Id Transaksi</th>
                  <th class="">Nama Obat</th>
                  <th class="to_hide_phone span2">Jumlah Masuk</th>
		  <th class="to_hide_phone span2">Satuan</th>
                </tr>
		<tr>
	<?php
if(!empty($data_obatmasuk)){
foreach($data_obatmasuk as $pers){
?>
		  <td><?php echo $pers->tgl_transaksi?></td>
		  <td><?php echo $pers->id_transaksi?></td>
		  <td><?php echo $pers->nama_obat?></td>
		  <td><?php echo $pers->jumlah_obatmasuk?></td>
		  <td><?php echo $pers->satuan?></td>
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

