<?php

class Surat_mdl extends CI_Model {

// AWAL SURAT MASUK
function getdatamasuk()
{
    return $this->db->query('select * from surat_masuk order by id_surat')->result_array();
}

function getmasukone()
{
    return $this->db->query('select * from surat_masuk where id_surat = '.$this->uri->segment(3))->row_array();
}

function data_dari()
{
	//BENERIN INI QUERY
	$dari = $this->input->post('dari');
	$nomor = $this->input->post('nomor');
	$lampiran = $this->input->post('lampiran');
	$perihal = $this->input->post('perihal');
	$kepada = $this->input->post('kepada');
	$foto_berkas = $this->input->post('foto_berkas');
	$tgl_surat = $this->input->post('tgl_surat');

	$cek =  $this->db->query("SELECT * FROM surat_masuk WHERE dari LIKE '%$dari%' AND nomor LIKE '%$nomor%' AND lampiran LIKE '%$lampiran%' AND perihal LIKE '%$perihal%' AND kepada LIKE '%$kepada%' AND foto_berkas LIKE '%$foto_berkas%' AND tgl_surat LIKE '%$tgl_surat%' ")->row_array();
	// return $this->db->query('SELECT * FROM m_suratmasuk WHERE nama_dari LIKE \'%'.$this->input->post('dari').'%\' ')->row_array();

	// return $this->db->query('SELECT a.*, b.id_surat FROM surat_masuk a, m_suratmasuk b WHERE a.id_surat = b.id_surat LIKE \'%'.$this->input->post('dari').'%\' ')->row_array();
}


public function getdeleteone()
	{
		$id_surat = $this->uri->segment(3);
		$this->db->query("DELETE FROM surat_masuk WHERE id_surat = '$id_surat' ");
		return $this->db->query("DELETE FROM m_suratmasuk WHERE id_surat = '$id_surat' ");
		

	}
	
public function add_masuk()
	{
		$config['upload_path']="./assets/img";
		$config['allowed_types']='gif|jpg|png|jpeg|pdf';
		$this->load->library('upload', $config);
		if($this->upload->do_upload("gambar1")){
			$berkas = array('upload_data' => $this->upload->data());
			$berkas_upload= $berkas['upload_data']['file_name'];
		}else{
			$berkas_upload = '';
		}


		$simpan = [
			'dari'		  => $this->input->post('dari'),
			'nomor'		  => $this->input->post('nomor'),         
			'lampiran'	  => $this->input->post('lampiran'),
			'perihal'	  => $this->input->post('perihal'),
			'kepada'	  => $this->input->post('kepada'),
			'tgl_surat'	  => $this->input->post('tgl_surat'),
			'foto_berkas' => $berkas_upload,
		];
		$this->db->where('id_surat', $this->input->post('id_surat'));
		$ok = $this->db->insert('surat_masuk', $simpan);
		$surat = $this->db->insert_id();
		$simpan = [
			'nama_dari'		  => $this->input->post('dari'),			
			'tgl_surat'	  => $this->input->post('tgl_surat'),
			'id_surat'		  => $surat,			
		];
		$ok = $this->db->insert('m_suratmasuk', $simpan);
	

		return $ok;
	}

	public function simpan_dari()
	{
		$simpan = [
			'nama_dari'		  => $this->input->post('dari'),
		];
		$ok = $this->db->insert('m_suratmasuk', $simpan);
		return $ok;
	}

	public function delete_dari()
	{
		return $this->db->query('DELETE FROM m_suratmasuk WHERE nama_dari = '.$this->uri->segment(3).' ');
	}

