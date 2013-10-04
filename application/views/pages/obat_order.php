<?php $post_array = $this->session->userdata('session_data');?>
<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_7">
          <div class="title">
            <h4> <span>Daftar Order Obat</span> </h4>
          </div>
          <!-- End .title -->
          <?php
    if (isset($data_order)){
    foreach($data_order as $row){
    ?>
          <div class="modal hide fade color_7" id="Modal<?php echo $row->kode_obat?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="box color_7">
            <div class="title">
              <h4> <i class="icon-random"></i> <span>Perkiraan Kerugian</span> </h4>
            </div>
            <div class="content ">
              <form class="form-horizontal" method="post" action="<?php echo site_url('preorder/tambahObatToCart')?>">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Id Obat</label>
                  <div class="controls span9">
                  <input readonly="TRUE" type="text" name="id_obat" id="jumlah_keluar" value="<?php echo $row->kode_obat?>" class="row-fluid" >
                  </div>
                </div>                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Jumlah Pemesanan</label>
                  <div class="controls span9">
                   <input required="TRUE" type="text" name="jumlah" id="harga" value="" class="row-fluid"> 
                  </div>
                </div>
		 <button class="btn btn-warning" data-dismiss="modal">Batal</button>
                  <button class="btn btn-success"  type="submit" value="Submit">Tambah</button>
              </form>
            </div>
    
          </div>
        
          </div>
           <?}}?>
          <div class="content top">
            <table class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
           
                <tr>
		  <th class="to_hide_phone ue">Kode Obat</th>
                  <th class="">Nama Obat</th>
		  <th class="">Stok di Gudang</th>
	          <th class="">ROP</th>
		  <th class="">Preorder</th>
                </tr>
		<tr>
	<?php
if(!empty($data_order)){
foreach($data_order as $order){
?>
		  <td><?php echo $order->kode_obat?></td>
		  <td><?php echo $order->nama_obat?></td>
                  <td><?php echo $order->stok;?></td>
                  <td><?php echo $order->rop;?></td>
		  <td><a href="#Modal<?php echo $order->kode_obat?>"  class="btn btn-small"  data-toggle="modal" rel="tooltip" data-placement="left" ><i class="gicon-edit"></i></a></td>
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


