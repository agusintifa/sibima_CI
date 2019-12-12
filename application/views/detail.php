<div class="container">
	<div class="d-flex flex-row mt-4">
	  <div class="mr-2">
	  	<h6>Nomor</h6>
	  	<h6>Nama</h6>
	  	<h6>Alamat</h6>
	  	<h6>Nomor Pelanggan</h6>
	  	<h6>Golongan</h6>
	  	<h6>Tagihan Tahun</h6>
	  </div>
	  <div>
	  	<h6>: <?php echo $data['no'] ?></h6>
	  	<h6>: <?php echo $data['nama'] ?></h6>
	  	<h6>: <?php echo $data['alamat'] ?></h6>
	  	<h6>: <?php echo str_pad($data['nopel'], 4, 0, STR_PAD_LEFT); ?></h6>
	  	<h6>: <?php echo $data['gol'] ?></h6>
	  	<h6>: <?php echo date("Y"); ?></h6>
	  </div>
	</div>
	<?php echo form_open('data/update/'.$data['no']); ?>
		<table class="table mt-2 table-sm table-hover">
		  <thead>
		    <tr>
		    	<?php foreach ($tahun as $item) : ?>
		      		<th scope="col"><?php echo $item ?></th>
		      	<?php endforeach; ?>
		    </tr>
		  </thead>
		  <tbody>
		  		<tr>
		  			<?php for ($i=0; $i <=12 ; $i++) : ?>
			    		<td><input class="w-100" name="<?php echo $i; ?>" value="<?php echo $data[$i]; ?>"></td>
			    	<?php endfor; ?>
			    </tr>
		  </tbody>
		</table>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
	<?php echo form_open('data/print/'.$data['no'], 'target="_blank"'); ?>
		<div class="form-inline mt-4">
		  <div class="form-group">
		  	<input type="hidden" name="gol" value="<?php echo $data['gol']; ?>">
		    <label>Print tagihan bulan</label>
		    <select class="form-control mx-2" id="exampleFormControlSelect1" name="bulan">
		    	<?php foreach ($tahun as $key => $item) : ?>
		    		<?php if(($key == date('n')) && ($key != 0)) : ?>
		    			<option value="<?php echo $key; ?>" selected><?php echo $item; ?></option>
		    		<?php endif ?>
		    		<?php if(($key != date('n')) && ($key != 0)) : ?>
		    			<option value="<?php echo $key; ?>"><?php echo $item; ?></option>
		    		<?php endif ?>
		      	<?php endforeach; ?>
	        </select>
		  </div>
		  <button type="submit" class="btn btn-primary">Print</button>			
		</div>
	</form>
</div>