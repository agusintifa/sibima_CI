<div class="container">
	<?php echo form_open('data'); ?>
		<div class="form-inline mt-4">
		  <div class="form-group">
		    <input class="form-control" placeholder="Masukkan nama" name="nama">
		  </div>
		  <button type="submit" class="btn btn-primary ml-1">Cari</button>
		</div>		
	</form>
	<table class="table mt-4 table-sm table-hover w-75">
	  <thead>
	    <tr>
	      <th scope="col">No.</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Alamat</th>
	      <th scope="col">Golongan</th>
	    </tr>
	  </thead>
	  <tbody>	  	
	  	<?php foreach($data as $item) : ?>	  	
		    <tr>
		    	<td><?php echo $item['no']; ?></td>
		      	<td><a href="<?php echo base_url().'data/detail/'.$item['no']; ?>"><?php echo $item['nama']; ?></a></td>
		      	<td><?php echo $item['alamat']; ?></td>
		      	<td><?php echo $item['gol']; ?></td>
		    </tr>	  			  	
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>
