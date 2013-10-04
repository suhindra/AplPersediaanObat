    <div id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint color_7">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Tambah Data Obat</span> </h4>
            </div>
            <div class="content">
<form class="form-horizontal cmxform" id="validateForm" action="<?php echo site_url('obat/addObat')?>" method="post">
              <form class="form-horizontal row-fluid" action="#">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Kode Obat</label>
                  <div class="controls span7">
                    <input type="text" name="kode_obat" id="kode_obat" value="<?php echo $kode_obat; ?>" class="row-fluid" disabled="disabled" readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field" >Nama Obat </label>
                  <div class="controls span7">
                    <input type="text" name="nama_obat" id="cname" required class="span12">
                  </div>
                </div>
		 <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Kategori</label>
                  <div class="controls span7">
		     <select name="kode_kategori" required="required" data-placeholder="Pilih Kategori..." class="chzn-select">
                       <option value=""></option> 
                        <?php
                        if(isset($data_kategori)){
                            foreach($data_kategori as $sat){
                                ?>
                                <option value="<?php echo $sat->kode_satuan?>"><?php echo $sat->satuan?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
		</div>
                </div>
                <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <button type="submit" id="Add" value="Submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('obat')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <!-- End #container --> 


