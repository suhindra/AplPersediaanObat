<?php
if($this->session->flashdata('message')){
echo "<p><i>".$this->session->flashdata('message')."</i></p>";
}
?>
<?php $post_array = $this->session->userdata('session_data');?>
<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_7">
          <div class="title">
            <h4> <span>Daftar Obat  Kadaluarsa </span> </h4>
          </div>
          <!-- End .title -->
          <?php
    if (isset($data_obat)){
    foreach($data_obat as $row){
    ?>
          <div class="modal hide fade color_7" id="Modal<?php echo $row->id_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="box color_7">
            <div class="title">
              <h4> <i class="icon-random"></i> <span>Perkiraan Kerugian</span> </h4>
            </div>
            <div class="content ">
              <form class="form-horizontal" method="post" action="<?php echo site_url('obatkeluar/deteleObatKadaluarsa')?>">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">Dari Transaksi</label>
                  <div class="controls span9">
		  <input readonly="TRUE" type="text" name="id_transaksi" id="id_transaksi" value="<?php echo $row->id_transaksi?>" class="row-fluid" > 
                  <input readonly="TRUE" type="hidden" name="id_petugas" id="id_transaksi" value="<?php echo $post_array['id_petugas'];?>" class="row-fluid" >
                  <input readonly="TRUE" type="hidden" name="tanggal" id="id_transaksi" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" class="row-fluid" >
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Id Obat</label>
                  <div class="controls span9">
                  <input readonly="TRUE" type="text" name="id_obat" id="jumlah_keluar" value="<?php echo $row->kode_obat?>" class="row-fluid" > 
                  </div>
                </div>                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Jumlah Kadaluarsa</label>
                  <div class="controls span9">
                   <input readonly="TRUE" type="text" name="jumlah" id="harga" value="<?php echo $row->stok?>" class="row-fluid"> 
                  </div>
                </div>
		<div class="form-row control-group row-fluid">
                  <label class="control-label span3">Beban Kerugian per Satuan</label>
                  <div class="controls span9">
                   <input required="TRUE" type="text" name="harga" id="harga" value="" class="row-fluid"> 
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
            <table id="mydata" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
              <thead>
                <tr>
                  <th class="to_hide_phone ue">Id Transaksi</th>
		  <th class="to_hide_phone ue">Kode Obat</th>
                  <th class="">Nama Obat</th>
                  <th class="to_hide_phone span2">Jumlah Kadaluarsa</th>
		  <th class="no_sort span2">Tanggal Kadaluarsa</th>
                  <th class="no_sort span2">Hapus Obat</th>
                </tr>
              </thead>
     <tbody>
	<tr>       
  </tbody>
            </table>
             
          </div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
      
    </div>


