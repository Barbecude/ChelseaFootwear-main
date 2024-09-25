<?php
class M_controlpanel extends CI_Model{
	
	public function get_pegawaishift()
	{
		return $this->db->query('SELECT * FROM pegshift WHERE id_pegshift ORDER BY nama_pegawai ASC')->result_array();
	}

	public function get_one_pegawaishift()
	{
		return $this->db->query('SELECT * FROM pegshift WHERE id_pegshift = '.$this->uri->segment(3).' ')->row_array();
	}
	public function get_shift()
	{
		return $this->db->query('SELECT * FROM shift WHERE id_shift AND aktif="t" ORDER BY nama_shift ASC')->result_array();
	}
	public function get_shift_all()
	{
		return $this->db->query('SELECT * FROM shift WHERE id_shift ORDER BY nama_shift ASC')->result_array();
	}
	public function get_pegawai()
	{
		return $this->db->query('SELECT * FROM person WHERE pid AND aktif="t" ORDER BY nama ASC')->result_array();
	}
	public function get_pegawai_all()
	{
		return $this->db->query('SELECT a.*, b.nama_gelar, c.nama_agama, d.nama_jabatan
									FROM person a 
									LEFT JOIN gelar b ON a.gelar=b.id_gelar
									LEFT JOIN agama c ON a.agama=c.id_agama
									LEFT JOIN jabatan d ON a.jabatan=d.jabatan_id ORDER BY nama ASC')->result_array();
	}


	public function insert_pegawaishift()
	{
		$simpan = [
            'nama_pegawai'	=> $this->input->post('nama_pegawai'),
            'minggu_1'		=> $this->input->post('minggu_1'),
            'minggu_2'		=> $this->input->post('minggu_2'),
            'minggu_3'		=> $this->input->post('minggu_3'),
            'minggu_4'		=> $this->input->post('minggu_4')
		];

		$ok = $this->db->insert('pegshift', $simpan);
		return $ok;
	}

	public function update_pegawaishift()
	{
		$update = [
			'nama_pegawai'	=> $this->input->post('nama_pegawai'),
            'minggu_1'		=> $this->input->post('minggu_1'),
            'minggu_2'		=> $this->input->post('minggu_2'),
            'minggu_3'		=> $this->input->post('minggu_3'),
            'minggu_4'		=> $this->input->post('minggu_4')
		];

		$this->db->where('id_pegshift', $this->input->post('id_pegshift'));
		$ok = $this->db->update('pegshift', $update);

		return true;
	}

	public function aktif_pegawaishift()
	{

		$cekstatus = $this->db->query('SELECT * FROM pegshift WHERE id_pegshift='.$this->uri->segment(3).'')->row_array();

		if($cekstatus['aktif']=='t'){
			$nonaktif = [
				'aktif'		=> 'f'
			];
		}else{
			$nonaktif = [
				'aktif'		=> 't'
			];
		}

		$this->db->where('id_pegshift', $this->uri->segment(3));
		$ok = $this->db->update('pegshift', $nonaktif);

		return true;
		
	}
}