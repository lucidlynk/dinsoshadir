<?php

namespace App\Models;

use CodeIgniter\Model;

class UsulkisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usul_kis';
    protected $primaryKey       = 'id_usul';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'noka','kk','nik','nama','pisat','tmp_lahir','tgl_lahir','jk','status','alamat','kd_pos','kecamatan','desa','userid','berkas'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function add($data){
        $this->db->table('usul_kis')->insert($data);
    }
    public function cekdata($nik){
         return $this->db->table('usul_kis')->where('nik',$nik)
            ->get()->getRowArray();
    }
}
