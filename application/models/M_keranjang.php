<?php
class M_keranjang extends CI_Model{
	public function get_one_home()
	{
		return $this->db->query('SELECT * FROM home WHERE id = '.$this->uri->segment(3).' ')->row_array();
	}
	public function delete_one_home()
	{
		return $this->db->query('DELETE FROM home WHERE id = '.$this->uri->segment(3).' ');
	}
	public function get_layanan_all()
	{
		return $this->db->query('SELECT * FROM layanan ORDER BY id ASC')->result_array();
	}

	public function get_layanan()
	{
		return $this->db->query('SELECT * FROM layanan AND aktif="t" ORDER BY id ASC')->result_array();
	}

	public function get_one_layanan()
	{
		return $this->db->query('SELECT * FROM layanan = '.$this->uri->segment(3).' ')->row_array();
	}
	public function get_produk_all()
	{
		return $this->db->query('SELECT * FROM produk ORDER BY id ASC')->result_array();
	}

	public function get_produk()
	{
		return $this->db->query('SELECT * FROM produk AND aktif="t" ORDER BY id ASC')->result_array();
	}

	public function get_one_produk()
	{
		return $this->db->query('SELECT * FROM produk = '.$this->uri->segment(3).' ')->row_array();
	}
	public function get_footer_all()
	{
		return $this->db->query('SELECT * FROM footer ORDER BY id ASC')->result_array();
	}

	public function get_footer()
	{
		return $this->db->query('SELECT * FROM footer AND aktif="t" ORDER BY id ASC')->result_array();
	}

	public function get_one_footer()
	{
		return $this->db->query('SELECT * FROM footer = '.$this->uri->segment(3).' ')->row_array();
	}
	public function get_klien_all()
	{
		return $this->db->query('SELECT * FROM klien ORDER BY id ASC')->result_array();
	}

	public function get_klien()
	{
		return $this->db->query('SELECT * FROM klien AND aktif="t" ORDER BY id ASC')->result_array();
	}

	public function get_one_klien()
	{
		return $this->db->query('SELECT * FROM klien = '.$this->uri->segment(3).' ')->row_array();
	}
	public function get_user()
	{
		return $this->db->query('SELECT * FROM user > 1')->result_array();
	}

	public function get_barang()
	{
		return $this->db->query('SELECT a.*, b.nama as nama_supplier FROM barang a, supplier b WHERE a.id_supplier=b.id')->result_array();
	}
	public function insert_pegawai()
	{
		$simpan = [
			'nama'			=> $this->input->post('nama'),
			'alamat'		=> $this->input->post('alamat'),
			'kelamin'		=> $this->input->post('kelamin'),
			'hp'			=> $this->input->post('hp'),
			'tempat_lahir'	=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'	=> $this->input->post('tgl_lahir'),
			'agama'			=> $this->input->post('agama'),
			'nomor_pegawai'	=> $this->input->post('no_pegawai'),
			'email'			=> $this->input->post('email')
		];

		$ok = $this->db->insert('layanan', $simpan);
		return $ok;
	}

	public function update_pegawai()
	{
		$update = [
			'nama'			=> $this->input->post('nama'),
			'alamat'		=> $this->input->post('alamat'),
			'kelamin'		=> $this->input->post('kelamin'),
			'hp'			=> $this->input->post('hp'),
			'tempat_lahir'	=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'	=> $this->input->post('tgl_lahir'),
			'agama'			=> $this->input->post('agama'),
			'nomor_pegawai'	=> $this->input->post('no_pegawai'),
			'email'			=> $this->input->post('email')
		];

		// $this->db->', $this->input-'));
		// $ok = $this->db->update('layanan', $update);

		return true;
	}

	// public function delete_pegawai()
	// {

	// 	$cekstatus = $this->db->query('SELECT * FROM layanan='.$this->uri->segment(3).'')->row_array();

	// 	if($cekstatus['aktif']=='t'){
	// 		$nonaktif = [
	// 			'aktif'		=> 'f'
	// 		];
	// 	}else{
	// 		$nonaktif = [
	// 			'aktif'		=> 't'
	// 		];
	// 	}

	// 	$this->db->', $this->uri->segment(3));
	// 	$ok = $this->db->update('layanan', $nonaktif);

	// 	return true;
		
	// }
}
