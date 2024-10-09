<?php
class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if (!$this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
        $this->load->model('m_profile');
    }

    public function index() { // Hapus parameter $id
        $id = $this->session->userdata('pid'); // Ambil ID dari session
        $data['profile'] = $this->m_profile->get_person_by_id($id);
        $this->load->view('profile', $data);
    }
    
    public function update_profile() {
        $id = $this->session->userdata('pid');

        $data = [
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'u_name' => $this->input->post('username')
        ];

        $this->m_profile->update_person_by_id($id, $data);

        redirect('profile');
    }
}