	public function masuk_edit()
	{
		$config['upload_path']="./assets/img";
		$config['allowed_types']='gif|jpg|png|jpeg|pdf';
		$this->load->library('upload', $config);
		if($this->upload->do_upload("gambar1")){
			$berkas = array('upload_data' => $this->upload->data());
			$berkas_upload= $berkas['upload_data']['file_name'];
		}else{
			$berkas_upload = '';
		}


		$simpan = [
			'dari'		  => $this->input->post('dari'),
			'nomor'		  => $this->input->post('nomor'),         
			'lampiran'	  => $this->input->post('lampiran'),
			'perihal'	  => $this->input->post('perihal'),
			'kepada'	  => $this->input->post('kepada'),
			'tgl_surat'	  => $this->input->post('tgl_surat'),
			'foto_berkas' => $berkas_upload,
		];
		$this->db->where('id_surat', $this->input->post('id_surat'));
		$ok = $this->db->update('surat_masuk', $simpan);
		return $ok;
	}

// END SURAT MASUK

// AWAL SURAT KELUAR

function getdatakeluar()
	{
		return $this->db->query('SELECT * FROM surat_keluar order by id_surat_keluar')->result_array();
	}

function getkeluaredit()
{
    return $this->db->query('SELECT * FROM surat_keluar where id_surat_keluar = '.$this->uri->segment(3))->row_array();
}

public function getdeletetwo()
	{
		return $this->db->query('DELETE FROM surat_keluar WHERE id_surat_keluar = '.$this->uri->segment(3).' ');
	}

public function getprintout()
{
	return $this->db->query('SELECT * FROM surat_keluar where id_surat_keluar = '.$this->uri->segment(3))->row_array();
}

public function add_keluar()
	{
		// $config['upload_path']="./assets/img";
		// $config['allowed_types']='gif|jpg|png|jpeg|pdf';
		// $this->load->library('upload', $config);
		// if($this->upload->do_upload("gambar1")){
		// 	$berkas = array('upload_data' => $this->upload->data());
		// 	$berkas_upload= $berkas['upload_data']['file_name'];
		// }else{
		// 	$berkas_upload = '';
		// }

		// $simpan = [
		// 	'nomor_surat'		=> $this->input->post('nomor_surat'),
		// 	'lampiran'		  	=> $this->input->post('lampiran'),         
		// 	'hal'	  			=> $this->input->post('hal'),
		// 	'kepada'	  		=> $this->input->post('kepada'),
		// 	'lokasi'	  		=> $this->input->post('lokasi'),
		// 	'text_surat'	  	=> $this->input->post('text_surat'),
		// 	'tanggal_surat'	    => $this->input->post('tanggal_surat'),
		// 	'penanda_tangan'	=> $this->input->post('penanda_tangan'),
		// ];

		$ok = $this->db->insert('surat_keluar', $this->input->post());
		return $ok;
	}

	public function keluar_edit()
	{
		$simpan = [
			'nomor_surat'		=> $this->input->post('nomor_surat'),
			'lampiran'		  	=> $this->input->post('lampiran'),         
			'hal'	  			=> $this->input->post('hal'),
			'kepada'	  		=> $this->input->post('kepada'),
			'lokasi'	  		=> $this->input->post('lokasi'),
			'text_surat'	  	=> $this->input->post('text_surat'),
			'tanggal_surat'	    => $this->input->post('tanggal_surat'),
			'penanda_tangan'	=> $this->input->post('penanda_tangan'),
		];
		
		$this->db->where('id_surat_keluar', $this->input->post('id_surat_keluar'));
		$ok = $this->db->update('surat_keluar', $simpan);
		return $ok;
	}

	public function keluar_print()
	{
			$nomor_surat		= $_POST('nomor_surat');
			$lampiran		  	= $_POST('lampiran');         
			$hal	  			= $_POST('hal');
			$kepada	  			= $_POST('kepada');
			$lokasi	  			= $_POST('lokasi');
			$text_surat	  		= $_POST('text_surat');
			$tanggal_surat	    = $_POST('tanggal_surat');
			$penanda_tangan		= $_POST('penanda_tangan');
		
		$this->db->where('id_surat_keluar', $this->input->post('id_surat_keluar'));
	}
// END SURAT KELUAR

}

?>