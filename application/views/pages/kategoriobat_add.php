    <div align="center" id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Tambah Data Kategori</span> </h4>
            </div>
            <div class="content">
<form name="form1" class="form-horizontal row-fluid" action="<?php echo site_url('obat/addKategori')?>" method="post">
              <form class="form-horizontal row-fluid" action="#">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Kode Kategori</label>
                  <div class="controls span7">
                    <input type="text" required="true" name="kode_satuan" id="kode_satuan" value="<?php echo $kode_satuan; ?>" class="row-fluid" disabled="disabled" readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Nama Kategori</label>
                  <div class="controls span7">
                    <input type="text" required="true" name="satuan" id="satuan" class="row-fluid">
                  </div>
                </div>
                <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <button type="submit" id="Add" value="Submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('obat/kategori')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <!-- End #container --> 


