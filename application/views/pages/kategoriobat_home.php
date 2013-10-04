<?php
if($this->session->flashdata('message')){
echo "<p><i>".$this->session->flashdata('message')."</i></p>";
}
?>

<div id="main_container">
      <div class="row-fluid">
        <div class="box ">
          <div class="title">
            <h4> <span>Daftar Kategori</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table id="mydata" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
              <thead>
                <tr>
                 
		  <th class="to_hide_phone ue">Kode Kategori</th>
                  <th class="">Kategori</th>
                  <th  class="no_sort " >Aksi</th>
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


