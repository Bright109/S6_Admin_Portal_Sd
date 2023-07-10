<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\OrangTuaModel;
use App\Models\SiswaModel;

class SiswaController extends BaseController
{
    public function index()
    {
        $siswaModel = new SiswaModel();
        $orangTuaModel = new OrangTuaModel();
        $kelasModel = new KelasModel();

        $siswa = $siswaModel->findAll();

        $data = [];
        foreach ($siswa as $murid) {

            $orangTua = $orangTuaModel->find($murid['id_orangTua']);
            $kelas = $kelasModel->find($murid['id_kelas']);

            $data[] = [
                'id' => $murid['id'],
                'nama_siswa' => $murid['nama_siswa'],
                "jenis_kelamin" => $murid['jenis_kelamin'],
                'alamat' => $murid['alamat'],
                "tempat_lahir" => $murid['tempat_lahir'],
                "tanggal_lahir" => date('j F Y', strtotime($murid['tanggal_lahir'])),
                "nomor_telepon" => $murid['nomor_telepon'],
                "orang_tua" => isset($orangTua['nama_orangtua'])?$orangTua['nama_orangtua'] .' ( '.$orangTua['hubungan_dengan_siswa'] .' ) ': '',
                "kelas" => isset($kelas['nama_kelas'])?$kelas['nama_kelas']:''
            ];
        }

        $data = [
            "activePage" => 'siswa',
            "title" => "Siswa List",
            "results" => $data,
        ];

        return view('siswa/index', $data);
    }

    public function show($id)
    {
        $siswaModel = new SiswaModel();
        $orangTuaModel = new OrangTuaModel();
        $kelasModel = new KelasModel();

        $siswa = $siswaModel->find($id);

        if ($siswa) {
            $orangTua = '';
            if($siswa['id_orangTua']) {
                $orangTua = $orangTuaModel->find($siswa['id_orangTua']);
            }
            $kelas = '';
            if($siswa['id_kelas']) {
                $kelas = $kelasModel->find($siswa['id_kelas']);
            }

            $data = [
                "id" => $siswa['id'],
                "nama_siswa" => $siswa['nama_siswa'],
                "jenis_kelamin" => $siswa['jenis_kelamin'],
                "tempat_lahir" => $siswa['tempat_lahir'],
                "tanggal_lahir" => date('j F Y', strtotime($siswa['tanggal_lahir'])),
                "nomor_telepon" => $siswa['nomor_telepon'],
                "alamat" => $siswa['alamat'],
                "orang_tua" => isset($orangTua['id'])?$orangTua['nama_orangtua'].' ( '. $orangTua['hubungan_dengan_siswa'] . ' ) ' : '',
                "kelas" => isset($kelas['id'])?$kelas['nama_kelas']:'',
            ];

            $data = [
                "activePage" => 'siswa',
                "title" => 'Siswa Detail',
                "result" => $data,
            ];

            return view('siswa/detail', $data);
        } else {
            return "Error";
        }
    }

    public function create()
    {
        session();
        $orangTua = new OrangTuaModel();
        $optionOrangTua = $orangTua->findAll();

        $kelas = new KelasModel();
        $optionKelas = $kelas->findAll();


        $data = [
            "activePage" => 'siswa',
            "title" => 'Tambah Siswa',
            'pilih_orangtua' => $optionOrangTua,
            'pilih_kelas' => $optionKelas,
        ];

        return view('siswa/tambah', $data);
    }

