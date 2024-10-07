<?php
class M_produk extends CI_Model{
	public function get_produk_all()
	{
		return $this->db->query('SELECT * FROM produk ORDER BY id ASC')->result_array();
	}
	public function get_total_produk()
    {
        return $this->db->count_all('produk'); // Menghitung total jumlah produk
    }
	
	public function get_produk()
	{
		return $this->db->query('SELECT * FROM produk ORDER BY id ASC')->result_array();
	}

	public function get_one_produk()
	{
		return $this->db->query('SELECT * FROM produk WHERE id = '.$this->uri->segment(3).' ')->row_array();
	}

	public function get_produk_by_id($id) {
        // Ambil data produk berdasarkan ID
        $this->db->where('id', $id);
        $query = $this->db->get('produk');
        return $query->row(); // Mengembalikan satu baris data
    }
	public function insert_produk()
	{
		$simpan = [
		
		
			'nama_produk'           => $this->input->post('nama_produk'),
			'gambar_satu'       => $gambar_satu,
			'jenis'           => $this->input->post('jenis'),
            'deskripsi'           => $this->input->post('deskripsi'),
			'harga'     => $this->input->post('harga'),
		];

		$ok = $this->db->insert('produk', $simpan);
		return $ok;
	}
	public function update_produk()
	{
		$update = [
			'nama_produk'           => $this->input->post('nama_produk'),
			'gambar_satu'       => $gambar_satu,
			'jenis'           => $this->input->post('jenis'),
            'deskripsi'           => $this->input->post('deskripsi'),
			'harga'     => $this->input->post('harga'),
		];
        
		$this->db->where('id', $this->input->post('id'));
		$ok = $this->db->update('produk', $update);

		return true;
	}
	public function delete_produk()
    {
        $this->db->where('id', $this->uri->segment(3));
        $ok = $this->db->delete('produk');
        return true;
        
    }
}