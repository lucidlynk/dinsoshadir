<?php

namespace App\Controllers;
use App\Models\HomeAbout;

class Menu extends BaseController
{
    protected $db, $builder,$homeAbout;
    public function __construct()
    {
        $this->homeAbout = new HomeAbout();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('home_headline');
    }
    public function index()
    {
        $data['tittle']= 'Data Headline Home';
        // $users= new \Myth\Auth\Models\UserModel();
        // $data['user']= $users->findAll();

        //pindah ke atas
        // $db      = \Config\Database::connect();
        // $builder = $db->table('users');
        $this->builder->select('*');
        $query = $this->builder->get();
        $data['about']= $query->getRow();
        // dd($data);
        return view('home/about',$data);
    }

    public function detail($id=0)
    {
        $data['tittle']= 'User Detail';
        $data['validation']= \Config\Services::validation();
        // $users= new \Myth\Auth\Models\UserModel();
        // $data['user']= $users->findAll();

        //pindah ke atas
        // $db      = \Config\Database::connect();
        // $builder = $db->table('users');
        $this->builder->select('*');
        $this->builder->where('id',$id);
        $query = $this->builder->get();
        $data['about']= $query->getRow();

        if(empty($data['about'])){
            return redirect()->to('/menu/about');
        }

        return view('home/detail_about',$data);
    }
    public function edit($id=0)
    {
        $data['tittle']= 'Edit User';
        $data['validation']= \Config\Services::validation();
        // $users= new \Myth\Auth\Models\UserModel();
        // $data['user']= $users->findAll();

        //pindah ke atas
        // $db      = \Config\Database::connect();
        // $builder = $db->table('users');
        $this->builder->select('users.id as userid,username,email,fullname,user_image,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id',$id);
        $query = $this->builder->get();
        $data['user']= $query->getRow();

        if(empty($data['user'])){
            return redirect()->to('/adm');
        }

        return view('user/edit',$data);
    }

    public function update($id)
    {
        
        if(!$this->validate([
            'file' => [
                'rules' => 'max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran File terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                    'mime_in' => 'Yang ada pilih bukan gambar'
                ]
            ]
        ])){
            return redirect()->to('/menu/detail/'.$this->request->getVar('id'))->withInput();
        }
        $filebaru= $this->request->getFile('file');
        //cek gambar, apakah tetap gambar lama
        if($filebaru->getError()==4){
            $namaFile=$this->request->getVar('filelama');
        } else{
            //generate nama file random /tapi saya gk buat random
            $namaFile= $filebaru->getRandomName();
            // $namaFile= $filebaru->getName();
            //upload gamabar
            $filebaru->move('img',$namaFile);
            // $filebaru->move('img');
            $fileLama= $this->request->getVar('filelama');
            if($fileLama!='default.png'){
                unlink('img/'.$this->request->getVar('filelama'));
            }
            
        }
        $this->homeAbout->save([
            'id' => $id,
            'sub_judul' => $this->request->getVar('subjudul'),
            'judul' => $this->request->getVar('judul'),
            'narasi' => $this->request->getVar('narasi'),
            'image' => $namaFile
        ]); 
        session()->setFlashdata('pesan','Data berhasil diubah');
        return redirect()->to('/Menu');
    }

    public function delete($id)
    {
        $this->builder->select('user_image');
        $this->builder->where('id',$id);
        $query = $this->builder->get();
        $file= $query->getRow();
        //hapus gambar
        unlink('img/'.$file->user_image);

        $this->builder->delete(['id' => $id]);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('/adm');
    }
}
