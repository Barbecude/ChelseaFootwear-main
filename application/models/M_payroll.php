<?php
class M_payroll extends CI_Model{
	public function get_payroll_all()
	{
		return $this->db->query('SELECT * FROM payroll ORDER BY id_payroll ASC')->result_array();
	}
	public function get_payroll()
	{
		return $this->db->query('SELECT * FROM payroll ORDER BY id_payroll ASC')->result_array();
	}

	public function get_one_payroll()
	{
		return $this->db->query('SELECT * FROM payroll WHERE id_payroll = '.$this->uri->segment(3).' ')->row_array();
	}
	public function insert_payroll()
	{
		$simpan = [
            'id_pegawai'    => $this->input->post('id_pegawai'),
            'id_jabatan'    => $this->input->post('id_jabatan'),
            'pokok'         => $this->input->post('pokok'),
            'potongan'      => $this->input->post('potongan'),
            'bonus'         => $this->input->post('bonus'),
            'total'         => $this->input->post('total'),
            'create_time'   => $this->input->post('create_time'),
            'create_id'     => $this->input->post('create_id'),
            'modify_time'   => $this->input->post('modify_time'),
            'modify_id'     => $this->input->post('modify_id'),
		];

		$ok = $this->db->insert('payroll', $simpan);
		return $ok;
	}
	public function update_payroll()
	{
		$update = [
            'id_pegawai'    => $this->input->post('id_pegawai'),
            'id_jabatan'    => $this->input->post('id_jabatan'),
            'pokok'         => $this->input->post('pokok'),
            'potongan'      => $this->input->post('potongan'),
            'bonus'         => $this->input->post('bonus'),
            'total'         => $this->input->post('total'),
            'create_time'   => $this->input->post('create_time'),
            'create_id'     => $this->input->post('create_id'),
            'modify_time'   => $this->input->post('modify_time'),
            'modify_id'     => $this->input->post('modify_id'),
		];
        
		$this->db->where('id_payroll', $this->input->post('id_payroll'));
		$ok = $this->db->update('payroll', $update);

		return true;
	}
	public function delete_payroll()
    {
        $this->db->where('id_payroll', $this->uri->segment(3));
        $ok = $this->db->delete('payroll');
        return true;
        
    }
}