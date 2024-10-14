<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_cart'); // Memuat model M_cart
    }

    public function index() {
        // Dapatkan pid dari session
        $pid = $this->session->userdata('pid');

        // Hitung jumlah produk unik di keranjang
        $jumlah_item_keranjang = $this->M_cart->jml_item_keranjang_user($pid);

        $data = [
            'jumlah_item_keranjang'=> $jumlah_item_keranjang, // Kirim jumlah produk unik ke view
            'link_edit'            => 'Home/home_edit',
            'link_tambah'          => 'Home/home_add',
            'home'                 => $this->db->query('SELECT * FROM home ORDER BY id ASC')->row_array(),
            'footer'               => $this->db->query('SELECT * FROM footer ORDER BY id ASC')->row_array(),
            'layanan'              => $this->db->query('SELECT * FROM layanan ORDER BY id ASC')->row_array(),
            'produk'               => $this->db->query('SELECT * FROM produk ORDER BY id ASC')->result_array(),
            'klien'                => $this->db->query('SELECT * FROM klien ORDER BY id ASC')->row_array(),
        ];

        $this->load->view('welcome_message', $data);
    }
}
