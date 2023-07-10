<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\SiswaModel;

class OrangTuaModel extends Model
{
    protected $table = "orang_tua";
    protected $useTimestamps = true ;
    protected $allowedFields = ['nama_orangtua','nomor_telepon','alamat','email','hubungan_dengan_siswa'];

    public function siswa() {
        return $this->hasMany(SiswaModel::class, 'id_orangTua', 'id');
    }
    // protected $DBGroup          = 'default';
    // protected $table            = 'orangtuas';
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
