<?php

class Detail extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_produk'); // Memuat model
    }

    public function index($id) {
        // Ambil data produk berdasarkan ID
        $data['produk'] = $this->M_produk->get_produk_by_id($id);
        
        // Pastikan data produk ada
        if (!$data['produk']) {
            show_404(); // Tampilkan halaman 404 jika produk tidak ditemukan
        }

        // Load view dengan data produk
        $this->load->view('detail', $data);
    }
}


?>
