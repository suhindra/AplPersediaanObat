
    <div id="main_container">
      <div class="row-fluid">
        <div class="span6 ">
        <div class="box color_3 title_big height_big paint_hover">
          <div class="title">
            <div class="row-fluid">
              <div class="span12">
	      <h4 > </i><span>Stok Obat</span> </h4>
              </div>
              <!-- End .span12 --> 
            </div>
            <!-- End .row-fluid --> 
            
          </div>
          <!-- End .title -->
          <div class="content"  style="padding-top:35px;">
            <div id="placeholder" style="width:100%;height:240px;"> </div>
          </div>
          </div>
        </div>
        <!-- End .box .span6-->
        <div class="span6">
          <div class="row-fluid fluid">
            <div class="span6">
              <div class=" box color_7 height_medium paint_hover">
                <div class="content icon big_icon"> <a href="<?php echo base_url()?>index.php/obat/index" ><img align="center" src="<?php echo base_url();?>asset/img/general/contacts_icon1.png" /></a>
                  <div class="description">Daftar Obat</div>
                </div>
              </div>
            </div>
            <!-- End .span6 -->
            <div class="span6">
              <div class=" box color_6 height_medium paint_hover">
                <div class="content icon big_icon"> <a href="<?php echo base_url()?>index.php/petugas/index" ><img align="center" src="<?php echo base_url();?>asset/img/general/contacts_icon1.png" /></a>
                  <div class="description">Daftar Petugas</div>
                </div>
              </div>
            </div>
            <!-- End .span6 --> 
          </div>
          <!-- End .row-fluid -->
          <div class="row-fluid fluid">
            <div class="span6">
              <div class=" box color_10 height_medium paint_hover">
                <div class="content icon big_icon"> <a href="<?php echo base_url()?>index.php/pasien/index" ><img align="center" src="<?php echo base_url();?>asset/img/general/contacts_icon1.png" /></a>
                  <div class="description">Daftar Pasien</div>
                </div>
              </div>
            </div>
            <!-- End .span6 -->
            <div class="span6">
              <div class=" box color_8 height_medium paint_hover">
                <div class="content icon big_icon"> <a href="<?php echo base_url()?>index.php/supplier/index" ><img align="center" src="<?php echo base_url();?>asset/img/general/contacts_icon1.png" /></a>
                  <div class="description">Daftar Supplier</div>
                </div>
              </div>
            </div>
            <!-- End .span6 --> 
          </div>
          <!-- End .row-fluid --> 
          
        </div>
        <!-- End.span6--> 
      </div>
      <!-- End .row-fluid -->
      
      <div class="row-fluid">
          <div class="box height_big paint">
            <div class="title">
              <h4> <span>Pemberitahuan</span> </h4>
            </div>
            <!-- End .title -->
            <div class="content full">
              <table class="responsive table table-hover full">
                <thead>
                  <tr>
                    <th colspan='2' class="ue"> Pemberitahuan </th>
                    <th class="ms no_sort "> Lihat </th>
                  </tr>
                </thead>
                <tbody>
		<tr>
		<?php
if ( !empty($data_kadaluarsa) || !empty($data_order)  ){
if(!empty($data_kadaluarsa)){
?>
		  
		  <td colspan='2' class="ue"><?php echo "Obat kadaluarsa"; if(!empty($jumlah_kadaluarsa)){
foreach($jumlah_kadaluarsa as $kadaluarsa){ echo "  ($kadaluarsa->jumlah)";}}?></td>
		  <td class="ms no_sort "><a href="<?php echo base_url()?>index.php/obat/obatKadaluarsa"  class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" lihat "><i class="gicon-eye-open"></i></a></td>
		  </tr>
<?php } 
if(!empty($data_order)){
?>
		  <tr>
		  <td colspan='2' class="ue"><?php echo "Obat harus dipesan kembali"; if(!empty($jumlah_reorder)){
foreach($jumlah_reorder as $order){ echo "  ($order->jumlah)";}} ?> </td>
		  <td class="ms no_sort "><a href="<?php echo base_url()?>index.php/obat/obatOrder"  class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><i class="gicon-eye-open"></i></a></td>
		  </tr>
<?php } }
else {
?>
                   <tr>
		   <td colspan='3'>Tidak Ada Pemberitahuan <i class="gicon-info-sign icon-white"></i></td>
		   </tr>
<?php } 

?>
                </tbody>
              </table>
            </div>
            <!-- End .content -->
           
          </div>
          
          <!-- End .box --> 
        </div>
        <!-- End .span8 -->      
      </div>
      <!-- End .row-fluid --> 
    <!-- End #container --> 
  </div>

