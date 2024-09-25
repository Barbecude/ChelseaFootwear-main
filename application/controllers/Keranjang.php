<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
	public function index()
	{
		
		$data = [
            'link_edit'       	=> 'Home/home_edit',
            'link_tambah'       => 'Home/home_add',
            'home'			 	=> $this->db->query('SELECT * FROM home ORDER BY id ASC')->row_array(),
			'link_edit'       	=> 'Footer/footer_edit',
            'link_tambah'       => 'Footer/footer_add',
            'footer'			=> $this->db->query('SELECT * FROM footer ORDER BY id ASC')->row_array(),
            'link_edit'         => 'Layanan/layanan_edit',
            'link_tambah'       => 'Layanan/layanan_add',
            'layanan'           => $this->db->query('SELECT * FROM layanan ORDER BY id ASC')->row_array(),
            'link_edit'         => 'produk/produk_edit',
            'link_tambah'       => 'produk/produk_add',
            'produk'            => $this->db->query('SELECT * FROM produk ORDER BY id ASC')->row_array(),
			'link_edit'         => 'klien/klien',
            'link_tambah'       => 'klien/klien_add',
            'klien'             => $this->db->query('SELECT * FROM klien ORDER BY id ASC')->row_array(),      
        ];
		
		$this->load->view('keranjang', $data);
	}
}