    public function store()
    {
        $namaSiswa = $this->request->getPost('nama_siswa');
        $jenisKelamin = $this->request->getPost('jenis_kelamin');
        $tempatLahir = $this->request->getPost('tempat_lahir');
        $tanggalLahir = $this->request->getPost('tanggal_lahir');
        $alamat = $this->request->getPost('alamat');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $idOrangTua = $this->request->getPost('id_orangtua');
        $idKelas = $this->request->getPost('id_kelas');

        $validationRules = [
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $siswaModel = new SiswaModel();

        $data = [
            'nama_siswa' => $namaSiswa,
            'jenis_kelamin' => $jenisKelamin,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $alamat,
            'nomor_telepon' => $nomorTelepon,
            'id_orangTua' => $idOrangTua,
            'id_kelas' => $idKelas,
        ];

        $siswaModel->insert($data);

        return redirect()->to(base_url('/siswa'));
    }

    public function edit($id) 
    {
        session();

        $siswaModel = new SiswaModel();

        $orangTuaModel = new OrangTuaModel();
        $optionOrangTua = $orangTuaModel->findAll();
        $kelasModel = new KelasModel();
        $optionKelas = $kelasModel->findAll();

        $siswa = $siswaModel->find($id);

        if($siswa) {
            $orangTua = '';
            if($siswa['id_orangTua']) {
                $orangTua = $orangTuaModel->find($siswa['id_orangTua']);
            }
            $kelas = '';
            if($siswa['id_kelas']) {
                $kelas = $kelasModel->find($siswa['id_kelas']);
            }

            $data = [
                "id" => $siswa['id'],
                "nama_siswa" => $siswa['nama_siswa'],
                "jenis_kelamin" => $siswa['jenis_kelamin'],
                "tempat_lahir" => $siswa['tempat_lahir'],
                "tanggal_lahir" => $siswa['tanggal_lahir'],
                "nomor_telepon" => $siswa['nomor_telepon'],
                "alamat" => $siswa['alamat'],
                "orang_tua" => [
                    "id_orangtua" => isset($orangTua['id'])? $orangTua['id']:'',
                    'nama_orangtua' => isset($orangTua['nama_orangtua'])? $orangTua['nama_orangtua']:'',
                    'hubungan' => isset($orangTua['hubungan_dengan_siswa'])? $orangTua['hubungan_dengan_siswa'] : '',
                ],
                "kelas" => [
                    'id_kelas' => isset($kelas['id'])? $kelas['id'] : '',
                    'nama_kelas' => isset($kelas['nama_kelas'])? $kelas['nama_kelas']:'',
                ],
            ];

            $dataPage = [
                "activePage" => 'siswa',
                'title' => 'Siswa Edit',
                'result' => $data,
                'pilih_orangtua' => $optionOrangTua,
                'pilih_kelas' => $optionKelas
            ];

            return view('siswa/edit', $dataPage);
        }
    }

    public function update($id)
    {
        $namaSiswa = $this->request->getPost('nama_siswa');
        $jenisKelamin = $this->request->getPost('jenis_kelamin');
        $tempatLahir = $this->request->getPost('tempat_lahir');
        $tanggalLahir = $this->request->getPost('tanggal_lahir');
        $alamat = $this->request->getPost('alamat');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $idOrangTua = $this->request->getPost('id_orangtua');
        $idKelas = $this->request->getPost('id_kelas');

        $validationRules = [
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required|numeric' 
        ];

        if(!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $siswaModel = new SiswaModel();

        $data = [
            'nama_siswa' => $namaSiswa,
            'jenis_kelamin' => $jenisKelamin,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $alamat,
            'nomor_telepon' => $nomorTelepon,
            'id_orangTua' => $idOrangTua,
            'id_kelas' => $idKelas
        ];

        $siswaModel->update($id, $data);

        return redirect()->to(base_url('/siswa'))->with('success', 'Data siswa berhasil diperbarui');
    }

    public function delete($id) {
        $siswaModel = new SiswaModel();

        $siswa = $siswaModel->find($id);

        if(!$siswa) {
            return redirect()->to(base_url('/siswa'))->with('error', 'Siswa tidak tersedia');
        }

        $siswaModel->delete($id);

        return redirect()->to(base_url('/siswa'))->with('success', 'Siswa berhasil Dihapus');
    }
}