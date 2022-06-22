<?php

namespace App\Models;

use CodeIgniter\Model;

class PsksModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_psks';
    protected $primaryKey       = 'id_pks';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik','nama','tmp_lahir','tgl_lahir','jk','alamat','kecamatan','desa','id_psks','data_user','tahun'
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
    public function getPsks($id=false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id_pks'=>$id])->first();
    }
    public function cekdata($nik){
        return 
        // $this->db->table('tb_psks')->where('nik',$nik)
        $this->db->table('tb_ppks')->where($nik)
        ->get()->getRowArray();
   }
}
