<?php
class M_klien extends CI_Model{
	public function get_klien_all()
	{
		return $this->db->query('SELECT * FROM klien ORDER BY id ASC')->result_array();
	}
	public function delete_one_klien()
	{
		return $this->db->query('DELETE FROM klien WHERE id = '.$this->uri->segment(3).' ');
	}
	public function get_klien()
	{
		return $this->db->query('SELECT * FROM klien ORDER BY id ASC')->result_array();
	}

	public function get_one_klien()
	{
		return $this->db->query('SELECT * FROM klien WHERE id = '.$this->uri->segment(3).' ')->row_array();
	}
	public function insert_klien()
	{
		$simpan = [
		'judul'     	=> $this->input->post('judul'),
		'subjudul_1'     => $this->input->post('subjudul_1'),
        'subjudul_2'     => $this->input->post('subjudul_2'),
        'subjudul_3'     => $this->input->post('subjudul_3'),
        'subjudul_4'     => $this->input->post('subjudul_4'),
        'teks_1'     => $this->input->post('teks_1'),
        'teks_2'     => $this->input->post('teks_2'),
        'teks_3'     => $this->input->post('teks_3'),
        'teks_4'     => $this->input->post('teks_4'),
        'gambar_1'     => $gambar_1,
        'gambar_2'     => $gambar_2,
        'gambar_3'     => $gambar_3,
        'gambar_4'     => $gambar_4
		];

		$ok = $this->db->insert('klien', $simpan);
		return $ok;
	}

	public function update_klien()
	{
		$update = [
		'judul'     => $this->input->post('judul'),
		'subjudul_1'     => $this->input->post('subjudul_1'),
        'subjudul_2'     => $this->input->post('subjudul_2'),
        'subjudul_3'     => $this->input->post('subjudul_3'),
        'subjudul_4'     => $this->input->post('subjudul_4'),
        'teks_1'     => $this->input->post('teks_1'),
        'teks_2'     => $this->input->post('teks_2'),
        'teks_3'     => $this->input->post('teks_3'),
        'teks_4'     => $this->input->post('teks_4'),
        'gambar_1'     => $gambar_1,
        'gambar_2'     => $gambar_2,
        'gambar_3'     => $gambar_3,
        'gambar_4'     => $gambar_4
		];

	 	$this->db->where('id', $this->input->post('id'));
		$ok = $this->db->update('klien', $update);

		return true;
	}
	public function delete_klien()
    {
        $this->db->where('id', $this->uri->segment(3));
        $ok = $this->db->delete('klien');
        return true;
        
    }
}
