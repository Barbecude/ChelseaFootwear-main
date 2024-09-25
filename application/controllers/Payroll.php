<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payroll extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
            $this->load->model('m_payroll');
    }
    public function index() {
        $payroll = $this->db->query('SELECT * FROM payroll ORDER BY id_payroll ASC')->result_array();

        $data = [
            'breadcum'          => 'PAYROLL',
            'link_edit'         => 'hrd/payroll_edit',
            'link_tambah'       => 'hrd/payroll_add',
            'payroll'            => $payroll
               
        ];
        $this->template->display('hrd/payroll/index', $data);
    }
    public function payroll_add() {
        $data = [
            'breadcum'          => 'Hrd payroll',
            'link_simpan'       => 'hrd/simpan_payroll',
        ];
        $this->template->display('hrd/payroll/add', $data);
    }
    public function payroll_create()
    {
        
        $datasimpan = [
            'id_pegawai'    => $this->input->post('id_pegawai'),
            'id_jabatan'    => $this->input->post('id_jabatan'),
            'pokok'         => $this->input->post('pokok'),
            'potongan'      => $this->input->post('potongan'),
            'bonus'         => $this->input->post('bonus'),
            'total'         => $this->input->post('total'),
            'create_time'   => $this->input->post('create_time'),
            'create_id'     => $this->input->post('create_id'),
            'modify_time'   => $this->input->post('modify_time'),
            'modify_id'     => $this->input->post('modify_id'),
        ];


        $ok = $this->db->insert('payroll', $datasimpan);

        if($ok){
            json_encode($ok);
        }
    }

    public function payroll_edit()

    {
        $data = [
            'breadcum'          => 'Hrd payroll',
            'link_simpan'       => 'hrd/simpan_edit_payroll',
            'payroll'           => $this->m_payroll->get_one_payroll(),
        ];
        $this->template->display('hrd/payroll/edit', $data);
    }
    
    public function payroll_update()
    {
        $update = [
            'id_pegawai'    => $this->input->post('id_pegawai'),
            'id_jabatan'    => $this->input->post('id_jabatan'),
            'pokok'         => $this->input->post('pokok'),
            'potongan'      => $this->input->post('potongan'),
            'bonus'         => $this->input->post('bonus'),
            'total'         => $this->input->post('total'),
            'create_time'   => $this->input->post('create_time'),
            'create_id'     => $this->input->post('create_id'),
            'modify_time'   => $this->input->post('modify_time'),
            'modify_id'     => $this->input->post('modify_id'),
        ];

        $this->db->where('id_payroll', $this->input->post('id_payroll'));
        $ok = $this->db->update('payroll', $update);

        if($ok){
            json_encode($ok);
        }
    }

    
    public function payroll_delete()
    {
        $ok = $this->m_payroll->delete_payroll();

        if($ok){
            die('<script>alert("Data berhasil di hapus"); window.location.replace("'.base_url("hrd/payroll/index").'");</script>');
        }else{
            die('<script>alert("Data gagal di hapus"); window.location.replace('.base_url("hrd/payroll/index").');</script>');
        }
    }
}
?>