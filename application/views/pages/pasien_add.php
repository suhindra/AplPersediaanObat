
<form name="form1" class="form-horizontal row-fluid" action="<?php echo site_url('pasien/addPasien')?>" method="post">
    <div id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint color_10">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Tambah Data Pasien</span> </h4>
            </div>
            <div class="content">
              <form class="form-horizontal row-fluid" action="#">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Id Pasien</label>
                  <div class="controls span7">
                    <input type="text" name="id_pasien" id="id_pasien" value="<?php echo $id_pasien; ?>" class="row-fluid" readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Nama Pasien</label>
                  <div class="controls span7">
                    <input type="text" name="nama_pasien" id="nama_pasien" class="row-fluid">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Alamat Pasien</label>
                  <div class="controls span7">
                    <input type="text" name="alamat_pasien" id="alamat_pasien" class="row-fluid">
                  </div>
                </div>
                <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <button type="submit" id="Add" value="Submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('pasien/index')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <!-- End #container --> 


