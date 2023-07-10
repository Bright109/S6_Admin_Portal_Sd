<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<div class="container p-4">
  <div class="p-4">
    <a href="/guru/tambah" class="btn btn-primary">Tambah Data</a>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Alamat</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Email</th>
        <th scope="col">Tanggal Bergabung</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1 ;?>
      <?php foreach($results as $result) :?>
      <tr>
        <th scope="row"> <?= $i++;?></th>
        <td><?=$result['nama_guru']?></td>
        <td><?=$result['jenis_kelamin']?></td>
        <td><?=$result['alamat']?></td>
        <td><?=$result['nomor_telepon']?> </td>
        <td><?=$result['email']?></td>
        <td><?= date('j F Y', strtotime($result['tanggal_bergabung'])) ?></td>
        <td>
          <div class="d-flex">
            <a href="/guru/<?= $result['id']; ?>" class="text-primary me-1" title="Detail" style="text-decoration : none">
              <i class="mdi mdi-magnify"></i>
            </a>
            <a href="/guru/edit/<?= $result['id']; ?>" class="text-success me-1" title="Edit" style="text-decoration : none">
              <i class="mdi mdi-pencil"></i>
            </a>
            <div class="delete-button text-danger" data-id="<?= $result['id']; ?>" title="Delete" style="text-decoration: none">
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
                    fetch(`/guru/delete/${dataId}`, {
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
<?= $this->endSection();?>