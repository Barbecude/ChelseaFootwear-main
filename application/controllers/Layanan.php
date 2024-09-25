<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layanan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
            $this->load->model('m_layanan');
    }
    
    public function index() {
        // print_r('bebas');exit;
        $layanan = $this->db->query('SELECT * FROM layanan ORDER BY id ASC')->result_array();
        // $edit = $this->db->query('SELECT * FROM layanan ORDER BY id ASC')->result_array();
    // print_r($layanan);exit;
        $data = [
                'breadcum'          => 'Layanan',
                'link_edit'         => 'Layanan/layanan_edit',
                'link_tambah'       => 'Layanan/layanan_add',
                'layanan'           => $layanan
                
        ];
        $this->template->display('layanan/index', $data);
    }
    public function layanan_add()
    {
        $data = [
            'breadcum'          => 'layanan layanan',
            'link_simpan'       => 'layanan/simpan_layanan',
        ];
        $this->template->display('layanan/add', $data);
    }
    public function layanan_create()
    {
        // print_r($_FILES);exit;
        $config['upload_path']="./assets/img/layanan";
        $config['allowed_types']='gif|jpg|png|jpeg|svg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload("gambar1")){
            $data1 = array('upload_data' => $this->upload->data());
            $gambar1 = $data1['upload_data']['file_name'];
        }else{
            $gambar1='';
        }
        if($this->upload->do_upload("gambar2")){
            $data2 = array('upload_data' => $this->upload->data());
            $gambar2 = $data2['upload_data']['file_name'];
        }else{
            $gambar2='';
        }
        if($this->upload->do_upload("gambar3")){
            $data3 = array('upload_data' => $this->upload->data());
            $gambar3 = $data3['upload_data']['file_name'];
        }else{
            $gambar3='';
        }
         if($this->upload->do_upload("gambar4")){
            $data4 = array('upload_data' => $this->upload->data());
            $gambar4 = $data4['upload_data']['file_name'];
        }else{
            $gambar4='';
        }
        
        //simpan header
        $datasimpan = [
            'judul_satu'        => $this->input->post('judul_satu'),
            'judul_dua'         => $this->input->post('judul_dua'),
            'judul_tiga'        => $this->input->post('judul_tiga'),
            'judul_empat'       => $this->input->post('judul_empat'),
            'sub_judul1'        => $this->input->post('sub_judul1'),
            'sub_judul2'        => $this->input->post('sub_judul2'),
            'sub_judul3'        => $this->input->post('sub_judul3'),
            'sub_judul4'        => $this->input->post('sub_judul4'),
            'gambar1'           => $gambar1,
            'gambar2'           => $gambar2,
            'gambar3'           => $gambar3,
            'gambar4'           => $gambar4,
            'heading'           => $this->input->post('heading'),
            'sub_heading'       => $this->input->post('sub_heading'),
        ];
        // print_r($datasimpan);exit;
        $ok = $this->db->insert('layanan', $datasimpan);
        //simpan detail
        
        if($ok){
            echo json_encode($ok);
        }

    }
    public function layanan_edit()
    {
        $data = [
            'breadcum'          => 'Layanan layanan',
            'link_simpan'       => 'layanan/simpan_edit_layanan', 
            'layanan'           => $this->m_layanan->get_one_layanan(),              
        ];
        $this->template->display('layanan/edit', $data);
    }


 public function layanan_update()
    {
        $config['upload_path']="./assets/img/layanan";
        $config['allowed_types']='gif|jpg|png|jpeg|svg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload("gambar1")){
            $data1 = array('upload_data' => $this->upload->data());
            $gambar1 = $data1['upload_data']['file_name'];
        }else{
            $gambar1='';
        }
        if($this->upload->do_upload("gambar2")){
            $data2 = array('upload_data' => $this->upload->data());
            $gambar2 = $data2['upload_data']['file_name'];
        }else{
            $gambar2='';
        }
        if($this->upload->do_upload("gambar3")){
            $data3 = array('upload_data' => $this->upload->data());
            $gambar3 = $data3['upload_data']['file_name'];
        }else{
            $gambar3='';
        }
        if($this->upload->do_upload("gambar4")){
            $data4 = array('upload_data' => $this->upload->data());
            $gambar4 = $data4['upload_data']['file_name'];
        }else{
            $gambar4='';
        }

        $update = [
            'judul_satu'        => $this->input->post('judul_satu'),
            'judul_dua'         => $this->input->post('judul_dua'),
            'judul_tiga'        => $this->input->post('judul_tiga'),
            'judul_empat'       => $this->input->post('judul_empat'),
            'sub_judul1'        => $this->input->post('sub_judul1'),
            'sub_judul2'        => $this->input->post('sub_judul2'),
            'sub_judul3'        => $this->input->post('sub_judul3'),
            'sub_judul4'        => $this->input->post('sub_judul4'),
            'gambar1'           => $gambar1,
            'gambar2'           => $gambar2,
            'gambar3'           => $gambar3,
            'gambar4'           => $gambar4,
            'heading'           => $this->input->post('heading'),
            'sub_heading'       => $this->input->post('sub_heading'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $ok = $this->db->update('layanan', $update);

        if($ok){
            json_encode($ok);

        }
    }
    public function layanan_delete()
    {
        $ok = $this->m_layanan->delete_layanan();

        if($ok){
            die('<script>alert("Data berhasil di hapus"); window.location.replace("'.base_url("layanan/index").'");</script>');
        }else{
            die('<script>alert("Data gagal di hapus"); window.location.replace('.base_url("layanan/index").');</script>');
        }
    }
}