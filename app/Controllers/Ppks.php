<?php

namespace App\Controllers;

use App\Models\ApbdModel;
use App\Models\UsulkisModel;
use App\Models\PrioritasModel;

class Ppks extends BaseController
{
    protected $apbdModel,$db, $builder;
    public function __construct()
    {
        helper('form');
        $this->apbdModel= new ApbdModel();
        $this->usulkisModel= new UsulkisModel();
        $this->prioritasModel= new PrioritasModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('usul_kis');
    }

    public function index()
    {
        $data=[
            'tittle' => 'PPKS'
        ];
        return view('ppks/index',$data);
    }

    
}
