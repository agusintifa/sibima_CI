<div class="container">
  <?php echo form_open('data/baru'); ?>
    <div class="mt-4 w-75">
      <div class="form-group">
        <label>Nama</label>
        <input name="nama" class="form-control">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <select class="form-control" name="alamat">
          <?php foreach ($data['alamat'] as $alamat) : ?>
            <option value="<?php echo $alamat; ?>"><?php echo $alamat; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Nomor</label>
          <input class="form-control" placeholder="<?php echo $data['terakhir']['no']+1 ?>" disabled>
        </div>
        <div class="form-group col-md-4">
          <label>Nomor Pelanggan</label>
          <input class="form-control" placeholder="<?php echo str_pad($data['terakhir']['nopel']+1, 4, 0, STR_PAD_LEFT); ?>" disabled>
        </div>
        <div class="form-group col-md-4">
          <label>Golongan</label>
          <select class="form-control" name="gol">
            <option value="R">R</option>
            <option value="S">S</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary my-1">Simpan</button>
    </div>
  </form>
</div>
