<?php
class M_footer extends CI_Model{
    public function get_footer_all()
    {
        return $this->db->query('SELECT * FROM footer ORDER BY id ASC')->result_array();
    } 
        public function get_footer()
    {
        return $this->db->query('SELECT * FROM footer ORDER BY id ASC')->result_array();
    }

    public function get_one_footer()
    {
        return $this->db->query('SELECT * FROM footer WHERE id = '.$this->uri->segment(3).' ')->row_array();
    }
    public function get_by_id()
    {
        return $this->db->get_where('footer', array('id'=>$id))->row();    
    }
    public function update_footer()
    {
        $update = [

            //'gambar'            => $gambar,
            'sub_logo'          => $sub_logo,
            'lokasi'            => $this->input->post('lokasi'),
            'icon'              => $icon,
            'feed_back'         => $this->input->post('feedback'),
            'email'             => $this->input->post('email'),
            'copyright'         => $this->input->post('copyright'),
        ];
;
        $this->db->where('id', $this->input->post('id'));
        $ok = $this->db->update('footer', $update);

        return true;
    }
    public function delete_footer()
    {
        $this->db->where('id', $this->uri->segment(3));
        $ok = $this->db->delete('footer');
        return true;
        
    }
    
}
