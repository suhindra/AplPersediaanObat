
<div id="sidebar" class="">
  <div class="scrollbar">
    <div class="track">
      <div class="thumb">
        <div class="end"></div>
      </div>
    </div>
  </div>
  <div class="viewport ">
    <div class="overview collapse">
      <div class="search row-fluid container">
        
      </div>
      <ul id="sidebar_menu" class="navbar nav nav-list container full">
        <li class="accordion-group active color_4"> <a class="dashboard " href="<?php echo base_url()?>index.php/dashboard/index"><img src="<?php echo base_url();?>asset/img/menu_icons/dashboard.png"><span>Main Menu</span></a> </li>
        <li class="accordion-group color_7"> <a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse1"> <img src="<?php echo base_url();?>asset/img/menu_icons/forms.png"><span>Obat</span></a>
          <ul id="collapse1" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/obat/index">Daftar Obat</a></li>
            <li><a href="<?php echo base_url()?>index.php/obat/formAddObat">Input Obat Baru</a></li>
	    <li><a href="<?php echo base_url()?>index.php/obat/kategori">Daftar Kategori Obat</a></li>
            <li><a href="<?php echo base_url()?>index.php/obat/formAddKategori">Input Kategori Obat</a></li>
	    <li><a href="<?php echo base_url()?>index.php/obat/obatKadaluarsa">Obat Kadaluarsa</a></li>
	    <li><a href="<?php echo base_url()?>index.php/obat/obatOrder">Daftar Reorder Obat</a></li>
            <li><a href="<?php echo base_url()?>index.php/preorder/formAddPreorder">Preorder Obat</a></li>
            <li><a href="<?php echo base_url()?>index.php/preorder/index">Daftar Preorder Obat</a></li>
          </ul>
        </li>
        <li class="accordion-group color_3"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse2"> <img src="<?php echo base_url();?>asset/img/menu_icons/widgets.png"><span>Obat Masuk</span></a>
          <ul id="collapse2" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/obatmasuk/index">Daftar Obat Masuk</a></li>
            <li><a href="<?php echo base_url()?>index.php/obatmasuk/formAddObatMasuk">Input Obat Masuk</a></li>
	    </ul>
        </li>
     
        <li class="accordion-group color_12"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse3"> <img src="<?php echo base_url();?>asset/img/menu_icons/widgets.png"><span>Obat Keluar</span></a>
          <ul id="collapse3" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/obatkeluar/index">Daftar Obat Keluar</a></li>
            <li><a href="<?php echo base_url()?>index.php/obatkeluar/formAddObatKeluar">Input Obat Keluar</a></li>
          </ul>
        </li>
        <li class="accordion-group color_24"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse4"> <img src="<?php echo base_url();?>asset/img/menu_icons/grid.png"><span>SMS Gateway</span></a> 
        <ul id="collapse4" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/smsgateway/inbox">Inbox</a></li>
            <li><a href="<?php echo base_url()?>index.php/smsgateway/outbox">Outbox</a></li>
            <li><a href="<?php echo base_url()?>index.php/smsgateway/sentItems">SMS Terkirim</a></li>
          </ul>
          </li>
         <li class="accordion-group color_13"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse10"> <img src="<?php echo base_url();?>asset/img/general/contacts_icon.png"><span>Pendaftaran</span></a>
          <ul id="collapse10" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/pendaftaran/index">Daftar Pendaftaran</a></li>
            <li><a href="<?php echo base_url()?>index.php/pendaftaran/formAddPendaftaran">Tambah Pendaftaran</a></li>
          </ul>
        </li>
        <li class="accordion-group color_6"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse7"> <img src="<?php echo base_url();?>asset/img/general/contacts_icon.png"><span>Petugas</span></a>
          <ul id="collapse7" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/petugas/index">Daftar Petugas</a></li>
            <li><a href="<?php echo base_url()?>index.php/petugas/formAddPetugas">Tambah Petugas</a></li>
          </ul>
        </li>
	<li class="accordion-group color_10"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse9"> <img src="<?php echo base_url();?>asset/img/general/contacts_icon.png"><span>Pasien</span></a>
          <ul id="collapse9" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/pasien/index">Daftar Pasien</a></li>
            <li><a href="<?php echo base_url()?>index.php/pasien/formAddPasien">Tambah Pasien</a></li>
          </ul>
        </li>


 	<li class="accordion-group color_8"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse8"> <img src="<?php echo base_url();?>asset/img/general/contacts_icon.png"><span>Supplier</span></a>
          <ul id="collapse8" class="accordion-body collapse">
            <li><a href="<?php echo base_url()?>index.php/supplier/index">Daftar Supplier</a></li>
            <li><a href="<?php echo base_url()?>index.php/supplier/formAddSupplier">Tambah Supplier</a></li>
          </ul>
        </li>

        <li class="accordion-group color_25"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse5"> <img src="<?php echo base_url();?>asset/img/menu_icons/others.png"><span>Laporan</span></a>
          <ul id="collapse5" class="accordion-body collapse">
	    <li><a href="<?php echo base_url()?>index.php/akun/index">Akun</a></li>
            <li><a data-toggle="modal" href="#pilihJurnal">Jurnal Umum</a></li>
            <li><a data-toggle="modal" href="#pilihBukuBesar">Buku Besar</a></li>
            <li><a href="<?php echo base_url()?>index.php/laporan/viewLaporanPersediaan">Laporan Persediaan</a></li>
	    <li><a data-toggle="modal" href="#pilihObatMasuk">Laporan Obat Masuk</a></li>
            <li><a data-toggle="modal" href="#pilihObatKeluar">Laporan Obat Keluar</a></li>  
          </ul>
        </li>
      </ul>
      <div class="menu_states row-fluid container ">
        <h2 class="pull-left">Pengaturan Menu</h2>
        <div class="options pull-right">
          <button id="menu_state_1" class="color_4" rel="tooltip" data-state ="sidebar_icons" data-placement="top" data-original-title="Icon Menu">1</button>
          <button id="menu_state_2" class="color_4 active" rel="tooltip" data-state ="sidebar_default" data-placement="top" data-original-title="Fixed Menu">2</button>
          <button id="menu_state_3" class="color_4" rel="tooltip" data-placement="top" data-state ="sidebar_hover" data-original-title="Floating on Hover Menu">3</button>
        </div>
      </div>
      <!-- End sidebar_box --> 
      
    </div>
  </div>
</div>
