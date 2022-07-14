<?php

namespace App\Models;

use CodeIgniter\Model;

class InovasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'inovasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'image','judul','tgl','link','isi','team'
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

    // create fungction get all data inovasi from database sorted by date
    public function getAllInovasi()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('inovasi');
        $this->builder->select('*');
        $this->builder->orderBy('tgl', 'DESC');
        $query = $this->builder->get();
        return $query->getResult();
    }
}
