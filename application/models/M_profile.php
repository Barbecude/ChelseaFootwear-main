<?php
class M_profile extends CI_Model{
	public function get_person_by_id($id)
	{
        return $this->db->get_where('person', ['pid' => $id])->row_array();
	
    }

    public function update_person_by_id($id, $data) {
        $this->db->where('pid', $id);
        $this->db->update('person', $data);
    }

}