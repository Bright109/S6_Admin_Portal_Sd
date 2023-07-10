<?php

namespace App\Models;

use App\Models\KelasModel;
use App\Models\OrangTuaModel;
use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_siswa', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'nomor_telepon', 'id_orangTua', 'id_kelas'];

    public function orangTua()
    {
        return $this->belongsTo(OrangTuaModel::class, 'id_orangTua', 'id');
    }

    public function Kelas()
    {
        return $this->belongsTo(KelasModel::class, 'id_kelas', 'id');
    }
    // protected $DBGroup          = 'default';
    // protected $table            = 'siswas';
    // protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    // protected $allowedFields    = [];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
