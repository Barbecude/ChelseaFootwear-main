<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_cart');
        
        if (!$this->session->userdata('u_name')) {
            redirect('login');
        }
    }

    public function index() {
        $pid = $this->session->userdata('pid'); // Ambil pid dari session
        $cart_items = $this->M_cart->get_cart_items($pid);
        
        // Tambahkan detail produk ke setiap item di keranjang
        foreach ($cart_items as $item) {
            $item->product_details = $this->M_cart->get_product_details($item->product_id);
        }
    
        // Ambil ringkasan pesanan
        $summary = $this->M_cart->get_cart_summary($pid);
        
        $data['cart_items'] = $cart_items;
        $data['summary'] = $summary; // Tambahkan ringkasan ke data
        $this->load->view('cart_view', $data);
    }
    

    public function add_to_cart() {
        $product_id = $this->input->post('product_id');
        $pid = $this->session->userdata('pid'); // Mengambil pid dari session
        $this->M_cart->add_item($pid, $product_id);
        redirect('/');
    }

    public function update_qty($item_id) {
        $qty = $this->input->post('qty');
        $this->M_cart->update_qty($item_id, $qty);
        redirect('cart');
    }

    public function remove_from_cart($item_id) {
        $this->M_cart->remove_item($item_id);
        redirect('cart');
    }
}
