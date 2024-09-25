<?php
class M_masterdata extends CI_Model{
	public function get_pegawai_all()
	{
		return $this->db->query('SELECT a.*
									FROM person a 
									ORDER BY nama ASC')->result_array();
	}

	public function get_pegawai()
	{
		return $this->db->query('SELECT * FROM person WHERE pid AND aktif="t" ORDER BY nama ASC')->result_array();
	}

	public function get_one_pegawai()
	{
		return $this->db->query('SELECT * FROM person WHERE pid = '.$this->uri->segment(3).' ')->row_array();
	}

	public function get_user()
	{
		return $this->db->query('SELECT * FROM user WHERE pid')->result_array();
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
			'jabatan'		=> $this->input->post('jabatan'),
			'gelar'			=> $this->input->post('gelar'),
			'tempat_lahir'	=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'	=> $this->input->post('tgl_lahir'),
			'agama'			=> $this->input->post('agama'),
			'tipe_pegawai'	=> $this->input->post('tipe_pegawai'),
			'nomor_pegawai'	=> $this->input->post('no_pegawai'),
			'email'			=> $this->input->post('email')
		];

		$ok = $this->db->insert('person', $simpan);
		return $ok;
	}

	public function update_pegawai()
	{
		$update = [
			'nama'			=> $this->input->post('nama'),
			'alamat'		=> $this->input->post('alamat'),
			'kelamin'		=> $this->input->post('kelamin'),
			'hp'			=> $this->input->post('hp'),
			'jabatan'		=> $this->input->post('jabatan'),
			'gelar'			=> $this->input->post('gelar'),
			'tempat_lahir'	=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'	=> $this->input->post('tgl_lahir'),
			'agama'			=> $this->input->post('agama'),
			'tipe_pegawai'	=> $this->input->post('tipe_pegawai'),
			'nomor_pegawai'	=> $this->input->post('no_pegawai'),
			'email'			=> $this->input->post('email')
		];

		$this->db->where('pid', $this->input->post('pid'));
		$ok = $this->db->update('person', $update);

		return true;
	}

	public function delete_pegawai()
	{

		$cekstatus = $this->db->query('SELECT * FROM person WHERE pid='.$this->uri->segment(3).'')->row_array();

		if($cekstatus['aktif']=='t'){
			$nonaktif = [
				'aktif'		=> 'f'
			];
		}else{
			$nonaktif = [
				'aktif'		=> 't'
			];
		}

		$this->db->where('pid', $this->uri->segment(3));
		$ok = $this->db->update('person', $nonaktif);

		return true;
		
	}

	public function hapus_pegawai()
	{
		$this->db->where('pid', $this->uri->segment(3));
        $ok = $this->db->delete('person');
        return true;
	}

	public function get_jabatan_all()
	{
		return $this->db->query('SELECT * FROM jabatan WHERE jabatan_id  ORDER BY nama_jabatan ASC')->result_array();
	}


	public function get_one_jabatan()
	{
		return $this->db->query('SELECT * FROM jabatan WHERE jabatan_id = '.$this->uri->segment(3).' ')->row_array();
	}
	
	public function insert_jabatan()
	{
		$simpan = [
			'nama_jabatan'	=> $this->input->post('nama_jabatan'),
			'pokok'			=> $this->input->post('pokok'),
			'tunjangan'		=> $this->input->post('tunjangan'),
			'total_gaji'	=> $this->input->post('total_gaji')
		];

		$ok = $this->db->insert('jabatan', $simpan);
		return $ok;
	}

	public function update_jabatan()
	{
		$update = [
			'nama_jabatan'	=> $this->input->post('nama_jabatan'),
			'pokok'			=> $this->input->post('pokok'),
			'tunjangan'		=> $this->input->post('tunjangan'),
			'total_gaji'	=> $this->input->post('total_gaji')
		];

		$this->db->where('jabatan_id', $this->input->post('jabatan_id'));
		$ok = $this->db->update('jabatan', $update);

		return true;
	}

	public function aktif_jabatan()
	{

		$cekstatus = $this->db->query('SELECT * FROM jabatan WHERE jabatan_id='.$this->uri->segment(3).'')->row_array();

		if($cekstatus['aktif']=='t'){
			$nonaktif = [
				'aktif'		=> 'f'
			];
		}else{
			$nonaktif = [
				'aktif'		=> 't'
			];
		}

		$this->db->where('jabatan_id', $this->uri->segment(3));
		$ok = $this->db->update('jabatan', $nonaktif);

		return true;
		
	}
	public function get_gelar_all()
	{
		return $this->db->query('SELECT * FROM gelar WHERE id_gelar ORDER BY nama_gelar ASC')->result_array();
	}

