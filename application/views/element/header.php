<?php $post_array = $this->session->userdata('session_data');?>
<div id="main">
  <div class="container">
    <div class="header row-fluid">
      <div class="logo"> <a href="<?php echo base_url()?>index.php/dashboard/index"><span>Beranda</span><span class="icon"></span></a> </div>
      <div class="top_right">
        <ul class="nav nav_menu">
          <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="../../page.html">
            <div class="title"><span class="name"><?php echo $post_array['nama_petugas'];?>(<?php echo $post_array['username'];?>)</span><span class="subtitle"><?php echo $post_array['type'];?></span></div>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              
              <li><a href="<?php echo base_url();?>index.php/user/logout"><i class=" icon-unlock"></i>Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- End top-right --> 
    </div>
    
