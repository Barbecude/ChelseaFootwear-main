<?php

class Hrd_mdl extends CI_Model {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
            //$this->load->model('Hrd_mdl');
    }
    public function get_one_absensi()
    {
        return $this->db->query('SELECT * FROM absensi ORDER BY id_absen ASC')->result_array();
    }
    public function index() {
        $payroll = $this->db->query('SELECT * FROM absensi ORDER BY id_absen ASC')->result_array();

        $data = [
            'breadcum'          => 'hrd',
            'link_edit'         => 'hrd/hrd_edit',
            'link_tambah'       => 'hrd/absensi',
            'hrd'               => $hrd
               
        ];
        $this->template->display('hrd/masuk/index', $data);
    }
    public function hrd_create()
    {
        
        $datasimpan = [
                'id_person'        => $this->input->post('id_person'),
            //  'tanggal'          => $this->input->post('tanggal'),
                'jam_masuk'        => $this->input->post('jam_masuk'),
                'jam_keluar'       => $this->input->post('jam_keluar'),
            //  'task_kerja'       => $this->input->post('task_kerja'),
        ];
        $ok = $this->db->insert('absensi', $this->input->post());
        return $ok;

        
        }

    
    public function hrd_edit()
    {
        $update = [
             'id_person'        => $this->input->post('id_person'),
             'tanggal'          => $this->input->post('tanggal'),
             'jam_masuk'        => $this->input->post('jam_masuk'),
             'jam_keluar'       => $this->input->post('jam_keluar'),
             'task_kerja'       => $this->input->post('task_kerja'),
        ];

        $this->db->where('id_absen', $this->input->post('id_absen'));
        $ok = $this->db->insert('absensi', $update);
        return $ok;

        if($ok){
            json_encode($ok);
        }
    }
    
}
?>  