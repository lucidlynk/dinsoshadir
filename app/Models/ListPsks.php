<?php

namespace App\Models;

use CodeIgniter\Model;

class ListPsks extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'psks';
    protected $primaryKey       = 'id_psks';
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

    public function getPsks($id=false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id_psks'=>$id])->first();
    }

    public function getPsksByRekap()
    {
        $this->db      = \Config\Database::connect();
        $q = $this->db->query("SELECT DISTINCT(nama_psks),(SELECT COUNT(nama) FROM tb_psks WHERE tb_psks.id_pks=psks.id_psks) AS jumlah, (SELECT COUNT(jk) FROM tb_psks WHERE tb_psks.id_pks=psks.id_psks AND tb_psks.jk='1') AS Pria, (SELECT COUNT(jk) FROM tb_psks WHERE tb_psks.id_pks=psks.id_psks AND tb_psks.jk='2') AS Wanita FROM psks LEFT JOIN tb_psks ON tb_psks.id_pks=psks.id_psks;");
        $rekap = $q->getResultArray();
        return $rekap;
    }

    public function getDownload()
    {
        $this->db      = \Config\Database::connect();
        $q = $this->db->query("SELECT * FROM tb_psks INNER JOIN psks ON psks.id_psks=tb_psks.id_pks;");
        $dl = $q->getResultArray();
        return $dl;
    }
}
