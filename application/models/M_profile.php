<?php
class M_produk extends CI_Model{
	public function get_user_all()
	{
		return $this->db->query('SELECT * FROM user ORDER BY id ASC')->result_array();
	
    }
    function edit($data) {
        $simpan = [
            'nama'          => $this->input->post('nama'),
            'email'			=> $this->input->post('email'),
            'alamat'        => $this->input->post('alamat'),
            'kelamin'       => $this->input->post('kelamin'),
            'hp'            => $this->input->post('hp'),
            'tanggal_lahir' => $this->input->post('tgl_lahir')
        ];
        $this->db->insert('person', $simpan);
        $pid = $this->db->insert_id();
        $data['pid'] = $pid;
        $this->db->insert('user', $data);
        return $this->db->insert_id();  
    }
}