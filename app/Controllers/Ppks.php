<?php

namespace App\Controllers;


use App\Models\PmksModel;

class Ppks extends BaseController
{
    protected $db, $builder,$pmksModel;
    public function __construct()
    {
        helper('form');
        $this->pmksModel = new PmksModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('pmks');
    }

    public function index()
    {
        $data=[
            'tittle' => 'PPKS',
            'pmks' => $this->pmksModel->getPmks(),
            'validation'=> \Config\Services::validation() //panggil validation
        ];
        return view('ppks/index',$data);
    }

    
}
