
<form name="form1" class="form-horizontal row-fluid" action="<?php echo site_url('supplier/addSupplier')?>" method="post">
    <div id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint color_8">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Tambah Data Supplier</span> </h4>
            </div>
            <div class="content">
              <form class="form-horizontal row-fluid" action="#">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">id Supplier</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="id_supplier" id="id_supplier" value="<?php echo $id_supplier; ?>" class="row-fluid" readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Nama Supplier</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="nama_supplier" id="nama_supplier" class="row-fluid">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Alamat Supplier</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="alamat_supplier" id="alamat_supplier" class="row-fluid">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">No Telepon</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="no_telp" id="no_telp" class="row-fluid">
                  </div>
                </div>
                <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <button type="submit" id="Add" value="Submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('supplier/index')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <!-- End #container --> 


