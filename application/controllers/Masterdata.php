<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Masterdata extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login

        $this->load->model('m_masterdata');
    }
    public function index() {
        $this->template->display('dashboard');
    }
    // START USER
    public function user()
    {
        $data = [
            'user'  => $this->m_masterdata->get_user(),
        ];
        $this->template->display('masterdata/user/index', $data);
    }
    public function user_add()
    {
        $data = [
            'person'    =>  $this->m_masterdata->get_pegawai(),
        ];
        $this->template->display('masterdata/user/add', $data);
    }
    // END USER

    // START PEGAWAI
    public function pegawai()
    {
        $data = [
            'breadcum'          => 'Masterdata Pegawai',
            'link_tambah'       => 'masterdata/pegawai_add',
            'pegawai'           => $this->m_masterdata->get_pegawai_all(),
        ];
        $this->template->display('masterdata/pegawai/index', $data);
    }
    public function pegawai_add()
    {
        $data = [
            'breadcum'          => 'Masterdata Pegawai',
            'link_simpan'       => 'masterdata/simpan_pegawai',
          
        ];
        $this->template->display('masterdata/pegawai/add', $data);
    }
    public function pegawai_create()
    {
        $this->m_masterdata->insert_pegawai();

        if($ok){
            json_encode($ok);
        }
    }
    public function pegawai_edit()
    {
        $data = [
            'breadcum'          => 'Masterdata Pegawai',
            'link_simpan'       => 'masterdata/simpan_edit_pegawai',
            'pegawai'           => $this->m_masterdata->get_one_pegawai(),
            'jabatan'           => $this->m_masterdata->get_jabatan(),
            'gelar'             => $this->m_masterdata->get_gelar(),
            'agama'             => $this->m_masterdata->get_agama(),
        ];
        $this->template->display('masterdata/pegawai/edit', $data);
    }
    public function pegawai_update()
    {
        $this->m_masterdata->update_pegawai();

        if($ok){
            json_encode($ok);
        }
    }
    public function pegawai_delete()
    {
        $ok = $this->m_masterdata->delete_pegawai();

        if($ok){
            die('<script>alert("Data Berhasil Di Aktif/Non Aktif"); window.location.replace("'.base_url("masterdata/pegawai").'");</script>');
        }else{
            die('<script>alert("Data Gagal Di Aktif/Non Aktif"); window.location.replace('.base_url("masterdata/pegawai").');</script>');
        }
    }
    public function pegawai_hapus()
     {
        $ok = $this->m_masterdata->hapus_pegawai();

        if($ok){
            die('<script>alert("Data Berhasil Di hapus"); window.location.replace("'.base_url("masterdata/pegawai").'");</script>');
        }else{
            die('<script>alert("Data Gagal Di hapus"); window.location.replace('.base_url("masterdata/pegawai").');</script>');
        }
     }


    // END PEGAWAI


     // START JABATAN
     public function jabatan()
     {
         $data = [
             'breadcum'          => 'Masterdata Jabatan',
             'link_tambah'       => 'masterdata/jabatan_add',
             'jabatan'           => $this->m_masterdata->get_jabatan_all(),
         ];
         $this->template->display('masterdata/jabatan/index', $data);
     }
     public function jabatan_add()
     {
         $data = [
             'breadcum'          => 'Masterdata Jabatan',
             'link_simpan'       => 'masterdata/simpan_jabatan',
         ];
         $this->template->display('masterdata/jabatan/add', $data);
     }
     public function jabatan_create()
     {
         $this->m_masterdata->insert_jabatan();
 
         if($ok){
             json_encode($ok);
         }
     }
     public function jabatan_edit()
     {
         $data = [
             'breadcum'          => 'Masterdata Jabatan',
             'link_simpan'       => 'masterdata/simpan_edit_jabatan',
             'jabatan'           => $this->m_masterdata->get_one_jabatan(),
         ];
         $this->template->display('masterdata/jabatan/edit', $data);
     }
     public function jabatan_update()
     {
         $this->m_masterdata->update_jabatan();
 
         if($ok){
             json_encode($ok);
         }
     }
     public function jabatan_aktif()
     {
         $ok = $this->m_masterdata->aktif_jabatan();
 
         if($ok){
             die('<script>alert("Data Berhasil Di Aktif/Non Aktif"); window.location.replace("'.base_url("masterdata/jabatan").'");</script>');
         }else{
             die('<script>alert("Data Gagal Di Aktif/Non Aktif"); window.location.replace('.base_url("masterdata/jabatan").');</script>');
         }
     }
     // END Jabatan

     
     // START AGAMA
     public function agama()
     {
         $data = [
             'breadcum'          => 'Masterdata Agama',
             'link_tambah'       => 'masterdata/agama_add',
             'agama'           => $this->m_masterdata->get_agama_all(),
         ];
         $this->template->display('masterdata/agama/index', $data);
     }
     public function agama_add()
     {
         $data = [
             'breadcum'          => 'Masterdata Agama',
             'link_simpan'       => 'masterdata/simpan_agama',
         ];
         $this->template->display('masterdata/agama/add', $data);
     }
     public function agama_create()
     {
         $this->m_masterdata->insert_agama();
 
         if($ok){
             json_encode($ok);
         }
     }
     public function agama_edit()
     {
         $data = [
             'breadcum'          => 'Masterdata Jabatan',
             'link_simpan'       => 'masterdata/simpan_edit_agama',
             'agama'           => $this->m_masterdata->get_one_agama(),
         ];
         $this->template->display('masterdata/agama/edit', $data);
     }
     public function agama_update()
     {
         $this->m_masterdata->update_agama();
 
         if($ok){
             json_encode($ok);
         }
     }
     public function agama_aktif()
     {
         $ok = $this->m_masterdata->aktif_agama();
 
         if($ok){
             die('<script>alert("Data Berhasil Di Aktif/Non Aktif"); window.location.replace("'.base_url("masterdata/agama").'");</script>');
         }else{
             die('<script>alert("Data Gagal Di Aktif/Non Aktif"); window.location.replace('.base_url("masterdata/agama").');</script>');
         }
     }
     // END Agama



     // START GELAR
     public function gelar()
     {
         $data = [
             'breadcum'          => 'Masterdata Gelar',
             'link_tambah'       => 'masterdata/gelar_add',
             'gelar'           => $this->m_masterdata->get_gelar_all(),
         ];
         $this->template->display('masterdata/gelar/index', $data);
     }
     public function gelar_add()
     {
         $data = [
             'breadcum'          => 'Masterdata Gelar',
             'link_simpan'       => 'masterdata/simpan_gelar',
         ];
         $this->template->display('masterdata/gelar/add', $data);
     }
     public function gelar_create()
     {
         $this->m_masterdata->insert_gelar();
 
         if($ok){
             json_encode($ok);
         }
     }
     public function gelar_edit()
     {
         $data = [
             'breadcum'          => 'Masterdata Gelar',
             'link_simpan'       => 'masterdata/simpan_edit_gelar',
             'gelar'           => $this->m_masterdata->get_one_gelar(),
         ];
         $this->template->display('masterdata/gelar/edit', $data);
     }
     public function gelar_update()
     {
         $this->m_masterdata->update_gelar();
 
         if($ok){
             json_encode($ok);
         }
     }
     
     public function gelar_aktif()
     {
         $ok = $this->m_masterdata->aktif_gelar();
 
         if($ok){
             die('<script>alert("Data Berhasil Di Aktif/Non Aktif"); window.location.replace("'.base_url("masterdata/gelar").'");</script>');
         }else{
             die('<script>alert("Data Gagal Di Aktif/Non Aktif"); window.location.replace('.base_url("masterdata/gelar").');</script>');
         }
     }

     // END GELAR

    
     // START SHIFT
     public function shift()
     {
         $data = [
             'breadcum'          => 'Masterdata Shift',
             'link_tambah'       => 'masterdata/shift_add',
             'shift'             => $this->m_masterdata->get_shift_all(),
         ];
         $this->template->display('masterdata/shift/index', $data);
     }
     public function shift_add()
     {
         $data = [
             'breadcum'          => 'Masterdata Shift',
             'link_simpan'       => 'masterdata/simpan_shift',
         ];
         $this->template->display('masterdata/shift/add', $data);
     }
     public function shift_create()
     {
         $this->m_masterdata->insert_shift();
 
         if($ok){
             json_encode($ok);
         }
     }
     public function shift_edit()
     {
         $data = [
             'breadcum'          => 'Masterdata Shift',
             'link_simpan'       => 'masterdata/simpan_edit_shift',
             'shift'           => $this->m_masterdata->get_one_shift(),
         ];
         $this->template->display('masterdata/shift/edit', $data);
     }
     public function shift_update()
     {
         $this->m_masterdata->update_shift();
 
         if($ok){
             json_encode($ok);
         }
     }
     
     public function shift_aktif()
     {
         $ok = $this->m_masterdata->aktif_shift();
 
         if($ok){
             die('<script>alert("Data Berhasil Di Aktif/Non Aktif"); window.location.replace("'.base_url("masterdata/shift").'");</script>');
         }else{
             die('<script>alert("Data Gagal Di Aktif/Non Aktif"); window.location.replace('.base_url("masterdata/shift").');</script>');
         }
     }

     // END SHIFT
}
    