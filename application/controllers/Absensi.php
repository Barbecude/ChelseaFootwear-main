<?php
class absensi extends CI_Model{
	public function getdatamasuk()
	{
		return $this->db->query('SELECT * FROM absensi WHERE id_absen > 1 ORDER BY nama ASC')->result_array();
	}

	public function get_absensi()
	{
		return $this->db->query('SELECT * FROM absensi WHERE id_absen> 1 AND aktif="t" ORDER BY nama ASC')->result_array();
	}

	public function get_absensi()
	{
		return $this->db->query('SELECT * FROM absensi WHERE id_absen = '.$this->uri->segment(3).' ')->row_array();
	}

	public function get_absensi()
	{
		return $this->db->query('SELECT * FROM absensi WHERE id_absen > 1')->result_array();
	}

	public function get_barang()
	{
		return $this->db->query('SELECT a.*, b.nama as nama_supplier FROM barang a, supplier b WHERE a.id_supplier=b.id')->result_array();
	}

	public function insert_absensi()
	{
		$simpan = [
			'id_absen'			    => $this->input->post('id_absen'),
			'id_person'		        => $this->input->post('id_person'),
			'tanggal'		        => $this->input->post('tanggal'),
			'jam_masuk'			    => $this->input->post('jam_masuk'),
			'jam_keluar'	        => $this->input->post('jam_keluar'),
			'task_kerja'	        => $this->input->post('task_kerja'),
			'create_time'			=> $this->input->post('create_time'),
			'create_id'	            => $this->input->post('create_id'),
			'modify_time'			=> $this->input->post('modify_time'),
            'modify_id'             => $this->input->post('modify_id')
		];

		$ok = $this->db->insert('absensi', $simpan);
		return $ok;
	}

	public function update_absensi()
	{
		$update = [
			'id_absen'			    => $this->input->post('id_absen'),
			'id_person'		        => $this->input->post('id_person'),
			'tanggal'		        => $this->input->post('tanggal'),
			'jam_masuk'			    => $this->input->post('jam_masuk'),
			'jam_keluar'	        => $this->input->post('jam_keluar'),
			'task_kerja'	        => $this->input->post('task_kerja'),
			'create_time'			=> $this->input->post('create_time'),
			'create_id'	            => $this->input->post('create_id'),
			'modify_time'			=> $this->input->post('modify_time'),
            'modify_id'             => $this->input->post('modify_id')
		];

		$this->db->where('id_absen', $this->input->post('id_absen'));
		$ok = $this->db->update('absensi', $update);

		return true;
	}

	public function delete_absensi()
	{

		$cekstatus = $this->db->query('SELECT * FROM absensi WHERE id_absen='.$this->uri->segment(3).'')->row_array();

		if($cekstatus['aktif']=='t'){
			$nonaktif = [
				'aktif'		=> 'f'
			];
		}else{
			$nonaktif = [
				'aktif'		=> 't'
			];
		}

		$this->db->where('id_absen', $this->uri->segment(3));
		$ok = $this->db->update('absensi', $nonaktif);

		return true;
		
	}
}
?>