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
            $nik = $this->ppksModel->cekdata($excel['1']);
            if (empty($nik)) {
                $nik['nik']='';
            }
            if ($excel['1'] == $nik['nik']) {
                $dataGagal++;         
                continue;
            }
            
            $data = [
                'nik' => $excel['1'],
                'nama' => $excel['2'],
                'tmp_lahir' => $excel['3'],
                'tgl_lahir'=> $excel['4'],
                'jk' => $excel['5'],
                'alamat' => $excel['6'],
                'kecamatan' => $excel['7'],
                'desa' => $excel['8'],
                'id_pmks' => $this->request->getPost('ppks'),
                'data_user' => user()->id,
                'tahun' => $this->request->getPost('tahun')
            ];
            if($data['nik']==''){
                continue;
            }else{
                $this->ppksModel->save($data);
                $dataBerhasil++;
            }
            
        }
        session()->setFlashdata('pesan',$dataBerhasil.' Data berhasil ditambahkan');
        return redirect()->to('ppks/index');
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

    
    // create function to export database to pdf with mpdf
    // public function export_pdf()
    // {
    //     $data = $this->usulkisModel->findAll();
    //     $mpdf = new \Mpdf\Mpdf();
    //     $html = '<h3>Data Usulan KIS</h3>
    //     <table border="1" cellpadding="5" cellspacing="0">
    //         <tr>
    //             <th>No</th>
    //             <th>Noka</th>
    //             <th>Kk</th>
    //             <th>Nik</th>
    //             <th>Nama</th>
    //             <th>Pisat</th>
    //             <th>Tmp_lahir</th>
    //             <th>Tgl_lahir</th>
    //             <th>Jk</th>
    //             <th>Status</th>
    //             <th>Alamat</th>
    //             <th>Kd_pos</th>
    //             <th>Kecamatan</th>
    //             <th>Desa</th>
    //         </tr>';
    //     $i=0;
    //     foreach ($data as $d) {
    //         $i++;
    //         $html.='<tr>
    //             <td>'.$i.'</td>
    //             <td>'.$d['noka'].'</td>
    //             <td>'.$d['kk'].'</td>
    //             <td>'.$d['nik'].'</td>
    //             <td>'.$d['nama'].'</td>
    //             <td>'.$d['pisat'].'</td>
    //             <td>'.$d['tmp_lahir'].'</td>
    //             <td>'.$d['tgl_lahir'].'</td>
    //             <td>'.$d['jk'].'</td>
    //             <td>'.$d['status'].'</td>
    //             <td>'.$d['alamat'].'</td>
    //             <td>'.$d['kd_pos'].'</td>
    //             <td>'.$d['kecamatan'].'</td>
    //             <td>'.$d['desa'].'</td>
    //         </tr>';
    //     }
    //     $html.='</table>';
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output('Data_usul_kis_'.date('Y-m-d_H-i-s').'.pdf', 'I');
    // }


    // create function to export database to pdf with dompdf
    // public function export_pdf()
    // {
    //     $data = $this->usulkisModel->findAll();
    //     $html = '<h3>Data Usulan KIS</h3>
    //     <table border="1" cellpadding="5" cellspacing="0">
    //         <tr>
    //             <th>No</th>
    //             <th>Noka</th>
    //             <th>Kk</th>
    //             <th>Nik</th>
    //             <th>Nama</th>
    //             <th>Pisat</th>
    //             <th>Tmp_lahir</th>
    //             <th>Tgl_lahir</th>
    //             <th>Jk</th>
    //             <th>Status</th>
    //             <th>Alamat</th>
    //             <th>Kd_pos</th>
    //             <th>Kecamatan</th>
    //             <th>Desa</th>
    //         </tr>';
    //     $i=0;
    //     foreach ($data as $d) {
    //         $i++;
    //         $html.='<tr>
    //             <td>'.$i.'</td>
    //             <td>'.$d['noka'].'</td>
    //             <td>'.$d['kk'].'</td>
    //             <td>'.$d['nik'].'</td>
    //             <td>'.$d['nama'].'</td>
    //             <td>'.$d['pisat'].'</td>
    //             <td>'.$d['tmp_lahir'].'</td>
    //             <td>'.$d['tgl_lahir'].'</td>
    //             <td>'.$d['jk'].'</td>
    //             <td>'.$d['status'].'</td>
    //             <td>'.$d['alamat'].'</td>
    //             <td>'.$d['kd_pos'].'</td>
    //             <td>'.$d['kecamatan'].'</td>
    //             <td>'.$d['desa'].'</td>
    //         </tr>';
    //     }
    //     $html.='</table>';
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper('A4', 'landscape');
    //     $dompdf->render();
    //     $dompdf->stream('Data_usul_kis_'.date('Y-m-d_H-i-s').'.pdf', array('Attachment' => 0));
    // }

    //create function menu sidebar active with uri segment
    // public function menu_aktif($uri)
    // {
    //     $uri = explode('/', $uri);
    //     $uri = end($uri);
    //     return $uri;
    // }

    public function data()
    {
        $data=[
            'tittle' => 'Data PPKS',
            'tampildata' => '',
            'tampil' => $this->pmksModel->getPmks(),
            'validation'=> \Config\Services::validation() 
        ];
        return view('ppks/data',$data);
    }

}
