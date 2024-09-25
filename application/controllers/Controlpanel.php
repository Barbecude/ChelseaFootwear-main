<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controlpanel extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('id_pegshift')) // Jika tidak ada
            //redirect('login'); // Redirect ke halaman login

        $this->load->model('m_controlpanel');
    }
    public function index() {
        $this->template->display('dashboard');
    }

    public function klien() {
        $data = [
            'breadcum'          => 'KLIEN WEBSITE',
            'link_tambah'       => 'controlpanel/klien_add',
        ];
        $this->template->display('controlpanel/klien/index', $data);
    }
     public function klien_add() {
        $data = [
            'breadcum'          => 'KLIEN WEBSITE',
        ];
        $this->template->display('controlpanel/klien/add', $data);
    }

    // START PEGAWAI SHIFT
    public function pegawaishift()
    {
        $data = [
            'breadcum'          => 'Control Panel Pegawai Shift',
            'link_tambah'       => 'controlpanel/pegawaishift_add',
            'pegawaishift'      => $this->m_controlpanel->get_pegawaishift(),
        ];
        $this->template->display('controlpanel/pegawaishift/index', $data);
    }
    public function pegawaishift_add()
    {
        $data = [
            'breadcum'          => 'Control Panel Pegawai Shift',
            'link_simpan'       => 'controlpanel/simpan_pegawaishift',
            'shift'             => $this->m_controlpanel->get_shift(),
            'pegawai'           => $this->m_controlpanel->get_pegawai()
        ];
        $this->template->display('controlpanel/pegawaishift/add', $data);
    }
    public function pegawaishift_create()
    {
        $this->m_controlpanel->insert_pegawaishift();

        if($ok){
            json_encode($ok);
        }
    }
    public function pegawaishift_edit()
    {
        $data = [
            'breadcum'          => 'Control Panel Pegawai Shift',
            'link_simpan'       => 'controlpanel/simpan_edit_pegawaishift',
            'pegawaishift'      => $this->m_controlpanel->get_one_pegawaishift(),
            'shift'             => $this->m_controlpanel->get_shift(),
            'pegawai'           => $this->m_controlpanel->get_pegawai()
            
        ];
        $this->template->display('controlpanel/pegawaishift/edit', $data);
    }
    public function pegawaishift_update()
    {
        $this->m_controlpanel->update_pegawaishift();

        if($ok){
            json_encode($ok);
        }
    }
    
    public function pegawaishift_aktif()
    {
        $ok = $this->m_controlpanel->aktif_pegawaishift();

        if($ok){
            die('<script>alert("Data Berhasil Di Aktif/Non Aktif"); window.location.replace("'.base_url("controlpanel/pegawaishift").'");</script>');
        }else{
            die('<script>alert("Data Gagal Di Aktif/Non Aktif"); window.location.replace('.base_url("controlpanel/pegawaishift").');</script>');
        }
    }

    // END PEGAWAI SHIFT
}

?>