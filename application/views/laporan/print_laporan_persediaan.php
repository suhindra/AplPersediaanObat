<table width="100%" align="center">
    <td colspan="11" align="center"></td>
	</tr>
      </tr>
      <tr>
        <td colspan="11" align="center"></td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Laporan Persediaan Barang</strong> 
        </td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Puskesmas Mantrijeron Yogyakarata</strong> 
        </td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Periode <?php echo isset($date) ? $date : date('d-m-Y')?></strong> 
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
    <th width="25%">Kode Obat</th>
    <th width="25%">Nama Obat </th>
    <th width="25%">Stok </th>
    <th width="25%">Satuan</th>
  </tr>

    <?php
if(!empty($data_persediaan)){
foreach($data_persediaan as $pers){
?>
  
			
					  </tr>
		  	<tr bgcolor=#b7ccfc >
			<td align="center"><?php echo $pers->kode_obat?></td>
			<td align="center"><?php echo $pers->nama_obat?></td>
			<td align="center"><?php echo $pers->stok?></td>
			<td><?php echo $pers->kode_satuan?></td>
					  </tr>
		  		<?php 
}
}
?>
		   <tr>
   <td>&nbsp;</td>
     </tr>
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

