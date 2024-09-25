<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat extends CI_Controller {
    public function __construct(){
        parent::__construct();

        // Cek apakah terdapat session dengan nama authenticated

        if( ! $this->session->userdata('pid')) // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
            $this->load->model('surat_mdl');
    }

// AWAL SURAT MASUK
    public function masuk()

    {
        $data = [
            'breadcum' => 'Data Surat Masuk',
            'link_tambah'  => 'surat/add_masuk',
            'masuk'    => $this->surat_mdl->getdatamasuk(),
           
       
        ];
        $this->template->display('surat/masuk/index',$data);
    }



    public function add_masuk()
        {
            $data = [
                'breadcum'          => 'masuk add',
                'link_simpan'       => 'surat/add_masuk_simpan',
             

            ];
            $this->template->display('surat/masuk/add', $data);
        }
    
        


        public function masuk_show()
        {
            $data = [
                'breadcum' => 'Data Surat Masuk',
                'link_tambah'  => 'surat/add_masuk',
                'masuk'    => $this->surat_mdl->getmasukone(),
            ];
            $this->template->display('surat/masuk/show',$data);
        }
    
        public function masuk_edit()
        {
            $data = [
                'breadcum'          => 'masuk add',
                'link_simpan'       => 'surat/masuk_edit_simpan',
                'masuk'    => $this->surat_mdl->getmasukone(),

            ];
            $this->template->display('surat/masuk/edit', $data);
        }


        public function masuk_edit_simpan()
        {
           $ok = $this->surat_mdl->masuk_edit();
           if($ok){
                echo "Ok";               
           }else{
                echo "fail";
           }
        }


        public function add_masuk_simpan()
        {
    
        //CEK DULU table dari 
        $cekdata = $this->surat_mdl->data_dari();
            

        if($cekdata==''){
            // $ok = $this->surat_mdl->simpan_dari();
           $ok = $this->surat_mdl->add_masuk();
           if($ok){
                echo "Ok";               
           }else{
                echo "fail";
           }
        }

        }


        public function masuk_delete() 
    {
    //    // $cekdata = $this->surat_mdl->data_dari();

    //     if($cekdata==''){
    //         $ok = $this->surat_mdl->delete_dari();
    //     // }

        $ok = $this->surat_mdl->getdeleteone();

        if($ok){
            die('<script>alert("Data berhasil di hapus"); window.location.replace("'.base_url("surat/masuk").'");</script>');
        }else{
            die('<script>alert("Data gagal di hapus"); window.location.replace('.base_url("surat/masuk").');</script>');
        }
    }
// END SURAT MASUK 

// AWAL SURAT KELUAR
    public function keluar()
    {
        $data = [
            'breadcum'      => 'Data Surat Keluar',
            'link_tambah'   => 'surat/add_keluar',
            'link_simpan'   => 'surat/keluar_edit',
            'surat_keluar'  => $this->surat_mdl->getdatakeluar(),
        ];
        $this->template->display('surat/keluar/index', $data);
    }

    public function add_keluar()
        {
            $data = [
                'breadcum'          => 'Tambahkan Surat Keluar',
                'link_simpan'       => 'surat/add_keluar_simpan',
            ];
            $this->template->display('surat/keluar/add', $data);
        }
    
    public function add_keluar_simpan()
        {
            // var_dump($this->input->post());
            // die();
           $ok = $this->surat_mdl->add_keluar();
           if($ok){
                echo "Ok";               
           }else{
                echo "Fail";
           }
        }

        public function keluar_edit()
        {
            $data = [
                'breadcum'          => 'Edit Surat Keluar',
                'link_update'       => 'surat/keluar_edit_simpan',
                'surat_keluar'    => $this->surat_mdl->getkeluaredit(),
            ];
            $this->template->display('surat/keluar/edit', $data);
        }


        public function keluar_edit_simpan()
        {
           $ok = $this->surat_mdl->keluar_edit();
           if($ok){
                echo "Ok";               
           }else{
                echo "Fail";
           }
        }

        public function keluar_print()
        {
            $data = [
                'breadcum'          => 'Print-Out Surat Keluar',
                'surat_print'       => $this->surat_mdl->getprintout(),
            ];
            $this->load->view('surat/keluar/print', $data);  
        }

        public function keluar_delete() 
    {
        $ok = $this->surat_mdl->getdeletetwo();

        if($ok){
            die('<script>alert("Surat berhasil di hapus"); window.location.replace("'.base_url("surat/keluar").'");</script>');
        }else{
            die('<script>alert("Surat gagal di hapus"); window.location.replace('.base_url("surat/keluar").');</script>');
        }
    }
}
?>

