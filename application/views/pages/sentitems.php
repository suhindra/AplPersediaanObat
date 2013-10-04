<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
if($this->session->flashdata('message')){
echo "<p><i>".$this->session->flashdata('message')."</i></p>";
}
?>

<div id="main_container">
      <div class="row-fluid">
        <div class="box box paint color_24">
          <div class="title">
            <h4> <span>Sms Terkirim</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table id="mydata" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
              <thead>
                <tr>
                 
		  <th width="5%" class="to_hide_phone ue">Id</th>
                  <th width="15%" class="to_hide_phone ue">Nomor Hp</th>
                  <th class="to_hide_phone ue">Pesan</th>
                  <th width="20%" class="to_hide_phone ue">Terkirim</th>
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


