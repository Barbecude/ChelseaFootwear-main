<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klien extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
        $this->load->model('m_klien');
    }
    public function index() {
        $klien = $this->db->query('SELECT * FROM klien ORDER BY id ASC')->result_array();
      //   $edit = $this->db->query('SELECT * FROM klien ORDER BY id ASC')->result_array();
    // print_r($klien);exit;
        $data = [
            'breadcum'          => 'KLIEN WEBSITE',
            'link_edit'         => 'klien/klien_edit',
            'link_tambah'       => 'klien/klien_add',
            'klien'             =>  $klien
            // 'edit' => $edit
        ];
        $this->template->display('klien/index', $data);
    }
    public function klien_add()
    {
        $data = [
            'breadcum'          => 'klien klien',
            'link_simpan'       => 'klien/simpan_klien',
        ];
        $this->template->display('klien/add', $data);
    }
    public function klien_create()
    {
        // print_r($_FILES);exit;
        $config['upload_path']="./assets/img/klien";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload("gambar_1")){
            $data1 = array('upload_data' => $this->upload->data());
            $gambar_1= $data1['upload_data']['file_name'];
        }else{
            $gambar_1= '';
        }
        if($this->upload->do_upload("gambar_2")){
            $data2 = array('upload_data' => $this->upload->data());
            $gambar_2= $data2['upload_data']['file_name'];
        }else{
            $gambar_2= '';
             }
        if($this->upload->do_upload("gambar_3")){
            $data3 = array('upload_data' => $this->upload->data());
            $gambar_3= $data3['upload_data']['file_name'];
        }else{
            $gambar_3= '';
             }
        if($this->upload->do_upload("gambar_4")){
            $data4 = array('upload_data' => $this->upload->data());
            $gambar_4= $data4['upload_data']['file_name'];
        }else{
            $gambar_4= '';
        }
        
        //simpan heade1
        $datasimpan = [
        'judul'         => $this->input->post('judul'),      
        'subjudul_1'     => $this->input->post('subjudul_1'),
        'subjudul_2'     => $this->input->post('subjudul_2'),
        'subjudul_3'     => $this->input->post('subjudul_3'),
        'subjudul_4'     => $this->input->post('subjudul_4'),
        'teks_1'     => $this->input->post('teks_1'),
        'teks_2'     => $this->input->post('teks_2'),
        'teks_3'     => $this->input->post('teks_3'),
        'teks_4'     => $this->input->post('teks_4'),
        'gambar_1'     => $gambar_1,
        'gambar_2'     => $gambar_2,
        'gambar_3'     => $gambar_3,
        'gambar_4'     => $gambar_4,

          
        ];
         print_r($datasimpan);exit;
        $ok = $this->db->insert('klien', $datasimpan);
        //simpan detail
        
        if($ok){
            echo json_encode($ok);
        }
        
    
    }
    public function klien_edit()
    {
        $data = [
            'breadcum'          => 'klien klien',
            'link_simpan'       => 'klien/simpan_edit_klien',
            'klien'           => $this->m_klien->get_one_klien(),
        ];
        $this->template->display('klien/edit', $data);
    }


 public function layanan_update()
    {
        $config['upload_path']="./assets/img/klien";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload("gambar_1")){
            $data1 = array('upload_data' => $this->upload->data());
            $gambar_1 = $data1['upload_data']['file_name'];
        }else{
            $gambar1='';
        }
        if($this->upload->do_upload("gambar_2")){
            $data2 = array('upload_data' => $this->upload->data());
            $gambar_2 = $data2['upload_data']['file_name'];
        }else{
            $gambar_2='';
        }
        if($this->upload->do_upload("gambar_3")){
            $data3 = array('upload_data' => $this->upload->data());
            $gambar_3 = $data3['upload_data']['file_name'];
        }else{
            $gambar_3='';
        }
         if($this->upload->do_upload("gambar_4")){
            $data4 = array('upload_data' => $this->upload->data());
            $gambar_4 = $data4['upload_data']['file_name'];
        }else{
            $gambar_4='';
        }

        $update = [
        'judul'         => $this->input->post('judul'),      
        'subjudul_1'     => $this->input->post('subjudul_1'),
        'subjudul_2'     => $this->input->post('subjudul_2'),
        'subjudul_3'     => $this->input->post('subjudul_3'),
        'subjudul_4'     => $this->input->post('subjudul_4'),
        'teks_1'     => $this->input->post('teks_1'),
        'teks_2'     => $this->input->post('teks_2'),
        'teks_3'     => $this->input->post('teks_3'),
        'teks_4'     => $this->input->post('teks_4'),
        'gambar_1'     => $gambar_1,
        'gambar_2'     => $gambar_2,
        'gambar_3'     => $gambar_3,
        'gambar_4'     => $gambar_4,
        ];

        $this->db->where('id', $this->input->post('id'));
        $ok = $this->db->update('klien', $update);

        if($ok){
            json_encode($ok);
        }
    }
}