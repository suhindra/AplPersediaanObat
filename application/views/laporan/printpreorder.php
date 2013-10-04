<table width="100%" align="center">
    <td colspan="11" align="center"></td>
	</tr>
      </tr>
      <tr>
        <td colspan="11" align="center"></td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Preorder Obat</strong> 
        </td>
      </tr>
      <tr> 
        <td colspan="11" align="center" class="style7"><strong> Puskesmas Mantrijeron Yogyakarata</strong> 
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
                  <th class="to_hide_phone ue">Kode Preorder</th>
          	  <th class="to_hide_phone ue">Kode Obat</th>
                  <th class="to_hide_phone ue">Nama Obat</th>
                  <th class="">Jumlah Preorder</th>
		  
                </tr>
		<tr>
	<?php
if(!empty($data_preorder)){
foreach($data_preorder as $row){
?>
                  <td><?php echo $row->id_preorder?></td>  
		  <td><?php echo $row->id_obat?></td>
                  <td><?php echo $row->nama_obat?></td>
                  <td><?php echo $row->jumlah?></td>
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

