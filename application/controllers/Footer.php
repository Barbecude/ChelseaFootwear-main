<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Footer extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
            $this->load->model('m_footer');
    }
     public function index() {

        $footer = $this->db->query('SELECT * FROM footer ORDER BY id ASC')->result_array();

        $data = [
            'breadcum'          => 'FOOTER WEBSITE',
            'link_tambah'       => 'footer/footer_add',
            'footer'           => $this->m_footer->get_footer_all(),
        ];

        $this->template->display('footer/index', $data);
    }
    public function footer_add()
    {
        $data = [
            'breadcum'          => 'footer FOOTER',
            'link_simpan'       => 'footer/simpan_footer',
        ];

        $this->template->display('footer/add', $data);
    }
    public function create_footer()
    {
        $id = $this->input->post('id');
        $config['upload_path']="./assets/img/footer";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) {
            // code...
            $data_1 = array('upload_data' => $this->upload->data());
            $gambar = $data_1['upload_data']['file_name'];
        }else{
            $gambar = '';

        } if ($this->upload->do_upload("sub_logo")) {
            // code...
            $data_2 = array('upload_data' => $this->upload->data());
            $sub_logo = $data_2['upload_data']['file_name'];
        }else{
            $sub_logo = '';

        } if ($this->upload->do_upload("icon_1")) {
            // code...
            $data_3 = array('upload_data' => $this->upload->data());
            $icon_1 = $data_3['upload_data']['file_name'];
        }else{
            $icon_1 = '';

        } if ($this->upload->do_upload("icon_2")) {
            // code...
            $data_4 = array('upload_data' => $this->upload->data());
            $icon_2 = $data_4['upload_data']['file_name'];
        }else{
            $icon_2 = '';

        } if ($this->upload->do_upload("icon_3")) {
            // code...
            $data_5 = array('upload_data' => $this->upload->data());
            $icon_3 = $data_5['upload_data']['file_name'];
        }else{
            $icon_3 = '';
            
        } if ($this->upload->do_upload("icon_4")) {
            // code...
            $data_6 = array('upload_data' => $this->upload->data());
            $icon_4 = $data_6['upload_data']['file_name'];
        }else{
            $icon_4 = '';
        } 
    
        $datasimpan = [

            'gambar'            => $gambar,
            'sub_logo'         =>  $sub_logo,
            'lokasi'            => $this->input->post('lokasi'),
            'icon_1'              => $icon_1,
            'icon_2'              => $icon_2,
            'icon_3'              => $icon_3,
            'icon_4'              => $icon_4,
            'feedback'         => $this->input->post('feedback'),
            'email'             => $this->input->post('email'),
            'copyright'         => $this->input->post('copyright'),

        ];
        // print_r($datasimpan);exit;
        $ok = $this->db->insert('footer', $datasimpan);

        if ($ok) {
             // code...
            echo json_encode($ok);
         } 
    }
     public function footer_edit()

    {
        $data = [
            'breadcum'          => 'footer FOOTER',
            'link_simpan'       => 'footer/simpan_edit_footer',
            'footer'            => $this->m_footer->get_one_footer(),
        ];
        $this->template->display('footer/edit', $data);
    }
    public function footer_update()
    {


        $config['upload_path']="./assets/img/footer";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        // if ($this->upload->do_upload("gambar")) {
        //     // code...
        //     $data_1 = array('upload_data' => $this->upload->data());
        //     $gambar = $data_1['upload_data']['file_name'];
        // }else{

        //     $gambar = '';
        //} 
        
        if ($this->upload->do_upload("sub_logo")) {
            // code...
            $data_2 = array('upload_data' => $this->upload->data());
            $sub_logo = $data_2['upload_data']['file_name'];
        }else{

            $sub_logo = '';
        }if ($this->upload->do_upload("icon_1")) {
            // code...
            $data_3 = array('upload_data' => $this->upload->data());
            $icon_1 = $data_3['upload_data']['file_name'];
        }else{

            $icon_1 = '';
       } if ($this->upload->do_upload("icon_2")) {
            // code...
            $data_4 = array('upload_data' => $this->upload->data());
            $icon_2 = $data_4['upload_data']['file_name'];
        }else{

            $icon_2 = '';
        } if ($this->upload->do_upload("icon_3")) {
            // code...
            $data_5 = array('upload_data' => $this->upload->data());
            $icon_3 = $data_5['upload_data']['file_name'];
        }else{

            $icon_3 = '';
        } if ($this->upload->do_upload("icon_4")) {
            // code...
            $data_6 = array('upload_data' => $this->upload->data());
            $icon_4 = $data_6['upload_data']['file_name'];
        }else{

            $icon_4 = '';
        }  

        //var_dump($update);
        //die();

        $cekdata = $this->m_footer->get_by_id();
        if($cekdata['icon_1']==''){
            $icon_1_ada = $icon_1;
        }else{
            $icon_1_ada = $cekdata['icon_1'];

        }if($cekdata['icon_2']==''){
            $icon_2_ada = $icon_2;
        }else{
            $icon_2_ada = $cekdata['icon_2'];

        }if($cekdata['icon_3']==''){
            $icon_3_ada = $icon_3;
        }else{
            $icon_3_ada = $cekdata['icon_3'];

        }if($cekdata['icon_4']==''){
            $icon_4_ada = $icon_4;
        }else{
            $icon_4_ada = $cekdata['icon_4'];

        }if($cekdata['sub_logo']==''){
            $sub_logo_ada = $sub_logo;
        }else{
            $sub_logo_ada = $cekdata['sub_logo'];   
        }
        
      
        $update = [

            //'gambar'            => $gambar,
            'sub_logo'           => $sub_logo_ada,
            'lokasi'            => $this->input->post('lokasi'),
            'icon_1'              => $icon_1_ada,
            'icon_2'              => $icon_2_ada,
            'icon_3'              => $icon_3_ada,
            'icon_4'              => $icon_4_ada,
            'feedback'         => $this->input->post('feedback'),
            'email'             => $this->input->post('email'),
            'copyright'         => $this->input->post('copyright'),

            //update image

        ];

         $this->db->where('id', $this->input->post('id'));
         $ok = $this->db->update('footer', $update);

        if ($ok) {
             // code...
            echo json_encode($ok);
         } 
    }
    public function footer_delete()
    {
        $ok = $this->m_footer->delete_footer();

        if($ok){
            die('<script>alert("Data berhasil di hapus"); window.location.replace("'.base_url("footer/index").'");</script>');
        }else{
            die('<script>alert("Data gagal di hapus"); window.location.replace('.base_url("footer/index").');</script>');
        }
    }
}
