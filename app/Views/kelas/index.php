<?=$this->extend('layout/template');?>
<?=$this->section('content');?>
<div class="container p-4">
  <div class="p-4">
    <a href="/kelas/tambah" class="btn btn-primary">Tambah Data</a>
  </div>
  <table class=" table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Kelas</th>
        <th scope="col">Tahun Ajaran</th>
        <th scope="col">Jumlah Siswa</th>
        <th scope="col">Wali Kelas</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;?>
      <?php foreach ($results as $result): ?>
      <tr>
        <th scope="row"><?=$i++?></th>
        <td><?=$result['nama_kelas'];?></td>
        <td><?=$result['tahun_ajaran'];?></td>
        <td><?=$result['jumlah_siswa'];?></td>
        <td><?=$result['walikelas']['nama_walikelas'];?></td>
        <td>
          <div class="d-flex">
            <a href="/kelas/<?=$result['id'];?>" class="text-primary me-1" title="detail" style="text-decoration: none">
              <i class="mdi mdi-magnify"></i>
            </a>
            <a href="/kelas/edit/<?=$result['id'];?>" class="text-success me-1" title="edit" style="text-decoration: none">
              <i class="mdi mdi-pencil"></i>
            </a>
            <div class="delete-button text-danger " data-id="<?= $result['id']; ?>" title="Delete"
              style="text-decoration: none">
              <i class="mdi mdi-delete"></i>
            </div>
          </div>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>


<script>
// Mengambil semua elemen dengan kelas delete-button dalam dokumen
const deleteButtons = document.querySelectorAll('.delete-button');

// Menambahkan event listener pada setiap elemen delete-button
deleteButtons.forEach((button) => {
  button.addEventListener('click', function() {
    // Mengambil data ID yang tersimpan dalam atribut data-id
    const dataId = button.getAttribute('data-id');

    // Menampilkan Sweet Alert konfirmasi
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: 'Anda tidak dapat mengembalikan data yang dihapus.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Jika pengguna mengklik tombol "Ya, hapus!", arahkan ke URL delete dengan menggunakan metode HTTP DELETE
        fetch(`/kelas/delete/${dataId}`, {
          method: 'GET'
        }).then((response) => {
          if (response.ok) {
            // Jika penghapusan data berhasil, tampilkan Sweet Alert sukses
            Swal.fire(
              'Dihapus!',
              'Data berhasil dihapus.',
              'success'
            ).then(() => {
              // Redirect atau lakukan tindakan lain setelah penghapusan data selesai
              window.location.reload();
            });
          } else {
            // Jika penghapusan data gagal, tampilkan pesan kesalahan
            Swal.fire(
              'Error!',
              'Terjadi kesalahan saat menghapus data.',
              'error'
            );
          }
        });
      }
    });
  });
});
</script>

<?=$this->endSection();?>