<?php
class M_peminjaman extends CI_Model{
	public function get_peminjaman()
	{
		return $this->db->query('SELECT * FROM peminjaman ORDER BY id_peminjaman ASC')->result_array();
	}

	public function get_peminjaman_edit()
	{
		return $this->db->query('SELECT * FROM peminjaman WHERE id_peminjaman = '.$this->uri->segment(3).' ')->row_array();
	}
	public function add_peminjaman()
	{
		$ok = $this->db->insert('peminjaman', $this->input->post());
		return $ok;
	}
	public function peminjaman_edit()
	{
		$ok = $this->db->update('peminjaman', $this->input->post());
		return $ok;
	}
	public function delete_peminjaman()
    {
        $this->db->where('id_peminjaman', $this->uri->segment(3));
        $ok = $this->db->delete('peminjaman');
        return true;       
    }
}