<?php $post_array = $this->session->userdata('session_data');?>   
 <div id="main_container">
      <div class="row-fluid ">
        <div class="span12">
          <div class="box paint color_7">
            <div class="title">
              <h4> <i class=" icon-bar-chart"></i><span>Preorder Obat</span> </h4>
            </div>
            <!-- End .title -->
	  <div class="content top">
                  <div class="content">
              <div class="content cursor">
	       <form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('preorder/addObatPreorder')?>">
		<div class="form-row control-group row-fluid">
		<label class="control-label span3">Id Preorder</label>
		<div class="controls span3">
		<input type="text" class="row-fluid" name="id_transaksi" value="<?php echo $id_preorder?>" readonly="true">
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
		<select required="true" name="id_supplier" data-placeholder="Pilih Supplier..." class="chzn-select">
                       <option value=""></option> 
                        <?php
                        if(isset($data_supplier)){
                            foreach($data_supplier as $pas){
                                ?>
                                <option value="<?php echo $pas->id_supplier?>"><?php echo $pas->nama_supplier?></option>
                            <?php
                            }
                        }
                        ?>
                    </select></div></div>
		<div>
		
              <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
                <thead>
                  <tr>
                   
                    <th class="no_sort">No</th>
                    <th class="no_sort">Kode Barang</th>
                    <th class="no_sort">Nama</th>
                    <th class="no_sort">Jumlah order</th>
		    <th class="no_sort">Hapus</th>
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
                  
                    <td><a href="<?php echo base_url();?>index.php/preorder/hapusObatCart/<?php echo $items['rowid'];?>"  class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Hapus"><i class="gicon-remove"></i></a>
		    </td>
                </tr>

                <?php $i++; $no++;?>
            <?php endforeach; ?>                          
                  </tbody>
              </table>
             
		<a data-original-title="Tambah Obat" href="<?php echo site_url('obat/obatOrder')?>" class="btn" >Tambah Obat</a>
                <button data-original-title="Simpan" type="submit" class="btn btn-success">Simpan</button>
                <a data-original-title="Batal" href="<?php echo site_url('preorder/index')?>" class="btn btn-danger">Batal</a>
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

