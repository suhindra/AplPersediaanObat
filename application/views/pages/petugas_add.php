
<form name="form1" class="form-horizontal row-fluid" action="<?php echo site_url('petugas/addPetugas')?>" method="post">
    <div id="main_container">
      <div class="row-fluid">
        <div class="span7">
          <div class="box paint color_6">
            <div class="title">
              <h4> <i class="icon-book"></i><span>Tambah Data Petugas</span> </h4>
            </div>
            <div class="content">
              <form class="form-horizontal row-fluid" action="#">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Id Petugas</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="id_petugas" id="id_petugas" value="<?php echo $id_petugas; ?>" class="row-fluid"  disabled="disabled" readonly="true">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Nama Petugas</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="nama_petugas" id="nama_petugas" class="row-fluid">
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Username</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="username" id="username" class="row-fluid">
                  </div>
                </div>
		<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Password</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="username" id="username" class="row-fluid">
                  </div>
                </div>
	        <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">No Hp</label>
                  <div class="controls span7">
                    <input type="text" required="required" name="no_hp" id="no_hp" class="row-fluid">
                  </div>
                </div>
		 <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="normal-field">Type Akun</label>
                  <div class="controls span7">
                    <select name="type" required="required" data-placeholder="Edit Type..." class="chzn-select">
                       <option value=""></option> 
                       <option value="Admin">Admin</option> 
                       <option value="petugas">Petugas</option>                         
                    </select>
                  </div>
                </div>
		
		<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">SMS Gateway</label>
                  <div class="controls span9">
                    <div class="row-fluid">
                      <div class="pull-left">
                        <label class="radio off">
                          <input type="radio" name="sms" id="toggle1-off" value="0" checked="">
                        </label>
                        <label class="radio on">
                          <input type="radio" name="sms" id="toggle1-on" value="1">
                        </label>
                        <div class="toggle">
                          <div class="yes"> ON </div>
                          <div class="switch"> </div>
                          <div class="no"> OFF </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <button type="submit" id="Add" value="Submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('petugas')?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <!-- End #container --> 


