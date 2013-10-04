
<form name="form1" class="form-horizontal row-fluid" action="<?php echo site_url('pendaftaran/addPendaftaran')?>" method="post">
    <div id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint color_13">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Tambah Data Pendaftaran</span> </h4>
            </div>
            <div class="content">
              <form class="form-horizontal row-fluid" action="#">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Nomor Pendaftaran</label>
                  <div class="controls span7">
                      <input type="text" required="required" name="no_pendaftaran" id="id_pendaftaran" value="<?php echo "$id_pendaftaran";?>" class="row-fluid" readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Pasien</label>
                  <div class="controls span7">
                    <select required="true" name="id_pasien" data-placeholder="Pilih Pasien..." class="chzn-select">
                       <option value=""></option> 
                        <?php
                        if(isset($data_pasien)){
                            foreach($data_pasien as $pas){
                                ?>
                                <option value="<?php echo $pas->id_pasien?>"><?php echo $pas->nama_pasien?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Nomor Urut</label>
                  <div class="controls span7">
                      <input type="text" readonly="true" required="required" name="no_urut" id="no_urut" class="row-fluid" value="<?php echo "$no_urut";?>">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Tanggal Pendaftaran</label>
                  <div class="controls span7">
                    <input type="date" required="required" name="tgl_pendaftaran" id="no_telp" class="row-fluid">
                  </div>
                </div>
                <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <button type="submit" id="Add" value="Submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('pendaftaran/index')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <!-- End #container --> 


