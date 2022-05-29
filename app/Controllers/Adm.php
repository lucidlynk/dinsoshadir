<?php

namespace App\Controllers;

class Adm extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function index()
    {
        $data['tittle']= 'User List';
        // $users= new \Myth\Auth\Models\UserModel();
        // $data['user']= $users->findAll();

        //pindah ke atas
        // $db      = \Config\Database::connect();
        // $builder = $db->table('users');
        $this->builder->select('users.id as userid,username,email,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $data['user']= $query->getResult();
        return view('admin/index',$data);
    }

    public function detail($id=0)
    {
        $data['tittle']= 'User Detail';
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

        return view('admin/detail',$data);
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
        $users= new \Myth\Auth\Models\UserModel();
        // cek judulnya dulu
        $namaLama= $users->where('id',$id)->first();
        if($namaLama->username==$this->request->getVar('username')){
            $rule_nama = 'required';
        }else{
            $rule_nama = 'required|is_unique[users.username]';
        }
        if(!$this->validate([
            'username' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field}  harus diisi',
                    'is_unique' => '{field}  sudah terdaftar'
                ]
                ],
            'file' => [
                'rules' => 'max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran File terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                    'mime_in' => 'Yang ada pilih bukan gambar'
                ]
            ]
        ])){
            return redirect()->to('/adm/edit/'.$this->request->getVar('id'))->withInput();
        }
        $filebaru= $this->request->getFile('file');
        //cek gambar, apakah tetap gambar lama
        if($filebaru->getError()==4){
            $namaFile=$this->request->getVar('filelama');
        } else{
            //generate nama file random /tapi saya gk buat random
            $namaFile= $filebaru->getName();
            //upload gamabar
            $filebaru->move('img');
            $fileLama= $this->request->getVar('filelama');
            if($fileLama!='default.png'){
                unlink('img/'.$this->request->getVar('filelama'));
            }
            
        }
        $users->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'user_image' => $namaFile
        ]); 
        session()->setFlashdata('pesan','Data berhasil diubah');
        return redirect()->to('/adm');
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
