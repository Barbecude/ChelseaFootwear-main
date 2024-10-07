<?php
class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_user'));
        if ($this->session->userdata('u_name')) {
            redirect('dashboard');
        }
    }

    function index() {
        $this->load->view('register');
    }

    function proses() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.u_name]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            // Get user input from form
            $data = array(
                'nama' => $this->input->post('nama'),
                'u_name' => $this->input->post('username'),  // Assign to u_name instead of username
                'u_paswd' => md5($this->input->post('password')), // Encrypt password using md5
                'role' => 'user' // Default role
            );

            // Save user data to database
            $insert = $this->m_user->register($data);
            if ($insert) {
                // Get user info from database to create session
                $user = $this->m_user->get_user_by_username($data['u_name']); // Adjust this method as per your model
                if ($user) {
                    $sess_data = array(
                        'u_id' => $user->u_id,
                        'nama' => $user->nama,
                        'u_name' => $user->u_name,
                        'role' => $user->role,
                        'pid'  => $user->pid // Include this if applicable
                    );
                    $this->session->set_userdata($sess_data);
                }
                $this->session->set_flashdata('success', 'Registration successful. You are now logged in.');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'An error occurred. Please try again.');
                redirect('register');
            }
        }
    }    
}
?>
