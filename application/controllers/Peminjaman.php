<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
            $this->load->model('m_peminjaman');
    }
    public function index() {
        $peminjaman = $this->db->query('SELECT * FROM peminjaman ORDER BY id_peminjaman ASC')->result_array();

        $data = [
            'breadcum'          => 'Peminjaman',
            'link_edit'         => 'peminjaman/peminjaman_edit',
            'link_tambah'       => 'peminjaman/add_peminjaman',
            'peminjaman'        => $peminjaman
               
        ];
        $this->template->display('peminjaman/index', $data);
    }

    public function add_peminjaman() {
        $data = [
            'breadcum'          => 'Tambah Peminjaman',
            'link_simpan'       => 'peminjaman/add_pinjam_simpan',
        ];
        $this->template->display('peminjaman/add', $data);
    }

    public function add_pinjam_simpan()
        {
            // var_dump($this->input->post());
            // die();
           $ok = $this->M_peminjaman->add_peminjaman();
           if($ok){
                echo "Ok";               
           }else{
                echo "Fail";
           }
        }

    public function peminjaman_edit()
    {
        $data = [
            'breadcum'          => 'Edit Data Peminjaman',
            'link_simpan'       => 'peminjaman/pinjam_edit_simpan',
            'peminjaman'        => $this->m_peminjaman->get_peminjaman_edit(),
        ];
        $this->template->display('peminjaman/edit', $data);
    }

    public function pinjam_edit_simpan()
    {
       $ok = $this->M_peminjaman->peminjaman_edit();
       if($ok){
            echo "Ok";               
       }else{
            echo "Fail";
       }
    }
    
    public function pinjam_delete()
    {
        $ok = $this->m_peminjaman->delete_peminjaman();

        if($ok){
            die('<script>alert("Data Peminjaman Berhasil Di Hapus"); window.location.replace("'.base_url("peminjaman/index").'");</script>');
        }else{
            die('<script>alert("Data Peminjaman Gagal Di Hapus"); window.location.replace('.base_url("peminjaman/index").');</script>');
        }
    }
}
