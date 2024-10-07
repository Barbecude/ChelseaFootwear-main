<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if (!$this->session->userdata('u_name')) {
            redirect('login');
        }
    }
    public function index() {
        $data = [
            'pegawai' => $this->db->query('SELECT COUNT(pid) as jml_pegawai FROM person WHERE pid  AND aktif="t"')->row_array(), //kirim data supaya bisa ditampilkan ke halaman dashboard
            'produk' => $this->db->query('SELECT COUNT(*) as jml_produk FROM produk')->row_array(),
            'user' => $this->db->query('SELECT COUNT(*) as jml_person FROM user')->row_array(),
        ];
        if( $this->session->userdata('role')== 'Admin'){
            $this->template->display('dashboard', $data);
        }else{
            redirect('welcome');
    }
}

    function logout() {
        $this->session->sess_destroy();
        redirect('welcome');
    }

}
