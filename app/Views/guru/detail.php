<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div class="container p-4">
  <div class="row">
    <div class="col">
      <div class="card shadow bg-secondary-subtle">
        <div class="container p-4">
          <div class="form-group">
            <label for="nama_guru" class="form-label col-sm-2">Nama :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['nama_guru']; ?>"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="jenis_kelamin" class="form-label col-sm-2">Jenis Kelamin :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['jenis_kelamin'] ?>"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="tempat_lahir" class="form-label col-sm-2">Tempat Lahir :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['tempat_lahir']?>"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="tanggal_lahir" class="form-label col-sm-2">Tanggal Lahir :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['tanggal_lahir']?>"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat" class="form-label col-sm-2">Alamat :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['alamat']?>"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="nomor_telepon" class="form-label col-sm-2">Nomor Telepon :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['nomor_telepon'] ?>"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="form-label col-sm-2">Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['email']?>"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="tanggal_bergabung" class="form-label col-sm-2">Tanggal Bergabung :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $result['tanggal_bergabung']; ?>"
                disabled>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-4 text-end">
    <a href="/guru" class="btn btn-warning">Cancel</a>
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