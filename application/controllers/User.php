<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_user'); // Load your user model
        $this->load->library('form_validation'); // Load form validation library
    }

    // Display the user list
    public function index() {
        $data['users'] = $this->M_user->get_all_users();
        $this->load->view('user_list', $data); // Load the user list view
    }

    // Show add user form
    public function user_add() {
        if ($this->input->post()) {
            // Set validation rules
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');

            // Validate input
            if ($this->form_validation->run() == TRUE) {
                // Prepare data for insertion
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'u_name' => $this->input->post('username'),
                    'role' => $this->input->post('role'),
                );
                $this->M_user->insert_user($data); // Insert user data
                redirect('masterdata/user'); // Redirect to user list
            }
        }
        $this->load->view('user_add'); // Load add user view
    }

    // Show edit user form
    public function user_edit($id) {
        $data['user'] = $this->M_user->get_user($id);
        
        if ($this->input->post()) {
            $updated_data = array(
                'nama' => $this->input->post('nama'),
                'u_name' => $this->input->post('username'),
                'role' => $this->input->post('role'),
            );
            $this->M_user->update_user($id, $updated_data); // Update user data
            redirect('masterdata/user'); // Redirect to user list
        }
        
        $this->load->view('user_edit', $data); // Load edit user view
    }

    // Delete user
    public function user_delete($id) {
        $this->M_user->delete_user($id); // Delete user
        redirect('masterdata/user'); // Redirect to user list
    }
}
