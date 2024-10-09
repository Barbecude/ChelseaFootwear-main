<?php
class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_user'); // Pastikan model m_user di-load di sini
        if ($this->session->userdata('u_name')) {
            redirect('dashboard');
        }
    }

    function index() {
        $this->load->view('register');
    }

    function proses() {
        // Validasi input
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('u_name', 'Username', 'required|is_unique[person.u_name]'); // Menggunakan u_name
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            // Ambil input dari form
            $data = array(
                'nama' => $this->input->post('nama'),
                'u_name' => $this->input->post('u_name'), // Menggunakan u_name dari input
                'u_paswd' => md5($this->input->post('password')), // Disimpan di kolom u_paswd
                'role' => 'user', // Default role, jika perlu disimpan di kolom lain
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'kelamin' => $this->input->post('kelamin'),
                'hp' => $this->input->post('hp'),
                'tanggal_lahir' => $this->input->post('tgl_lahir')
            );

            // Simpan data ke tabel person
            $insert = $this->m_user->register($data); // Fungsi register di model mengarah ke tabel person
            if ($insert) {
                // Ambil informasi user dari database
                $user = $this->m_user->get_user_by_username($data['u_name']);
                if ($user) {
                    $sess_data = array(
                        'pid' => $user->pid, // Menggunakan pid dari tabel person
                        'nama' => $user->nama,
                        'u_name' => $user->u_name,
                        'role' => $user->role
                    );
                    $this->session->set_userdata($sess_data);
                }
                $this->session->set_flashdata('success', 'Registrasi berhasil. Anda sudah masuk.');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Silakan coba lagi.');
                redirect('register');
            }
        }
    }    
}
