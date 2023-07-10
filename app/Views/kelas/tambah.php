<?=$this->extend('layout/template');?>
<?=$this->section('content');?>

<div class="container p-4">
  <form action="/kelas/store" method="post">
    <div class="col">
      <div class="row">
        <div class="card shadow bg-secondary-subtle">
          <div class="container p-4">

            <div class="form-group">
              <label for="nama_kelas" class="form-label col-sm-2">Nama :</label>
              <div class="input-wrapper">
                <input type="text" name="nama_kelas" class="form-control" value="<?=old('nama_kelas')?>">
                <?php if (session()->has('validation') && session('validation')->getError('nama_kelas')): ?>
                <span class="text-danger" style="display: block; font-size: 12px;">
                  <?=session('validation')->getError('nama_kelas');?>
                </span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="tahun_ajaran" class="col-sm-2 position-relative form-label">Jenis Kelamin :</label>
              <div class="col-sm-10 position-relative">
                <div class="input-wrapper position-relative">
                  <select name="tahun_ajaran" class="form-control">
                    <?php
                        $currentYear = date('Y');
                        $startYear = $currentYear - 10;

                        for ($year = $startYear; $year <= $currentYear; $year++) {
                            $tahunAjaran = $year . '/' . ($year + 1);
                            ?>
                    <option value="<?=$year .'/'. ($year + 1)?>" <?=old('tahun_ajaran') == $year ? 'selected' : ''?>>
                      <?=$tahunAjaran?>
                    </option>
                    <?php
                        }
                        ?>
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
              <label for="jumlah_siswa" class="form-label col-sm-2">Jumlah Siswa :</label>
              <div class="input-wrapper">
                <input type="text" name="jumlah_siswa" class="form-control" value="<?=old('jumlah_siswa');?>">
                <?php if(session()->has('validation') && session('validation')->getError('jumlah_siswa')) :?>
                <span class="text-danger" style="display: block; font-size: 12px;">
                  <?= session('validation')->getError('jumlah_siswa'); ?></span>
                <?php endif;?>
              </div>
            </div>

            <div class="form-group">
              <label for="id_walikelas" class="col-sm-2 position-relative form-label">Wali Kelas :</label>
              <div class="col-sm-10 position-relative">
                <div class="input-wrapper position-relative">
                  <select name="id_walikelas" class="form-control">
                    <option value="" disabled selected>Pilih Wali Kelas</option>
                    <?php foreach($pilih_guru as $pilihGuru) :?>
                    <option value="<?= $pilihGuru['id'] ?>" <?= old('option') === $pilihGuru['id'] ? 'selected' : '' ?>>
                      <?= $pilihGuru['nama_guru'] ?>
                    </option>
                    <?php endforeach;?>
                  </select>
                  <span class="position-absolute top-50 translate-middle-y mdi mdi-arrow-down-thick"
                    style="text-danger:10px; color:gray;"></span>
                </div>
                <?php if (session()->has('validation') && session('validation')->getError('id_walikelas')) : ?>
                <span class="text-danger ms-2" style="display:block; font-size: 12px">
                  <?= session('validation')->getError('id_walikelas');?></span>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-4 text-end">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="/guru" class="btn btn-warning">Cancel</a>
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

<?=$this->endSection();?>