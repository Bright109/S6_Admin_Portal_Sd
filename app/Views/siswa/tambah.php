<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container p-4">
  <form action="/siswa/store" method="post">
    <div class="col">
      <div class="row">
        <div class="card shadow bg-secondary-subtle">
          <div class="container p-4">
            <div class="form-group">
              <label for="nama_siswa" class="form-label col-sm-2">Nama :</label>
              <div class="input-wrapper">
                <input type="text" name="nama_siswa" class="form-control" value="<?=old('nama_siswa')?>">
                <?php if (session()->has('validation') && session('validation')->getError('nama_siswa')): ?>
                <span class="text-danger" style="display: block; font-size: 12px;">
                  <?=session('validation')->getError('nama_siswa');?>
                </span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="jenis_kelamin" class="col-sm-2 position-relative form-label">Jenis Kelamin :</label>
              <div class="col-sm-10 position-relative">
                <div class="input-wrapper position-relative">
                  <select name="jenis_kelamin" class="form-control custom-select">
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" <?=old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '';?>>Laki-laki
                    </option>
                    <option value="Perempuan" <?=old('jenis_kelamin') === 'Perempuan' ? 'selected' : '';?>>Perempuan
                    </option>
                  </select>
                  <span class="position-absolute top-50 translate-middle-y mdi mdi-arrow-down-thick"
                    style="right:10px; color:gray;"></span>
                </div>
                <?php if (session()->has('validation') && session('validation')->getError('jenis_kelamin')): ?>
                <span class="text-danger ms-2"
                  style="display:block; font-size: 12px;"><?=session('validation')->getError('jenis_kelamin');?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="tempat_lahir" class="form-label col-sm-2">Tempat Lahir :</label>
              <div class="input-wrapper">
                <input type="text" name="tempat_lahir" class="form-control" value="<?=old('tempat_lahir');?>">
                <?php if (session()->has('validation') && session('validation')->getError('tempat_lahir')): ?>
                <span class="text-danger"
                  style="display:block; font-size: 12px"><?=session('validation')->getError('tempat_lahir')?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="tanggal_lahir" class="col-sm-2 position-relative form-label">Tanggal Lahir :</label>
              <div class="col-sm-10 position-relative">
                <div class="input-wrapper position-relative">
                  <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                    value="<?=old('tanggal_lahir');?>">
                  <span class="position-absolute top-50 translate-middle-y mdi mdi-calendar-range"
                    style="right: 10px; color:gray"></span>
                </div>
                <?php if (session()->has('validation') && session('validation')->getError('tanggal_lahir')): ?>
                <span class="text-danger"
                  style="display:block; font-size: 12px"><?=session('validation')->getError('tanggal_lahir');?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="alamat" class="form-label col-sm-2">Alamat :</label>
              <div class="input-wrapper">
                <input type="text" name="alamat" class="form-control" value="<?=old('alamat');?>">
                <?php if (session()->has('validation') && session('validation')->getError('alamat')): ?>
                <span class="text-danger"
                  style="display: block; font-size: 12px"><?=session('validation')->getError('alamat')?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="nomor_telepon" class="form-label col-sm-2">No. Hp :</label>
              <div class="input-wrapper">
                <input type="text" name="nomor_telepon" class="form-control" value="<?=old('nomor_telepon');?>">
                <?php if(session()->has('validation') && session('validation')->getError('nomor_telepon')) :?>
                <span class="text-danger" style="display: block; font-size: 12px;">
                  <?= session('validation')->getError('nomor_telepon'); ?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="id_orangtua" class="col-sm-2 position-relative form-label">Orang Tua :</label>
              <div class="col-sm-10 position-relative">
                <div class="input-wrapper position-relative">
                  <select name="id_orangtua" class="form-control">
                    <option value="" disabled selected>Pilih Orang Tua</option>
                    <?php foreach($pilih_orangtua as $pilihOrtu) :?>
                    <option value="<?= $pilihOrtu['id'] ?>" <?= old('option') === $pilihOrtu['id'] ? 'selected' : '' ?>>
                      <?= $pilihOrtu['nama_orangtua'] ?>
                    </option>
                    <?php endforeach;?>
                  </select>
                  <span class="position-absolute top-50 translate-middle-y mdi mdi-arrow-down-thick"
                    style="text-danger:10px; color:gray;"></span>
                </div>
                <?php if (session()->has('validation') && session('validation')->getError('id_orangtua')) : ?>
                <span class="text-danger ms-2" style="display:block; font-size: 12px">
                  <?= session('validation')->getError('id_orangtua');?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="id_kelas" class="col-sm-2 position-relative form-label">Kelas :</label>
              <div class="col-sm-10 position-relative">
                <div class="input-wrapper position-relative">
                  <select name="id_kelas" class="form-control">
                    <option value="" disabled selected>Pilih Kelas</option>
                    <?php foreach($pilih_kelas as $pilihKelas) :?>
                    <option value="<?= $pilihKelas['id'] ?>"
                      <?= old('option') === $pilihKelas['id'] ? 'selected' : '' ?>>
                      <?= $pilihKelas['nama_kelas'] ?>
                    </option>
                    <?php endforeach;?>
                  </select>
                  <span class="position-absolute top-50 translate-middle-y mdi mdi-arrow-down-thick"
                    style="text-danger:10px; color:gray;"></span>
                </div>
                <?php if (session()->has('validation') && session('validation')->getError('id_kelas')) : ?>
                <span class="text-danger ms-2" style="display:block; font-size: 12px">
                  <?= session('validation')->getError('id_kelas');?></span>
                <?php endif;?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="p-4 text-end">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="/siswa" class="btn btn-warning">Cancel</a>
    </div>
  </form>
</div>


<style>
.form-label {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin-bottom: 0;
  padding-right: 0.5rem;
}

.form-group {
  display: flex;
  align-items: flex-start;
  margin-bottom: 1rem;
}

.form-group .form-control {
  margin-bottom: 0;
}

.input-wrapper {
  flex: 1;
  margin-left: 0.5rem;
  position: relative
}

.input-wrapper input {
  width: 100%
}

.input-wrapper .mdi {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 10px;
  color: gray;
}
</style>

<script>
flatpickr('#tanggal_lahir, #tanggal_bergabung', {
  dateFormat: 'Y-m-d'
});
</script>
<?= $this->endSection();?>