<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\KelasModel;

class KelasController extends BaseController
{
    public function index()
    {

        $kelasModel = new KelasModel();
        $guruModel = new GuruModel();

        $kelas = $kelasModel->findAll();
        $data = [];

        foreach ($kelas as $kls) {
            $guru = '';
            if($kls['id_walikelas']) {
                $guru = $guruModel->find($kls['id_walikelas']);
            }
            
            $datas[] = [
                "id" => $kls['id'],
                "nama_kelas" => $kls['nama_kelas'],
                "tahun_ajaran" => $kls['tahun_ajaran'],
                "jumlah_siswa" => $kls['jumlah_siswa'],
                "walikelas" => [
                    "nama_walikelas" => isset($guru['nama_guru']) ? $guru['nama_guru'] : '',
                ],

            ];

            $data = [
                "activePage" => 'kelas',
                "title" => "Kelas List",
                "results" => $datas,
            ];
        }

        return view('kelas/index', $data);
    }

    public function show($id)
    {
        $kelasModel = new KelasModel();
        $guruModel = new GuruModel();

        $kelas = $kelasModel->find($id);

        if ($kelas) {
            $guru = '';
            if($kelas['id_walikelas']) {
                $guru = $guruModel->find($kelas['id_walikelas']);
            }

            $data = [
                "id" => $kelas['id'],
                "nama_kelas" => $kelas['nama_kelas'],
                "tahun_ajaran" => $kelas['tahun_ajaran'],
                "jumlah_siswa" => $kelas['jumlah_siswa'],
                "walikelas" => isset($guru['nama_guru'])?$guru['nama_guru']:'',
            ];

            $dataPage = [
                "activePage" => 'kelas',
                "title" => 'Kelas Detail',
                "result" => $data,
            ];

            return view('kelas/detail', $dataPage);
        }
    }

    public function create()
    {
        session();
        $guru = new GuruModel();
        $optionGuru = $guru->findAll();

        $data = [
            'activePage' => 'kelas',
            'title' => 'Tambah Kelas',
            'pilih_guru' => $optionGuru,
        ];

        return view('kelas/tambah', $data);
    }

    public function store()
    {
        $namaKelas = $this->request->getPost('nama_kelas');
        $tahunAjaran = $this->request->getPost('tahun_ajaran');
        $jumlahSiswa = $this->request->getPost('jumlah_siswa');
        $idWalikelas = $this->request->getPost('id_walikelas');

        $validationRules = [
            'nama_kelas' => 'required',
            'tahun_ajaran' => 'required',
            'jumlah_siswa' => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $kelasModel = new KelasModel();

        $data = [
            'nama_kelas' => $namaKelas,
            'tahun_ajaran' => $tahunAjaran,
            'jumlah_siswa' => $jumlahSiswa,
            'id_walikelas' => $idWalikelas,
        ];

        $kelasModel->insert($data);

        return redirect()->to(base_url('/kelas'));
    }

    public function edit($id)
    {
        session();

        $kelasModel = new KelasModel();
        $guruModel = new GuruModel();
        $optionGuru = $guruModel->findAll();

        $kelas = $kelasModel->find($id);

        if ($kelas) {
            $guru = '';
            if($kelas['id_walikelas']) {
                $guru = $guruModel->find($kelas['id_walikelas']);
            };

            $data = [
                'id' => $kelas['id'],
                'nama_kelas' => $kelas['nama_kelas'],
                'tahun_ajaran' => $kelas['tahun_ajaran'],
                'jumlah_siswa' => $kelas['jumlah_siswa'],
                "wali_kelas" => [
                    'id_walikelas' => isset($guru['id']) ? $guru['id'] : '',
                    'nama_walikelas' => isset($guru['nama_guru']) ? $guru['nama_guru'] : '',
                ],
            ];

            $dataPage = [
                'activePage' => 'kelas',
                'title' => 'Edit Kelas',
                'result' => $data,
                'pilih_guru' => $optionGuru,
            ];

            return view('kelas/edit', $dataPage);
        }
    }

    public function update($id)
    {
        $namaKelas = $this->request->getPost('nama_kelas');
        $tahunAjaran = $this->request->getPost('tahun_ajaran');
        $jumlahSiswa = $this->request->getPost('jumlah_siswa');
        $idWalikelas = $this->request->getPost('id_walikelas');

        $validationRules = [
            'nama_kelas' => 'required',
            'tahun_ajaran' => 'required',
            'jumlah_siswa' => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        $kelasModel = new kelasModel();

        $data = [
            'nama_kelas' => $namaKelas,
            'tahun_ajaran' => $tahunAjaran,
            'jumlah_kelas' => $jumlahSiswa,
            'id_walikelas' => $idWalikelas,
        ];

        $kelasModel->update($id, $data);

        return redirect()->to(base_url('/kelas'));
    }

    public function delete($id) {
        $kelasModel = new KelasModel();
        $kelas = $kelasModel->find($id);

        if(!$kelas) {
            return redirect()->to(base_url('/kelas'))->with('error', 'Kelas tidak Tersedia');
        }

        $kelasModel->delete($id);

        return redirect()->to(base_url('/kelas'))->with('success', 'Kelas Berhasil Dihapus');
    }
}
