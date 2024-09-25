<?php

class M_user extends CI_Model {

    function register($data) {
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
 
    
    

    private $table = "user";

    function cek($username, $password) {
        // $this->db->where("u_name", $username);
        // $this->db->where("u_paswd", md5($password));
        $ok = $this->db->query('SELECT * FROM user a, person b WHERE a.pid=b.pid AND a.u_name=\''.$username.'\' AND u_paswd=\''.md5($password).'\'');
        // return $this->db->get("user");
        return $ok;
    }

    function semua() {
        return $this->db->get("user");
    }

    function cekKode($kode) {
        $this->db->where("u_name", $kode);
        return $this->db->get("user");
    }

    function cekId($kode) {
        $this->db->where("u_id", $kode);
        return $this->db->get("user");
    }
    
    function getLoginData($usr, $psw) {
        $u = mysql_real_escape_string($usr);
        $p = md5(mysql_real_escape_string($psw));
        $q_cek_login = $this->db->get_where('user', array('username' => $u, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qck) {
                foreach ($q_cek_login->result() as $qad) {
                    $sess_data['logged_in'] = 'aingLoginWebYeuh';
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['group'] = $qad->group;
                    $sess_data['rid'] = $qad->rid;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login');
        }
    }

    function update($id, $info) {
        $this->db->where("u_id", $id);
        $this->db->update("user", $info);
    }

    function simpan($info) {
        $this->db->insert("user", $info);
    }

    function hapus($kode) {
        $this->db->where("u_id", $kode);
        $this->db->delete("user");
    }

}