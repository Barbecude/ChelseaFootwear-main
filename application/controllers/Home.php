<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if(!$this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
        $this->load->model('m_home');

    }

    public function index() {
        $home = $this->db->query('SELECT * FROM home ORDER BY id ASC')->result_array();
        $data = [
            'breadcum' => 'HOME WEBSITE',
            'link_edit' => 'Home/home_edit',
            'link_tambah' => 'Home/home_add',
            'home' => $home
            'produk' => $this->m_home->get_all_data;
        ];
        $this->template->display('home/index', $data);
    }

    public function home_add() {
        $data = [
            'breadcum' => 'Home home',
            'link_simpan' => 'Home/simpan_home',
        ];
        $this->template->display('home/add', $data);
    }

    public function home_hapus() {
        $ok = $this->m_home->delete_one_home();

        if($ok){
            die('<script>alert("Data berhasil di hapus"); window.location.replace("'.base_url("home/index").'");</script>');
        } else {
            die('<script>alert("Data gagal di hapus"); window.location.replace("'.base_url("home/index").'");</script>');
        }
    }

    private function upload_file($file_name) {
        $config['upload_path'] = "./assets/img/home";
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload($file_name)){
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            return '';
        }
    }

    public function home_create() {
        $gambar_1 = $this->upload_file("gambar_1");
        $gambar_2 = $this->upload_file("gambar_2");

        $datasimpan = [
            'judul' => $this->input->post('judul'),
            'sub_judul' => $this->input->post('sub_judul'),
            'gambar_1' => $gambar_1,
            'gambar_2' => $gambar_2,
        ];

        $ok = $this->db->insert('home', $datasimpan);

        if($ok){
            echo json_encode($ok);
        }
    }

    public function home_edit() {
        $data = [
            'breadcum' => 'Home home',
            'link_simpan' => 'home/simpan_edit_home',
            'home' => $this->m_home->get_one_home(),
        ];
        $this->template->display('home/edit', $data);
    }

    public function home_update() {
        $gambar_1 = $this->upload_file("gambar1");
        $gambar_2 = $this->upload_file("gambar2");

        $update = [
            'id' => $this->input->post('id'),
            'judul' => $this->input->post('judul'),
            'sub_judul' => $this->input->post('sub_judul'),
            'gambar_1' => $gambar_1,
            'gambar_2' => $gambar_2,
        ];

        $this->db->where('id', $this->input->post('id'));
        $ok = $this->db->update('home', $update);

        if($ok){
            echo json_encode($ok);
        }
    }
}
