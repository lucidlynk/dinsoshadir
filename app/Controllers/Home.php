<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\PpksModel;
use App\Models\PmksModel;
use Kint\Renderer\Renderer;

class Home extends BaseController
{
    protected $db, $builder, $kepesertaan;
    public function __construct()
    {
        helper('form');
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('home_headline');
        $this->kepesertaan = $this->db->table('kepesertaan');
    }
    public function index()
    {
        $data['tittle']= 'Puskesos CGT DInsos Hadir';
        $this->builder->select('image,narasi,judul,sub_judul');
        $query = $this->builder->get();
        //$data['tampildata']= $query->getResult();
        // change array to object
        $data['headline']= $query->getRow();
        $this->kepesertaan->select('*');
        $query2 = $this->kepesertaan->get();
        $data['kepesertaan']= $query2->getRow();
        // dd($data);
        return view('welcome_message',$data);
    }
}
