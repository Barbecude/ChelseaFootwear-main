<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hrd extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login

        $this->load->model('Hrd_mdl');
    }
    public function index() {
        $this->template->display('dashboard');
    }
    public function absensi()
    {
        // $sudah_absen = "";
        // $data_absen = $this->db->query('SELECT * FROM absensi ORDER BY id_absen ASC')
        // if ($data_absen['tanggal'] != hari_ini) {
        //     if ($data_absen['jam_keluar'] != null) {
        //         $sudah_absen = 'disable';
        //     }
        // }
        $data = [
             'masuk'        => $this->db->query('SELECT * FROM absensi ORDER BY id_absen ASC')->result_array(),
             'breadcum'     =>'ABSENSI KARYAWAN',
             'link_tambah'  =>'hrd/add',
             'hrd'          => $this->Hrd_mdl->get_one_absensi(),  
        ];
        $this->template->display('hrd/masuk/index', $data);
    }

    public function add(){
        // $hrd_add = $this->db->query('SELECT * FROM absensi ORDER BY id_absen ASC')->result_array();
        // $data = [
            
        //     'breadcum'         =>'hrd absensi',
        //     'link_tambah'      =>'hrd/hrd_create',
        //     // 'hrd'              =>$hrd_add
        // ]; 
        
        // $this->template->display('hrd/masuk/index', $data);

        $datasimpan = [
            'id_person'        => $this->input->post('id_person'),
            'tanggal'          => $this->input->post('tanggal'),
            'jam_masuk'        => $this->input->post('jam_masuk'),
            'jam_keluar'       => $this->input->post('jam_keluar'),
            'task_kerja'       => $this->input->post('task_kerja'),
            
        ];


        $ok = $this->db->insert('absensi', $datasimpan);

        if($ok){
            json_encode($ok);
        }
    }

    public function add_simpan(){
        $ok = $this->Hrd_mdl->Hrd_create();
        $data = [
            'breadcum'          => 'Hrd absensi',
            'link_simpan'       => 'hrd/hrd_create',
            // 'hrd'              =>$hrd_add
        ];
        $this->$template->display('hrd/masuk/index', $data);
    }

    public function add_edit($id_person){
        //$ok = $this->Hrd_mdl->hrd_edit(); 
        $data = [  
            'person'             => $this->db->query('SELECT * FROM absensi where id_absen='.$id_person)->row_array(),
            'breadcum'          => 'hrd edit',
            'link_simpan'       => 'hrd/hrd_edit',
            // 'hrd'               => $this->Hrd_mdl->hrd_edit(),
        ];
        // var_dump($data);
        // die();
        $this->template->display('hrd/masuk/edit', $data);
    }

    // END HRD ABSENSI
    


    
    // START PAYROLL
    public function payroll()
    {
        $data = [
            'breadcum'          => 'Hrd Payroll',
            'link_tambah'       => 'hrd/payroll_add',
            'payroll'           => $this->m_hrd->get_payroll_all(),
        ];
        $this->template->display('hrd/payroll/index', $data);
    }
    public function payroll_add()
    {
        $data = [
            'breadcum'          => 'Hrd Payroll',
            'link_simpan'       => 'hrd/simpan_payroll',
        ];
        $this->template->display('hrd/payroll/add', $data);
    }
    public function payroll_create()
    {
        $this->h_hrd->insert_payroll();

        if($ok){
            json_encode($ok);
        }
    }
    public function payroll_edit()
    {
        $data = [
            'breadcum'          => 'hrd Payroll',
            'link_simpan'       => 'hrd/simpan_edit_payroll',
            'payroll'           => $this->m_hrd->get_one_payroll(),
        ];
        $this->template->display('hrd/payroll/edit', $data);
    }
    public function payroll_update()
    {
        $this->M_hrd->update_payroll();

        if($ok){
            json_encode($ok);
        }
    }
    public function payroll_delete()
    {
        $ok = $this->m_hrd->delete_payroll();

        if($ok){
            die('<script>alert("Payroll Berhasil Di hapus"); window.location.replace("'.base_url("hrd/payroll").'");</script>');
        }else{
            die('<script>alert("Payroll Gagal Di hapus"); window.location.replace('.base_url("hrd/payroll").');</script>');
        }
    }
    // END PAYROLL
}
