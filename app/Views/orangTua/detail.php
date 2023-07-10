<?=$this->extend('layout/template')?>
<?=$this->section('content')?>

<div class="container p-4">
  <div class="row">
    <div class="col">
      <div class="card shadow bg-secondary-subtle">
        <div class="container p-4">
          <div class="form-group">
            <label for="nama_orangtua" class="form-label col-sm-2">Nama :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama OrangTua"
                value="<?=$result['nama_orangtua']?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="nomor_telepon" class="form-label col-sm-2">No. Hp :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Nomor Telepon"
                value="<?=$result['nomor_telepon']?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat" class="form-label col-sm-2">Alamat :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Alamat"
                value="<?=$result['alamat']?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="form-label col-sm-2">Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Email"
                value="<?=$result['email']?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="hubungan_dengan_siswa" class="form-label col-sm-2">Hubungan Dengan Siswa :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Hubungan"
                value="<?=$result['hubungan_dengan_siswa']?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="anak" class="form-label col-sm-2">Anak :</label>
            <div class="col-sm-10">
              <ul class="my-1">
                <?php foreach ($result['siswa'] as $siswaName): ?>
                <li><?=$siswaName?></li>
                <?php endforeach;?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-4 text-end">
    <a href="/orang_tua" class="btn btn-warning">Cancel</a>
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

<?=$this->endSection();?>