<?php
if (isset($data_obat)){
foreach($data_obat as $row){
?>
    <div id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint color_7">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Edit Data Obat</span> </h4>
            </div>
            <div class="content">
              <form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('obat/editObat')?>">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Kode Obat</label>
                  <div class="controls span7">
                    <input type="text" name="kode_obat" id="kode_obat" value="<?php echo $row->kode_obat;?>" class="row-fluid"  readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Nama Obat</label>
                  <div class="controls span7">
                    <input type="text" name="nama_obat" id="nama_obat" value="<?php echo $row->nama_obat;?>" class="row-fluid">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Kategori</label>
                  <div class="controls span7">
		     <select required="true" name="kode_kategori" data-placeholder="Edit Kategori..." required class="chzn-select">
                       <option value="<?php echo $row->kode_satuan;?>"></option> 
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
                    <a href="<?php echo site_url('obat/index')?>" class="btn btn-danger">Batal</a>
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
