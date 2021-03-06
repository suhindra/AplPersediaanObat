<?php $post_array = $this->session->userdata('session_data');?>   
    <div id="main_container">
      <div class="row-fluid ">
        <div class="span12">
          <div class="box paint color_18">
            <div class="title">
              <h4> <i class=" icon-bar-chart"></i><span>Transaksi Obat Masuk</span> </h4>
            </div>
            <!-- End .title -->
	    <div class="modal hide fade color_18" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="box color_18">
            <div class="title">
              <h4> <i class="icon-random"></i> <span>Obat Masuk</span> </h4>
            </div>
            <div class="content ">
              <form class="form-horizontal" method="post" action="<?php echo site_url('obatmasuk/tambahObatToCart')?>">
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">Pilih Obat</label>
                  <div class="controls span9">
		  <select name="kode_obat" required="true" data-placeholder="Pilih Obat..." class="chzn-select" id="kode_obat">
			 <option value=""></option> 
			<?php
                        if(isset($data_obat)){
                            foreach($data_obat as $supp){
                                ?>
                    <option value="<?php echo $supp->kode_obat?>"><?php echo $supp->nama_obat?></option>
                       <?php
                            }
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Jumlah Masuk</label>
                  <div class="controls span9">
                  <input type="text" required="true" name="jumlah_masuk" id="jumlah_masuk" value="" class="row-fluid" > 
                  </div>
                </div>                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Harga Satuan</label>
                  <div class="controls span9">
                   <input type="text" required="true" name="harga" id="harga" value="" class="row-fluid"> 
                  </div>
                </div>
		<div class="form-row control-group row-fluid">
                  <label class="control-label span3">Tanggal Kadaluarsa</label>
                  <div class="controls span9">
                   
		<input class="row-fluid" required="true" name="tgl_kadaluarsa" type="date" value="<?php echo isset($date) ? $date : date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));?>"></input>
		
                  </div>
                </div>
		 <button class="btn btn-warning" data-dismiss="modal">Batal</button>
                  <button class="btn btn-success"  type="submit" value="Submit">Tambah</button>
              </form>
            </div>
          </div>
                         
          </div>
	  <div class="content top">
                  <div class="content">
              <div class="content cursor">
	       <form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('obatmasuk/addObatMasuk')?>">
		<div class="form-row control-group row-fluid">
		<label class="control-label span3">id Transaksi</label>
		<div class="controls span3">
		<input class="row-fluid" type="text" class="normal-field" name="id_transaksi" value="<?php echo $id_transaksi; ?>" readonly="true">
		</div></div>
		<div class="form-row control-group row-fluid">
		<label class="control-label span3">Petugas</label>
		<div class="controls span3">
		<input type="text" class="row-fluid" name="nama_petugas" value="<?php echo $post_array['nama_petugas'];?>" readonly="true"><input type="hidden" class="row-fluid" name="id_petugas" value="<?php echo $post_array['id_petugas'];?>" readonly="true">
		</div></div>
		<div class="form-row control-group row-fluid">
		<label class="control-label span3">Tanggal Transaksi</label>
		<div class="controls span3">
		<div id="tgl_transaksi" class="input-append date row-fluid" data-date-format="dd-mm-yyyy" data-date="<?php echo isset($date) ? $date : date('d-m-Y')?>">
		<input class="row-fluid" name="tgl_transaksi" type="text" value="<?php echo isset($date) ? $date : date('d-m-Y')?>"></input><span class="add-on"><i class="icon-th"></i></span>
		</div></div></div>
		<div class="form-row control-group row-fluid">
		<label class="control-label span3">Supplier</label>
		<div class="controls span3">
		<select name="id_supplier" data-placeholder="Pilih Supplier" required="true" class="chzn-select">
                       <option value=""></option> 
                        <?php
                        if(isset($data_supplier)){
                            foreach($data_supplier as $supp){
                                ?>
                                <option value="<?php echo $supp->id_supplier?>"><?php echo $supp->nama_supplier?></option>
                            <?php
                            }
                        }
                        ?>
                    </select></div></div>
		<div>
		<div class="form-row control-group row-fluid">
		<label class="control-label span3">Total Harga</label>
		<div class="controls span3">		
		<input  type="text" class="row-fluid"
                           value="Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>">
		</input></div></div>
		<input type="hidden" class="normal-field" name="total" required="true"
                           value="<?php echo $this->cart->total(); ?>">
		</input>
              <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
                <thead>
                  <tr>                   
                    <th class="no_sort">No</th>
                    <th class="no_sort">Kode Barang</th>
                    <th class="no_sort">Nama</th>
                    <th class="no_sort to_hide_phone">Jumlah Masuk</th>
                    <th class="no_sort">Harga</th>
		    <th class="no_sort">Sub Total</th>
                    <th class="no_sort">Tanggal Kadaluarsa</th>
		    <th class="no_sort">Hapus Obat</th>
		    </tr>
                </thead>
                <tbody>
                  <?php $i=1; $no=1;?>
            <?php foreach($this->cart->contents() as $items): ?>
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr >
                    <td><?php echo $no; ?></td>
                    <td><?php echo $items['id']; ?></td>
		    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['qty']; ?></td>
                    <td class="ms">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
		    <td class="ms">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
		    <td><?php echo $items['option']; ?></td>
	            <td><a href="<?php echo base_url();?>index.php/obatmasuk/hapusObatCart/<?php echo $items['rowid'];?>"  class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Hapus"><i class="gicon-remove"></i></a>
                            
		    </td>
                   
                </tr>

                <?php $i++; $no++;?>
            <?php endforeach; ?>                          
                  </tbody>
              </table>
             
		<a data-original-title="Edit Photo" href="#myModal" class="btn" data-toggle="modal"></i>Tambah Obat</a>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?php echo site_url('obatmasuk/index')?>" class="btn btn-danger">Batal</a>
            </div>
		</div>
       	      </form>
	     </div>

            <!-- End row-fluid --> 
          </div>
          <!-- End .content --> 
        </div>
      <!-- End .row-fluid --> 
    </div>
   </div>

