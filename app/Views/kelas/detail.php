<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col">
      <div class="card shadow bg-secondary-subtle">
        <div class="container p-4">
          <div class="form-group">
            <label for="nama_kelas" class="form-label col-sm-2">Nama Kelas :</label>
            <div class="col-sm-10">
              <input type="text" name="" id="" class="form-control" value="<?= $result['nama_kelas'];?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="tahun_ajaran" class="form-label col-sm-2">Tahun Ajaran :</label>
            <div class="col-sm-10">
              <input type="text" name="" id="" class="form-control" value="<?= $result['tahun_ajaran'];?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="jumlah_siswa" class="form-label col-sm-2">Jumlah Siswa :</label>
            <div class="col-sm-10">
              <input type="text" name="" id="" class="form-control" value="<?= $result['jumlah_siswa'];?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="id_walikelas" class="form-label col-sm-2">WaliKelas :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?= $result['walikelas']; ?>" disabled>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-4 text-end">
    <a href="/kelas" class="btn btn-warning">Cancel</a>
  </div>
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
  align-items: center;
  margin-bottom: 1rem;
}

.form-group .form-control {
  margin-bottom: 0;
}
</style>
<?= $this->endSection();?>