	public function get_gelar()
	{
		return $this->db->query('SELECT * FROM gelar WHERE id_gelar AND aktif="t" ORDER BY nama_gelar ASC')->result_array();
	}

	public function get_one_gelar()
	{
		return $this->db->query('SELECT * FROM gelar WHERE id_gelar = '.$this->uri->segment(3).' ')->row_array();
	}
	
	public function insert_gelar()
	{
		$simpan = [
			'nama_gelar'	=> $this->input->post('nama_gelar')
		];

		$ok = $this->db->insert('gelar', $simpan);
		return $ok;
	}

	public function update_gelar()
	{
		$update = [
			'nama_gelar'	=> $this->input->post('nama_gelar')
		];

		$this->db->where('id_gelar', $this->input->post('id_gelar'));
		$ok = $this->db->update('gelar', $update);

		return true;
	}

	public function aktif_gelar()
	{

		$cekstatus = $this->db->query('SELECT * FROM gelar WHERE id_gelar='.$this->uri->segment(3).'')->row_array();

		if($cekstatus['aktif']=='t'){
			$nonaktif = [
				'aktif'		=> 'f'
			];
		}else{
			$nonaktif = [
				'aktif'		=> 't'
			];
		}

		$this->db->where('id_gelar', $this->uri->segment(3));
		$ok = $this->db->update('gelar', $nonaktif);

		return true;
		
	}


	public function get_agama_all()
	{
		return $this->db->query('SELECT * FROM agama WHERE id_agama ORDER BY nama_agama ASC')->result_array();
	}

	public function get_agama()
	{
		return $this->db->query('SELECT * FROM agama WHERE id_agama AND aktif="t" ORDER BY nama_agama ASC')->result_array();
	}

	public function get_one_agama()
	{
		return $this->db->query('SELECT * FROM agama WHERE id_agama = '.$this->uri->segment(3).' ')->row_array();
	}
	
	public function insert_agama()
	{
		$simpan = [
			'nama_agama'	=> $this->input->post('nama_agama')
		];

		$ok = $this->db->insert('agama', $simpan);
		return $ok;
	}

	public function update_agama()
	{
		$update = [
			'nama_agama'	=> $this->input->post('nama_agama')
		];

		$this->db->where('id_agama', $this->input->post('id_agama'));
		$ok = $this->db->update('agama', $update);

		return true;
	}

	public function aktif_agama()
	{

		$cekstatus = $this->db->query('SELECT * FROM agama WHERE id_agama='.$this->uri->segment(3).'')->row_array();

		if($cekstatus['aktif']=='t'){
			$nonaktif = [
				'aktif'		=> 'f'
			];
		}else{
			$nonaktif = [
				'aktif'		=> 't'
			];
		}

		$this->db->where('id_agama', $this->uri->segment(3));
		$ok = $this->db->update('agama', $nonaktif);

		return true;
		
	}



	public function get_shift_all()
	{
		return $this->db->query('SELECT * FROM shift WHERE id_shift ORDER BY nama_shift ASC')->result_array();
	}

	public function get_shift()
	{
		return $this->db->query('SELECT * FROM shift WHERE id_shift AND aktif="t" ORDER BY nama_shift ASC')->result_array();
	}

	public function get_one_shift()
	{
		return $this->db->query('SELECT * FROM shift WHERE id_shift = '.$this->uri->segment(3).' ')->row_array();
	}
	
	public function insert_shift()
	{
		$simpan = [
			'nama_shift'	=> $this->input->post('nama_shift')
		];

		$ok = $this->db->insert('shift', $simpan);
		return $ok;
	}

	public function update_shift()
	{
		$update = [
			'nama_shift'	=> $this->input->post('nama_shift')
		];

		$this->db->where('id_shift', $this->input->post('id_shift'));
		$ok = $this->db->update('shift', $update);

		return true;
	}

	public function aktif_shift()
	{

		$cekstatus = $this->db->query('SELECT * FROM shift WHERE id_shift='.$this->uri->segment(3).'')->row_array();

		if($cekstatus['aktif']=='t'){
			$nonaktif = [
				'aktif'		=> 'f'
			];
		}else{
			$nonaktif = [
				'aktif'		=> 't'
			];
		}

		$this->db->where('id_shift', $this->uri->segment(3));
		$ok = $this->db->update('shift', $nonaktif);

		return true;
		
	}
}