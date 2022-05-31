<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\PpksModel;
use App\Models\PmksModel;
use Kint\Renderer\Renderer;

class Ppks extends BaseController
{
    protected $db, $builder,$pmksModel;
    public function __construct()
    {
        helper('form');
        $this->pmksModel = new PmksModel();
        $this->ppksModel = new PpksModel();
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
                'nik' => $excel['1'],
                'nama' => $excel['2'],
                'tmp_lahir' => $excel['3'],
                'tgl_lahir'=> $excel['4'],
                'jk' => $excel['5'],
                'id_pmks' => $this->request->getPost('id_pmks'),
                'data_user' => user()->id,
                'tahun' => $this->request->getPost('tahun')
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


    // create function to export database to csv
    public function export_excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Noka');
        $sheet->setCellValue('C1', 'Kk');
        $sheet->setCellValue('D1', 'Nik');
        $sheet->setCellValue('E1', 'Nama');
        $sheet->setCellValue('F1', 'Pisat');
        $sheet->setCellValue('G1', 'Tmp_lahir');
        $sheet->setCellValue('H1', 'Tgl_lahir');
        $sheet->setCellValue('I1', 'Jk');
        $sheet->setCellValue('J1', 'Status');
        $sheet->setCellValue('K1', 'Alamat');
        $sheet->setCellValue('L1', 'Kd_pos');
        $sheet->setCellValue('M1', 'Kecamatan');
        $sheet->setCellValue('N1', 'Desa');

        $sheet->getStyle('A1:N1')->getFont()->setBold(true);

        $data = $this->usulkisModel->findAll();
        $no = 1;
        $i = 2;
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $i, $no);
            $sheet->setCellValue('B' . $i, $d['noka']);
            $sheet->setCellValue('C' . $i, $d['kk']);
            $sheet->setCellValue('D' . $i, $d['nik']);
            $sheet->setCellValue('E' . $i, $d['nama']);
            $sheet->setCellValue('F' . $i, $d['pisat']);
            $sheet->setCellValue('G' . $i, $d['tmp_lahir']);
            $i++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_usul_kis_'.date('Y-m-d_H-i-s').'.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        redirect()->to('kis/input');
    }
}
