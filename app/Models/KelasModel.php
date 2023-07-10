<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\GuruModel;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama_kelas',
        'tahun_ajaran',
        'jumlah_siswa',
        'id_walikelas'
    ];

    public function siswa() {
        return $this->hasMany(SiswaModel::class, 'id_kelas', 'id');
    }

    public function guru() {
        return $this->belongsTo(GuruModel::class, 'id_walikelas', 'id');
    }
    // protected $DBGroup          = 'default';
    // protected $table            = 'kelas';
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
