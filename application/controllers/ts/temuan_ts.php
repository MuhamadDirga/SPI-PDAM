<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temuan_ts extends CI_Controller {
function __construct(){
    parent::__construct();
		$this->load->model('ts/md_temuanTS');
		$this->load->model('ts/md_SPITS');
    }
	public function index(){
		$bag 	= array("1.01", "3.03");
		$kodJ	= substr($this->session->userdata('kode_jabatan'),0,4);
		if (in_array($kodJ,$bag)) {
			$this->viewTemuanTS();
		} else {
			echo '<div style="padding:20px;color:red"> 
				  Maaf, Anda tidak memiliki hak akses pada menu ini.
				  </div>';
		}
	}
	function viewTemuanTS(){
		$view = $this->load->view('ts/temuan_general',null,true);
		echo $view;
	}

	function formTemuan(){
		$view = $this->load->view('ts/formTemuan',null,true);
		echo $view;
	}

	public function daftarTemuanTS(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
		$filterNomor = isset($_POST['nomor']) ? $_POST['nomor'] : null;
		
		$rs = $this->md_temuanTS->ambilDaftarTemuanTS(null,null,"total",$filterNomor);
		$result["total"] = $rs;
		
		$query = $this->md_temuanTS->ambilDaftarTemuanTS($page,$rows,null,$filterNomor);
		$result["rows"] = $query;
		
		echo json_encode($result);
	}

	public function daftarNomorTugas(){
		$query = $this->md_SPITS->daftarNomorTugas();
		echo json_encode($query->result());
	}

	public function daftarTemuan(){
		if (isset($_POST['tugas'])){
			$tugas = $_POST['tugas'];
			$query = $this->md_temuanTS->ambilTemuan($tugas);
			echo json_encode($query->result());
		}else {
			echo json_encode(null);
		}
	}

	public function daftarSemuaBagian(){
		$query = $this->md_temuanTS->ambilBagianAll();
		echo json_encode($query->result());
	}

	public function daftarBagian(){
		$tugas = $_POST['tugas'];
		$query = $this->md_temuanTS->ambilBagian($tugas);
		echo json_encode($query->result());
	}

	public function simpanTemuan(){
		if($_POST){
			$tugas = $_POST['tugas'];
			$this->md_temuanTS->hapusTemuan($tugas);
			$bag = $_POST['bag'];
			$isi = $_POST['isi'];
			$urut = $_POST['urut'];
			$this->md_temuanTS->simpanTemuan($tugas,$bag,$isi,$urut);
			
			echo '1';
		}else{
			echo "Data tidak valid.";
		}
	}

	public function uploadLHA()
	{
		$config['upload_path']="././upload"; //path folder file upload
		$config['allowed_types']='pdf'; //type file yang boleh di upload

		$this->load->library('upload', $config); //call library upload
		if ($this->upload->do_upload("fileLHA")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
			$fileLHA = $data['upload_data']['file_name'];
			$conf['upload_path']="././upload"; //path folder file upload
			$conf['allowed_types']='pdf'; //type file yang boleh di upload

			$this->load->library('upload', $conf); //call library upload
			if ($this->upload->do_upload("fileTemuan")){ //upload file
				$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
				$fileTemuan = $data['upload_data']['file_name'];
				$nomor = $this->input->post('nomor');
				$tgl_meeting = $this->input->post('tgl_meeting');
				$tgl_lha = $_POST['tgl_lha'];
				$this->md_temuanTS->updateLHA($nomor,$tgl_meeting,$tgl_lha);
				$this->md_temuanTS->hapusFile($nomor);
				$this->md_temuanTS->simpanFile($nomor,$fileLHA,'././upload','LHA');
				$this->md_temuanTS->simpanFile($nomor,$fileTemuan,'././upload','Temuan');
				echo 'Data Berhasil Disimpan';
			}else {
				echo 'upload file Temuan error, tipe data harus pdf!';
			}
		}else {
			echo 'upload file LHA error, tipe data harus pdf!';
		}
	}
	
	public function formTambahTemuan(){
		$data['urut'] = $_POST['urut'];
		$data['tugas'] = $_POST['tugas'];
		$view = $this->load->view('ts/formTambahTemuan',$data,true);
		echo $view;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
