<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\ListPsks;
use App\Models\PsksModel;
use Kint\Renderer\Renderer;
use phpDocumentor\Reflection\Types\Null_;

class Psks extends BaseController
{
    protected $db, $builder,$pmksModel;
    public function __construct()
    {
        helper('form');
        $this->ListPsks = new ListPsks();
        $this->psksModel = new PsksModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('tb_psks');
    }

    public function index()
    {
        $data=[
            'tittle' => 'PPKS',
            'psks' => $this->ListPsks->getPsks(),
            'validation'=> \Config\Services::validation() //panggil validation
        ];
        return view('psks/index',$data);
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
            //change tgl to date
            $excel[4] = date('Y-m-d', strtotime($excel[4]));

            //skip judul tabel
            if($x==0){
                continue;
            }
            $idpsks=$this->request->getPost('psks');
            //skip jika ada data yang sama
            $array = array('nik' => $excel['1'], 'id_psks' => $idpsks);
            // $nik = $this->psksModel->cekdata($excel['1']);
            $nik = $this->psksModel->cekdata($array);
            if (isset($nik)) {
                $dataPSKS=$nik['id_psks'];
            }else{
                $dataPSKS='';
            }
            
            if (empty($nik)) {
                $nik['nik']='';
            }
            if ($excel['1'] == $nik['nik'] AND $idpsks == $dataPSKS) {
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
                'id_psks' => $this->request->getPost('psks'),
                'data_user' => user()->id,
                'tahun' => $this->request->getPost('tahun')
            ];
            if($data['nik']==''){
                continue;
            }else{
                $this->psksModel->save($data);
                $dataBerhasil++;
            }
            
        }
        session()->setFlashdata('pesan',$dataBerhasil.' Data berhasil ditambahkan, '.$dataGagal.' Data gagal');
        return redirect()->to('psks/index');
    }


    // create function to export database to csv
    public function export_excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nik');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Tmp_lahir');
        $sheet->setCellValue('E1', 'Tgl_lahir');
        $sheet->setCellValue('F1', 'Jenis Kelamin');
        $sheet->setCellValue('G1', 'Alamat');
        $sheet->setCellValue('H1', 'Kecamatan');
        $sheet->setCellValue('I1', 'Desa');
        $sheet->setCellValue('J1', 'Jenis PSKS');

        $sheet->getStyle('A1:J1')->getFont()->setBold(true);

        $data = $this->ListPsks->getDownload();
        $no = 1;
        $i = 2;
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $i, $no);
            $sheet->setCellValue('B' . $i, "'".$d['nik']);
            $sheet->setCellValue('C' . $i, $d['nama']);
            $sheet->setCellValue('D' . $i, $d['tmp_lahir']);
            $sheet->setCellValue('E' . $i, $d['tgl_lahir']);
            $sheet->setCellValue('F' . $i, $d['jk']);
            $sheet->setCellValue('G' . $i, $d['alamat']);
            $sheet->setCellValue('H' . $i, $d['kecamatan']);
            $sheet->setCellValue('I' . $i, $d['desa']);
            $sheet->setCellValue('J' . $i, $d['nama_psks']);
            $i++;
            $no++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_psks'.date('Y-m-d_H-i-s').'.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        redirect()->to('psks/rekap');
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
            'tittle' => 'Data PSKS',
            'tampildata' => '',
            'tampil' => $this->ListPsks->getPsks(),
            'validation'=> \Config\Services::validation() 
        ];
        return view('psks/data',$data);
    }

    public function tampil()
    {
        $psks=$this->request->getVar('psks');
        $data=[
            'tittle' => 'Data PSKS',
            'tampil' => $this->ListPsks->findAll()
        ];
        
        if ($psks) {
                
        if (user()->id==8) {
            //fungsi untuk deleteall berdasarkan lampiran berkas
            // $q = $this->db->query("SELECT DISTINCT berkas,usul_kis.created_at AS pengajuan, COUNT(id_usul) AS jml, username FROM usul_kis INNER JOIN users ON usul_kis.userid=users.id GROUP BY berkas ORDER BY usul_kis.created_at DESC;");
            // $data['tampilhapus'] = $q->getResultArray();
            //tampilan datatable
            $this->builder->select('id_pks,nik,nama,tmp_lahir,tgl_lahir,jk,alamat,kecamatan,desa,nama_psks,username,tahun');
            $this->builder->join('users', 'tb_psks.data_user = users.id');
            $this->builder->join('psks', 'tb_psks.id_psks = psks.id_psks');
            if ($psks!=0) {
                $this->builder->where('tb_psks.id_psks',$psks);
            }
            
        }else{
            //fungsi untuk deleteall berdasarkan lampiran berkas
            // $idk=user()->id;
            // $q = $this->db->query("SELECT DISTINCT berkas,usul_kis.created_at AS pengajuan, COUNT(id_usul) AS jml FROM usul_kis INNER JOIN users ON usul_kis.userid=users.id WHERE users.id={$idk} GROUP BY berkas ORDER BY usul_kis.created_at DESC;");
            // $data['tampilhapus'] = $q->getResultArray();
            //tampilan datatable
            $this->builder->select('id_ppks,nik,nama,tmp_lahir,tgl_lahir,jk,alamat,kecamatan,desa,nama_pmks,username,tahun');
            $this->builder->join('users', 'ppks.data_user = users.id');
            $this->builder->join('pmks', 'ppks.id_pmks = pmks.id_pmks');
            if ($psks!=0) {
                $this->builder->where('tb_psks.id_psks',$psks);
            }
            $this->builder->where('tb_psks.data_user',user()->id);
        }
        $query = $this->builder->get();
        $data['tampildata']= $query->getResult();
        }else {
            $data['tampildata']= '';
        }
        return view('psks/data',$data);
    }

    public function update() {
        // $id= $this->request->getPost('tgl_lahir');
        // dd($id);
        $this->psksModel->save([
            'id_pks' => $this->request->getPost('id'),
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
        ]); 
        session()->setFlashdata('pesan','Data berhasil diubah');
        return redirect()->to('/psks/data');
    }
    public function delete($id)
    {
        $this->builder->delete(['id_pks' => $id]);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('/psks/data');
    }

    public function rekap()
    {
        $data=[
            'tittle' => 'Rekap Data PSKS',
            'tampildata' => $this->ListPsks->getPsksByRekap(),
            'validation'=> \Config\Services::validation() 
        ];
        return view('psks/rekap',$data);
    }

}
