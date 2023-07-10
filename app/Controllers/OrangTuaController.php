<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrangTuaModel;
use App\Models\SiswaModel;
use CodeIgniter\Session\Session;

class OrangTuaController extends BaseController
{
    public function index()
    {

        $orangTuaModel = new OrangTuaModel();
        $siswaModel = new SiswaModel();

        $orangTua = $orangTuaModel->findAll();
        $data = [];

        foreach ($orangTua as $ortu) {
            $siswa = $siswaModel->where('id_orangTua', $ortu['id'])->findAll();
            $siswaNames = array_column($siswa, 'nama_siswa');

            $data[] = [
                'id' => $ortu['id'],
                'nama_orangtua' => $ortu['nama_orangtua'],
                "nomor_telepon" => $ortu['nomor_telepon'],
                "alamat" => $ortu['alamat'],
                "email" => $ortu['email'],
                "hubungan_dengan_siswa" => $ortu['hubungan_dengan_siswa'],
                'siswa' => $siswaNames,
            ];
        }

        $data = [
            "activePage" => 'orangtua',
            "title" => 'Orang Tua List',
            "results" => $data,
        ];

        return view('orangTua/index', $data);
    }

    public function show($id)
    {
        try {
            $orangTuaModel = new OrangTuaModel();
            $siswaModel = new SiswaModel();

            $orangTua = $orangTuaModel->find($id);

            if ($orangTua) {
                $siswa = $siswaModel->where('id_orangTua', $orangTua['id'])->findAll();
                $siswaNames = array_column($siswa, 'nama_siswa');

                $data = [
                    "id" => $orangTua['id'],
                    "nama_orangtua" => $orangTua['nama_orangtua'],
                    'nomor_telepon' => $orangTua['nomor_telepon'],
                    "alamat" => $orangTua['alamat'],
                    "email" => $orangTua['email'],
                    "hubungan_dengan_siswa" => $orangTua['hubungan_dengan_siswa'],
                    "siswa" => $siswaNames,
                ];

                $data = [
                    "activePage" => 'orangtua',
                    "title" => "Orang Tua Detail",
                    "result" => $data,
                ];

                return view('orangTua/detail', $data);
            } else {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }

    public function create()
    {
        session();
        $data = [
            "activePage" => 'orangtua',
            "title" => "Tambah Orang Tua",
        ];

        return view('orangTua/tambah', $data);
    }

    public function store()
    {
        $namaOrangTua = $this->request->getPost('nama_orangtua');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $hubunganDenganSiswa = $this->request->getPost('hubungan_dengan_siswa');

        $validationRules = [
            'nama_orangtua' => 'required',
            'nomor_telepon' => 'required|numeric|is_unique[orang_tua.nomor_telepon]|max_length[12]',
            'alamat' => 'required',
            'email' => 'required|valid_email|is_unique[orang_tua.email]',
            'hubungan_dengan_siswa' => 'required|in_list[Ayah,Ibu,Wali]',
        ];

        if ($this->request->getPost('email') == '-') {
            unset($validationRules['email']);
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $orangTuaModel = new OrangTuaModel();

        $data = [
            'nama_orangtua' => $namaOrangTua,
            'nomor_telepon' => $nomorTelepon,
            "alamat" => $alamat,
            'email' => $email,
            'hubungan_dengan_siswa' => $hubunganDenganSiswa,
        ];

        $orangTuaModel->insert($data);

        return redirect()->to(base_url('/orang_tua'));
    }

    public function edit($id)
    {
        try {
            $orangTuaModel = new OrangTuaModel();
            $siswaModel = new SiswaModel();

            $orangTua = $orangTuaModel->find($id);

            if (empty($orangTua)) {
                return redirect()->back()->with('error', 'Data Tidak ditemukan');
            }

            $siswa = $siswaModel->where('id_orangTua', $orangTua['id'])->findAll();
            $siswaNames = array_column($siswa, 'nama_siswa');

            $data = [
                "id" => $orangTua['id'],
                "nama_orangtua" => $orangTua['nama_orangtua'],
                'nomor_telepon' => $orangTua['nomor_telepon'],
                "alamat" => $orangTua['alamat'],
                "email" => $orangTua['email'],
                "hubungan_dengan_siswa" => $orangTua['hubungan_dengan_siswa'],
                "siswa" => $siswaNames,
            ];

            $dataPage = [
                'activePage' => 'orangtua',
                'title' => 'Orang Tua Edit',
                'result' => $data,
            ];

            return view('orangTua/edit', $dataPage);

        } catch (\Throwable $th) {
            return response(['error' => $th->getMessage()], 500);
        }
    }

    public function update($id)
    {
        $namaOrangTua = $this->request->getPost('nama_orangtua');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $hubunganDenganSiswa = $this->request->getPost('hubungan_dengan_siswa');

        $validationRules = [
            'nama_orangtua' => 'required',
            'nomor_telepon' => "required|numeric|is_unique[orang_tua.nomor_telepon,id,$id]|max_length[12]",
            'alamat' => 'required',
            'email' => 'required|valid_email|is_unique[orang_tua.email,id,$id]',
            'hubungan_dengan_siswa' => 'required|in_list[Ayah,Ibu,Wali]',
        ];

        if ($this->request->getPost('email') == '-') {
            unset($validationRules['email']);
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $orangTuaModel = new OrangTuaModel();

        $data = [
            'nama_orangtua' => $namaOrangTua,
            'nomor_telepon' => $nomorTelepon,
            "alamat" => $alamat,
            'email' => $email,
            'hubungan_dengan_siswa' => $hubunganDenganSiswa,
        ];

        $orangTuaModel->update($id, $data);

        return redirect()->to(base_url('/orang_tua'));
    }

    public function delete($id) {
        $orangTuaModel = new OrangTuaModel();
        $orangTua = $orangTuaModel->find($id);

        if(!$orangTua) {
            return redirect()->to(base_url('/orang_tua'))->with('error', 'Orang Tua tidak Tersedia');
        }

        $orangTuaModel->delete($id);

        return redirect()->to(base_url('/orang_tua'))->with('success' , 'Orang Tua Berhasil Disimpan');
    }
}
