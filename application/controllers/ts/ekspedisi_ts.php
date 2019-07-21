<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ekspedisi_ts extends CI_Controller {
function __construct(){
    parent::__construct();
		$this->load->model('ts/md_ekspedisiTS');
		// $this->load->model('ts/md_SPITS');
    }
	public function index(){
		$bag 	= array("1.01", "3.03");
		$kodJ	= substr($this->session->userdata('kode_jabatan'),0,4);
		if (in_array($kodJ,$bag)) {
			$this->viewEkspedisiTS();
		} else {
			echo '<div style="padding:20px;color:red"> 
				  Maaf, Anda tidak memiliki hak akses pada menu ini.
				  </div>';
		}
	}
	function viewEkspedisiTS(){
		$view = $this->load->view('ts/ekspedisi_general',null,true);
		echo $view;
	}

	public function daftarEkspedisiTS(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
		$filterTahun = isset($_POST['tahun']) ? $_POST['tahun'] : null;
		
		$rs = $this->md_ekspedisiTS->ambilDaftarEkspedisiTS(null,null,"total",$filterTahun);
		$result["total"] = $rs;
		
		$query = $this->md_ekspedisiTS->ambilDaftarEkspedisiTS($page,$rows,null,$filterTahun);
		$result["rows"] = $query;
		
		echo json_encode($result);
	}

	public function daftarNomorProgram(){
		$query = $this->md_ekspedisiTS->ambilNoProgram();
		echo json_encode($query->result());
	}

	public function updateEkspedisi(){
		if($_POST){
			$nomor = $_POST['nomor'];
			$ke = $_POST['ke'];
			$dari = $_POST['dari'];
			$disposisi = $_POST['disposisi'];
			$this->md_ekspedisiTS->updateEkspedisi($nomor,$ke,$dari,$disposisi);
			
			echo 'Data Berhasil Diubah';
		}else{
			echo "Data tidak valid.";
		}
	}
	
	public function formEkspedisi(){
		$view = $this->load->view('ts/formEkspedisi',null,true);
		echo $view;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
