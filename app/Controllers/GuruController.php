<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class GuruController extends BaseController
{
    public function index()
    {

        $model = new GuruModel();

        $data = [
            "activePage" => 'guru',
            "title" => 'Guru List',
            "results" => $model->findAll(),
        ];

        return view('guru/index', $data);
    }

    public function show($id)
    {
        $guruModel = new GuruModel();

        $guru = $guruModel->find($id);

        if ($guru) {
            $data = [
                "id" => $guru['id'],
                "nama_guru" => $guru['nama_guru'],
                "jenis_kelamin" => $guru['jenis_kelamin'],
                "tempat_lahir" => $guru['tempat_lahir'],
                "tanggal_lahir" => date('j F Y', strtotime($guru['tanggal_lahir'])),
                "alamat" => $guru['alamat'],
                "nomor_telepon" => $guru['nomor_telepon'],
                "email" => $guru['email'],
                "gelar" => $guru['gelar'],
                "tanggal_bergabung" => date('j F Y', strtotime($guru['tanggal_bergabung'])),
            ];

            $data = [
                "activePage" => "guru",
                "title" => "Guru Detail",
                "result" => $data,
            ];

            return view('guru/detail', $data);
        }
    }

    public function create()
    {
        session();
        $data = [
            'activePage' => 'guru',
            'title' => 'Tambah Guru',
        ];

        return view('guru/tambah', $data);
    }

    public function store()
    {
        $namaGuru = $this->request->getPost('nama_guru');
        $jenisKelamin = $this->request->getPost('jenis_kelamin');
        $tempatLahir = $this->request->getPost('tempat_lahir');
        $tanggalLahir = $this->request->getPost('tanggal_lahir');
        $alamat = $this->request->getPost('alamat');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
        $tanggalBergabung = $this->request->getPost('tanggal_bergabung');

        $validationRules = [
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required|numeric',
            'email' => 'required|valid_email|is_unique[guru.email]',
            'tanggal_bergabung' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $guruModel = new GuruModel();

        $data = [
            'nama_guru' => $namaGuru,
            'jenis_kelamin' => $jenisKelamin,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $alamat,
            'nomor_telepon' => $nomorTelepon,
            'email' => $email,
            'tanggal_bergabung' => $tanggalBergabung,
        ];

        $guruModel->insert($data);

        return redirect()->to(base_url('/guru'));
    }

    public function edit($id)
    {
        $guruModel = new GuruModel();

        $guru = $guruModel->find($id);

        if ($guru) {
            $data = [
                "id" => $guru['id'],
                "nama_guru" => $guru['nama_guru'],
                "jenis_kelamin" => $guru['jenis_kelamin'],
                "tempat_lahir" => $guru['tempat_lahir'],
                "tanggal_lahir" => $guru['tanggal_lahir'],
                "alamat" => $guru['alamat'],
                "nomor_telepon" => $guru['nomor_telepon'],
                "email" => $guru['email'],
                "gelar" => $guru['gelar'],
                'tanggal_bergabung' => $guru['tanggal_bergabung']
            ];

            $dataPage = [
                'activePage' => 'guru',
                'title' => 'Guru Edit',
                'result' => $data,
            ];

            return view('guru/edit', $dataPage);
        }
    }

    public function update($id)
    {
        $namaGuru = $this->request->getPost('nama_guru');
        $jenisKelamin = $this->request->getPost('jenis_kelamin');
        $tempatLahir = $this->request->getPost('tempat_lahir');
        $tanggalLahir = $this->request->getPost('tanggal_lahir');
        $alamat = $this->request->getPost('alamat');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
        $tanggalBergabung = $this->request->getPost('tanggal_bergabung');

        $validationRules = [
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required|numeric',
            'email' => "required|valid_email|is_unique[guru.email,id,$id]",
            'tanggal_bergabung' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $guruModel = new GuruModel();

        $data = [
            'nama_guru' => $namaGuru,
            'jenis_kelamin' => $jenisKelamin,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $alamat,
            'nomor_telepon' => $nomorTelepon,
            'email' => $email,
            'tanggal_bergabung' => $tanggalBergabung,
        ];

        $guruModel->update($id, $data);

        return redirect()->to(base_url('/guru'))->with('success', 'Data guru berhasil diperbarui');
    }

    public function delete($id) {
        $guruModel = new GuruModel();
        $guru = $guruModel->find($id);

        if(!$guru) {
            return redirect()->to(base_url('/guru'))->with('error', 'Guru tidak Tersedia');
        }
        $guruModel->delete($id);

        return redirect()->to(base_url('/guru'))->with('success', 'Guru Berhasil Dihapus');
    }
}

// nama_guru
// jenis_kelamin
// tempat_lahir
// tanggal_lahir
// alamat
// nomor_telepon
// email
// gelar
// tanggal_bergabung
