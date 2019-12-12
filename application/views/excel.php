<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=pamsimas.xls");
?>
<table>
  <thead>
    <tr>
      	<th>No.</th>
      	<th>Nama</th>
      	<th>Alamat</th>
      	<th>No. Pel.</th>
      	<th>Golongan</th>
      	<th>Desember</th>
      	<th>Januari</th>
      	<th>Februari</th>
      	<th>Maret</th>
      	<th>April</th>
      	<th>Mei</th>
      	<th>Juni</th>
      	<th>Juli</th>
      	<th>Agustus</th>
      	<th>September</th>
      	<th>Oktober</th>
      	<th>November</th>
      	<th>Desember</th>
    </tr>
  </thead>
  <tbody>
  		<?php foreach($data as $item) : ?>	  	
		    <tr>
		    	<td><?php echo $item['no']; ?></td>
		      	<td><?php echo $item['nama']; ?></td>
		      	<td><?php echo $item['alamat']; ?></td>
		      	<td><?php echo $item['nopel']; ?></td>
		      	<td><?php echo $item['gol']; ?></td>
		      	<?php for ($i=0; $i <=12 ; $i++) : ?>
			    	<td><?php echo $item[$i]; ?></td>
			    <?php endfor; ?>
		    </tr>	  			  	
		<?php endforeach; ?>
  </tbody>
</table>