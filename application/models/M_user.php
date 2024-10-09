<?php

class M_user extends CI_Model {
    private $table_person = "person";

    // Fungsi untuk mendaftarkan pengguna
    function register($data) {
        // Menyimpan data pengguna ke tabel person
        $simpan = [
            'nama'          => $data['nama'],
            'email'         => $this->input->post('email'),
            'alamat'        => $this->input->post('alamat'),
            'kelamin'       => $this->input->post('kelamin'),
            'u_name'        => $data['u_name'],
            'hp'            => $this->input->post('hp'),
            'tanggal_lahir' => $this->input->post('tgl_lahir'),
            'u_paswd'      => md5($this->input->post('password')) // Menyimpan password yang telah di-hash
        ];
        
        // Melakukan penyimpanan ke tabel person
        $this->db->insert($this->table_person, $simpan);
        return $this->db->insert_id(); // Mengembalikan ID pengguna yang baru disimpan
    }

    // Fungsi untuk mengambil pengguna berdasarkan username
    public function get_user_by_username($username) {
        return $this->db->get_where($this->table_person, array('u_name' => $username))->row();
    }

    // Fungsi untuk memeriksa kredensial login
    function cek($username, $password) {
        $this->db->where("u_name", $username);
        $this->db->where("u_paswd", md5($password)); // Menggunakan md5 untuk mencocokkan password
        return $this->db->get($this->table_person); // Mengembalikan hasil query
    }

    // Fungsi untuk mengambil semua pengguna
    function semua() {
        return $this->db->get($this->table_person);
    }

    // Fungsi untuk memeriksa apakah username sudah ada
    function cekKode($kode) {
        $this->db->where("u_name", $kode);
        return $this->db->get($this->table_person);
    }

    // Fungsi untuk memeriksa pengguna berdasarkan ID
    function cekId($kode) {
        $this->db->where("pid", $kode); // Menggunakan pid jika itu adalah primary key di tabel person
        return $this->db->get($this->table_person);
    }

    // Fungsi untuk mengupdate data pengguna
    function update($id, $info) {
        $this->db->where("pid", $id); // Menggunakan pid untuk mengidentifikasi pengguna
        $this->db->update($this->table_person, $info);
    }

    // Fungsi untuk menyimpan data pengguna
    function simpan($info) {
        $this->db->insert($this->table_person, $info);
    }

    // Fungsi untuk menghapus pengguna
    function hapus($kode) {
        $this->db->where("pid", $kode); // Menggunakan pid untuk mengidentifikasi pengguna
        $this->db->delete($this->table_person);
    }
}
