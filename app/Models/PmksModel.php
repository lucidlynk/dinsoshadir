<?php

namespace App\Models;

use CodeIgniter\Model;

class PmksModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pmks';
    protected $primaryKey       = 'id_pmks';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
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

    public function getPmks($id=false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id_pmks'=>$id])->first();
    }

    public function getPmksByRekap()
    {
        $this->db      = \Config\Database::connect();
        $q = $this->db->query("SELECT nama_pmks,(SELECT COUNT(nama) FROM ppks WHERE ppks.id_pmks=pmks.id_pmks) AS jumlah FROM pmks LEFT JOIN ppks ON ppks.id_pmks=pmks.id_pmks;");
        $rekap = $q->getResultArray();
        return $rekap;
    }
}
