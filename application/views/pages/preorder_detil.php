<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_7">
          <div class="title">
            <h4> <span>Detail OPreorder</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
           
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
	
      
	</div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
      
    </div>


