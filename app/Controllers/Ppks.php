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

    public function import()
    {
        if (!$this->validate([
            'file_excel' => [
                'rules' => 'uploaded[file_excel]|max_size[file_excel,10240]|ext_in[file_excel,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'File Upload Masih Kosong',
                    'max_size' => 'Max ukuran file 10 Mb',
                    'ext_in' => 'File Harus dalam bentuk .xls atau .xlsx',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

            // //pdf
            // $filebaru= $this->request->getFile('file');
         
            // //generate nama file random
            // $namaFile= $filebaru->getRandomName();
            // //upload gamabar
            // $filebaru->move('file',$namaFile);
            
            
        $file = $this->request->getFile('file_excel');
        $ext = $file->getClientExtension();

        if($ext == 'xls'){
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else{
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file);
        $sheet= $spreadsheet->getActiveSheet()->toArray();

        $dataGagal = 0;
        $dataBerhasil = 0;
        foreach ($sheet as $x => $excel) {
            //skip judul tabel
            if($x==0){
                continue;
            }

            //skip jika ada data yang sama
            $nik = $this->usulkisModel->cekdata($excel['3']);
            if (empty($nik)) {
                $nik['nik']='';
            }
            if ($excel['3'] == $nik['nik']) {
                $dataGagal++;         
                continue;
            }
            
            $data = [
                'noka' => $excel['1'],
                'kk' => $excel['2'],
                'nik' => $excel['3'],
                'nama'=> $excel['4'],
                'pisat' => $excel['5'],
                'tmp_lahir' => $excel['6'],
                'tgl_lahir' => $excel['7'],
                'jk' => $excel['8'],
                'status' => $excel['9'],
                'alamat' => $excel['10'],
                'kd_pos' => $excel['11'],
                'kecamatan' => $excel['12'],
                'desa' => $excel['13'],
                'userid' => user()->id,
            ];
            if($data['nik']==''){
                continue;
            }else{
                $this->usulkisModel->save($data);
                $dataBerhasil++;
            }
            
        }
        session()->setFlashdata('pesan',$dataBerhasil.' Data berhasil ditambahkan');
        return redirect()->to('kis/input');
    }

    
}
