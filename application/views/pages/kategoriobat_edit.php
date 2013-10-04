<?php
if (isset($data_kategori)){
foreach($data_kategori as $row){
?>
    <div id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Edit Kategori Obat</span> </h4>
            </div>
            <div class="content">
              <form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('obat/editKategori')?>">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Kode Kategori</label>
                  <div class="controls span7">
                    <input type="text" required="true" name="kode_satuan" id="kode_satuan" value="<?php echo $row->kode_satuan;?>" class="row-fluid"  readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Kategori</label>
                  <div class="controls span7">
                    <input type="text" required="true" name="satuan" id="satuan" value="<?php echo $row->satuan;?>" class="row-fluid">
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

<?php 
}
}
?>
