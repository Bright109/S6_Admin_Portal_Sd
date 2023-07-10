<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container p-4">
  <form action="/orang_tua/update/<?= $result['id']?>" method="post">
    <div class="row">
      <div class="col">
        <div class="card shadow bg-secondary-subtle">
          <div class="container p-4">

            <div class="form-group">
              <label for="nama_orangtua" class="form-label col-sm-2 ">Nama :</label>
              <div class="input-wrapper">
                <input type="text" name="nama_orangtua" class="form-control"
                  value="<?= old('nama_orangtua') ?: $result['nama_orangtua'] ?>">
                <?php if (session()->has('validation') && session('validation')->getError('nama_orangtua')): ?>
                <span class=" text-danger" style="display: block; font-size: 12px;">
                <?= session('validation')->getError('nama_orangtua');?> </span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="nomor_telepon" class="form-label col-sm-2">No. Hp :</label>
              <div class="input-wrapper">
                <input type="text" name="nomor_telepon" class="form-control"
                  value="<?= old('nomor_telepon') ?: $result['nomor_telepon'] ?>">
                <?php if(session()->has('validation') && session('validation')->getError('nomor_telepon')) :?>
                <span class="text-danger" style="display: block; font-size: 12px;">
                  <?= session('validation')->getError('nomor_telepon'); ?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="alamat" class="form-label col-sm-2">Alamat :</label>
              <div class="input-wrapper">
                <input type="text" name="alamat" class="form-control"
                  value="<?= old('alamat') ?: $result['alamat']; ?>">
                <?php if(session()->has('validation') && session('validation')->getError('alamat')) :?>
                <span class="text-danger"
                  style="display: block; font-size: 12px"><?= session('validation')->getError('alamat')?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="form-label col-sm-2">Email :</label>
              <div class="input-wrapper">
                <input type="text" name="email" class="form-control" value="<?= old('email') ?: $result['email']; ?>">
                <?php if(session()->has('validation') && session('validation')->getError('email')) : ?>
                <span class="text-danger"
                  style="display: block; font-size: 12px"><?= session('validation')->getError('email') ?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="hubungan_dengan_siswa" class="col-sm-2 position-relative form-label">Hubungan Dengan Siswa
                :</label>
              <div class="col-sm-10 position-relative">
                <div class="input-wrapper position-relative">
                  <select name="hubungan_dengan_siswa" class="form-control custom-select">
                    <option value="" disabled selected>Pilih Hubungan</option>
                    <option value="Ayah"
                      <?= (old('hubungan_dengan_siswa') === 'Ayah' || $result['hubungan_dengan_siswa'] === 'Ayah') ? 'selected' : '' ?>>
                      Ayah</option>
                    <option value="Ibu"
                      <?= (old('hubungan_dengan_siswa') === 'Ibu' || $result['hubungan_dengan_siswa'] === 'Ibu') ? 'selected' : '' ?>>
                      Ibu</option>
                    <option value="Wali"
                      <?= (old('hubungan_dengan_siswa') === 'Wali' || $result['hubungan_dengan_siswa'] === 'Wali') ? 'selected' : '' ?>>
                      Wali</option>
                  </select>
                  <span class="position-absolute top-50 translate-middle-y mdi mdi-arrow-down-thick"
                    style="right: 10px; color: gray;"></span>
                </div>
                <?php if (session()->has('validation') && session('validation')->getError('hubungan_dengan_siswa')) :?>
                <span class="text-danger ms-2"
                  style="display:block; font-size: 12px"><?=session('validation')->getError('hubungan_dengan_siswa');?></span>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-4 text-end">
      <button type="submit" class="btn btn-primary me-3">Save</button>
      <a href="/orang_tua" class="btn btn-warning">Cancel</a>
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

<?= $this->endSection();?>