<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
    }
    public function index() {
        $data = [
            'pegawai' => $this->db->query('SELECT COUNT(pid) as jml_pegawai FROM person WHERE pid  AND aktif="t"')->row_array(),
        ];
        if( $this->session->userdata('role')== 'Admin'){
            $this->template->display('dashboard', $data);
        }else{
            redirect('welcome');
    }
}

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
