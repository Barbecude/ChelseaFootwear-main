<?php
class M_layanan extends CI_Model{
	public function get_layanan_all()
	{
		return $this->db->query('SELECT * FROM layanan ORDER BY id ASC')->result_array();
	}
	public function get_layanan()
	{
		return $this->db->query('SELECT * FROM layanan ORDER BY id ASC')->result_array();
	}

	public function get_one_layanan()
	{
		return $this->db->query('SELECT * FROM layanan where id = '.$this->uri->segment(3).' ')->row_array();
	}
	public function insert_layanan()
	{
		$simpan = [
			
			'judul_satu'		=> $this->input->post('judul_satu'),
			'judul_dua'		    => $this->input->post('judul_dua'),
			'judul_tiga'		=> $this->input->post('judul_tiga'),
			'judul_empat'		=> $this->input->post('judul_empat'),
			'sub_judul1'		=> $this->input->post('sub_judul1'),
			'sub_judul2'		=> $this->input->post('sub_judul2'),
			'sub_judul3'		=> $this->input->post('sub_judul3'),
			'sub_judul4'		=> $this->input->post('sub_judul4'),
			'gambar1'       	=> $gambar1,
			'gambar2'	    	=> $gambar2,
			'gambar3'	    	=> $gambar3,
			'gambar4'			=> $gambar4,
			'heading'			=> $this->input->post('heading'),
			'sub_heading'		=> $this->input->post('sub_heading'),
		];

		$ok = $this->db->insert('layanan', $simpan);
		return $ok;
	}
	public function update_layanan()
	{
		$simpan = [
			
			'judul_satu'		=> $this->input->post('judul_satu'),
			'judul_dua'		    => $this->input->post('judul_dua'),
			'judul_tiga'		=> $this->input->post('judul_tiga'),
			'judul_empat'		=> $this->input->post('judul_empat'),
			'sub_judul1'		=> $this->input->post('sub_judul1'),
			'sub_judul2'		=> $this->input->post('sub_judul2'),
			'sub_judul3'		=> $this->input->post('sub_judul3'),
			'sub_judul4'		=> $this->input->post('sub_judul4'),
			'gambar1'       	=> $gambar1,
			'gambar2'	    	=> $gambar2,
			'gambar3'	    	=> $gambar3,
			'gambar4'			=> $gambar4,
			'heading'			=> $this->input->post('heading'),
			'sub_heading'		=> $this->input->post('sub_heading'),
		];

		$this->db->where('id', $this->input->post('id'));
		$ok = $this->db->update('layanan', $update);

		return true;
	}
	public function delete_layanan()
    {
        $this->db->where('id', $this->uri->segment(3));
        $ok = $this->db->delete('layanan');
        return true;
        
    }
}