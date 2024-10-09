<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
            $this->load->model('m_produk');
    }
    public function index() {
        $produk = $this->m_produk->get_produk(); // Mengambil semua produk
        $total_produk = $this->m_produk->get_total_produk(); // Mengambil total produk
    
        $data = [
            'breadcum'     => 'Produk website',
            'link_edit'    => 'produk/produk_edit',
            'link_tambah'  => 'produk/produk_add',
            'produk'       => $produk,
            'total_produk' => $total_produk // Menyimpan total produk di data
        ];
        
        $this->template->display('produk/index', $data);
    }
    
    
    public function produk_add() {
        $data = [
            'breadcum'          => 'Produk produk',
            'link_simpan'       => 'produk/simpan_produk',
        ];
        $this->template->display('produk/add', $data);
    }
    public function produk_create()
    {
        $config['upload_path']="./assets/img/produk";
        $config['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload', $config);
        if($this->upload->do_upload("gambar_satu")){
            $data1 = array('upload_data' => $this->upload->data());
            $gambar_satu = $data1['upload_data']['file_name'];

            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                echo '<pre>';
                print_r($error); // Ini akan membantu memahami kenapa upload gagal
                echo '</pre>';
            } else {
                $data = array('upload_data' => $this->upload->data());
                echo 'File berhasil diupload';
            }
            
        }else{
            $gambar_satu='';
        }

        $datasimpan = [
            'nama_produk'           => $this->input->post('nama_produk'),
            'jenis'                 => $this->input->post('jenis'),
            'deskripsi'             => $this->input->post('deskripsi'),
            'gambar_satu'           => $gambar_satu,
            'created_at'            => date('Y-m-d H:i:s'),
            'harga'             => $this->input->post('harga'),
        ];


        $ok = $this->db->insert('produk', $datasimpan);

        if($ok){
            json_encode($ok);
        }
    }

    public function produk_edit()

    {
        $data = [
            'breadcum'          => 'produk PRODUK',
            'link_simpan'       => 'produk/simpan_edit_produk',
            'produk'           => $this->m_produk->get_one_produk(),
        ];
        $this->template->display('produk/edit', $data);
    }
    
    public function produk_update()
    {
        $config['upload_path']="./assets/img/produk";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload("gambar_satu")){
            $data1 = array('upload_data' => $this->upload->data());
            $gambar_satu = $data1['upload_data']['file_name'];
        }else{
            $gambar_satu='Tidak ada gambar';
        }

        $update = [
            'nama_produk'   => $this->input->post('nama_produk'),
            'jenis'           => $this->input->post('jenis'),
            'deskripsi'           => $this->input->post('deskripsi'),
            'gambar_satu'   => $gambar_satu,
            'harga'         => $this->input->post('harga'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $ok = $this->db->update('produk', $update);

        if($ok){
            json_encode($ok);
        }
    }

    
    public function produk_delete()
    {
        $ok = $this->m_produk->delete_produk();

        if($ok){
            die('<script>alert("Data berhasil di hapus"); window.location.replace("'.base_url("produk/index").'");</script>');
        }else{
            die('<script>alert("Data gagal di hapus"); window.location.replace('.base_url("produk/index").');</script>');
        }
    }
}
