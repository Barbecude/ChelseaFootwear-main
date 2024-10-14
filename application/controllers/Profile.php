<?php
class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if (!$this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
        $this->load->model('m_profile');
    }

    public function index($id = null) {
        // Redirect ke halaman login jika tidak ada session pid
        if (!$this->session->userdata('pid')) {
            redirect('login'); 
        }

        if ($id === null || $id != $this->session->userdata('pid')) {
            redirect(404); // Redirect ke dashboard jika ID tidak sesuai
        }        
        
        // Ambil data profil berdasarkan ID
        $data['profile'] = $this->m_profile->get_person_by_id($id);
        
        // Load view dengan data profil
        $this->load->view('profile', $data);
    }
    
    
    public function update_profile() {
        $id = $this->session->userdata('pid');
    
        if (!$id) {
            redirect('login');
        }
    
        $data = [
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'u_name' => $this->input->post('username'),
            'kelamin' => $this->input->post('kelamin'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp'),
            'tanggal_lahir' => $this->input->post('tgl_lahir'),
        ];
    
        $this->m_profile->update_person_by_id($id, $data);
    
        redirect('profile/' . $id);
    }
    
}
