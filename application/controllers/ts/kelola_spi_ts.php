<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelola_spi_ts extends CI_Controller {
function __construct(){
    parent::__construct();
		$this->load->model('ts/md_SPITS');
		$this->load->model('master_data/md_tahun');
		$this->load->model('master_data/md_program');
		$this->load->model('master_data/md_jenis');
		$this->load->model('master_data/md_auditor');
		$this->load->model('master_data/md_auditor_tahunan');
		$this->load->model('master_data/md_sasaran');
		$this->load->model('master_data/md_tujuan');
		$this->load->model('master_data/md_bagian');
		$this->load->model('master_data/md_detail_bagian');
    }
	public function index(){
		$bag 	= array("1.01", "3.03");
		$kodJ	= substr($this->session->userdata('kode_jabatan'),0,4);
		if (in_array($kodJ,$bag)) {
			$this->viewSPITS();
		} else {
			echo '<div style="padding:20px;color:red"> 
				  Maaf, Anda tidak memiliki hak akses pada menu ini.
				  </div>';
		}
	}
	function viewSPITS(){
		$view = $this->load->view('ts/spi_general',null,true);
		echo $view;
	}

	public function daftarSPITS(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
		$filterTahun = isset($_POST['tahun']) ? $_POST['tahun'] : null;
		$filterProgram = isset($_POST['program']) ? $_POST['program'] : null;
		$filterJenis = isset($_POST['jenis']) ? $_POST['jenis'] : null;
		
		$rs = $this->md_SPITS->ambilDaftarSPITS(null,null,"total",$filterTahun,$filterProgram,$filterJenis);
		$result["total"] = $rs;
		
		$query = $this->md_SPITS->ambilDaftarSPITS($page,$rows,null,$filterTahun,$filterProgram,$filterJenis);
		$result["rows"] = $query;
		
		echo json_encode($result);
	}
	public function daftarAuditor(){
		$No_Tahunan = $_POST['Nomor'];
		$result["total"] = 0;
		
		$query = $this->md_auditor_tahunan->ambilAuditor($No_Tahunan);
		echo '{"total":1,"rows":'.json_encode($query->result()).',"footer":[]}';
	}
	public function daftarDetailBagian(){
		$No_Tahunan = $_POST['Nomor'];
		$result["total"] = 0;
		
		$query = $this->md_detail_bagian->ambilBagian($No_Tahunan);
		echo '{"total":1,"rows":'.json_encode($query->result()).',"footer":[]}';
	}
	public function daftarSasaran(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
		$No_Tahunan = $_POST['Nomor'];
		
		$rs = $this->md_sasaran->ambilSasaran(null,null,"total",$No_Tahunan);
		$result["total"] = $rs;
		
		$query = $this->md_sasaran->ambilSasaran($page,$rows,null,$No_Tahunan);
		$result["rows"] = $query;
		
		echo json_encode($result);
	}
	public function daftarTujuan(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
		$No_Tahunan = $_POST['Nomor'];
		
		$rs = $this->md_tujuan->ambilTujuan(null,null,"total",$No_Tahunan);
		$result["total"] = $rs;
		
		$query = $this->md_tujuan->ambilTujuan($page,$rows,null,$No_Tahunan);
		$result["rows"] = $query;
		
		echo json_encode($result);
	}
	public function daftarJenis(){
		$query = $this->md_jenis->ambilJenis();
		echo json_encode($query->result());
	}
	public function daftarTahun(){
		$query = $this->md_tahun->ambilTahun();
		echo json_encode($query->result());
	}
	public function daftarProgram(){
		$query = $this->md_program->ambilProgram();
		echo json_encode($query->result());
	}
	public function daftarBagian(){
		$query = $this->md_bagian->ambilBagian();
		echo json_encode($query->result());
	}
	public function daftarSemuaAuditor(){
		$query = $this->md_auditor->ambilAuditor();
		echo json_encode($query->result());
	}
	public function ambilAuditorBy(){
		$pkpt = $_POST['pkpt'];
		$query = $this->md_auditor->ambilAuditorBy($pkpt);
		echo json_encode($query->result());
	}
	
	public function formTambahProgram(){
		$view = $this->load->view('ts/formTambahSPI',null,true);
		echo $view;
	}

	public function genNo(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$hasil = $this->md_SPITS->checkNomor(substr($nomor, 0,19));
			
			echo json_encode($hasil->result());
		}else{
			echo "Data tidak valid.";
		}
	}

	public function tambahProgramTahunan(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$program = $_POST['program'];
			$jenis = $_POST['jenis'];
			$tahun = $_POST['tahun'];
			$obyek = $_POST['obyek'];
			$ruang = $_POST['ruang'];
			$dasar = $_POST['dasar'];
			$this->md_SPITS->simpanProgTahunan($nomor,$program,$jenis,$tahun,$obyek,$ruang,$dasar);
			
			echo '1';
		}else{
			echo "Data tidak valid.";
		}
	}

	public function tambahAuditorProgram(){
		
		if($_POST){
			$pkpt = $_POST['pkpt'];
			$nomor = $_POST['nomor'];
			$jab = $_POST['jab'];
			$this->md_SPITS->simpanAuditorProgram($pkpt,$nomor,$jab);
			
			echo '1';
		}else{
			echo "Data tidak valid.";
		}
	}

	public function tambahBagianProgram(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$bag = $_POST['bag'];
			$this->md_SPITS->simpanBagianProgram($nomor,$bag);
			
			echo '1';
		}else{
			echo "Data tidak valid.";
		}
	}

	public function tambahSasaranProgram(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$urut = $_POST['urut'];
			$isi = $_POST['isi'];
			$this->md_SPITS->simpanSasaranProgram($nomor,$urut,$isi);
			
			echo '1';
		}else{
			echo "Data tidak valid.";
		}
	}

	public function tambahTujuanProgram(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$urut = $_POST['urut'];
			$isi = $_POST['isi'];
			$this->md_SPITS->simpanTujuanProgram($nomor,$urut,$isi);
			
			echo '1';
		}else{
			echo "Data tidak valid.";
		}
	}

	public function ubahJenis(){
		
		if($_POST){
			$kd = $_POST['kd'];
			$nama = $_POST['nama'];
			$this->md_jenis->ubahJenis($kd,$nama);
			
			echo 'Data Berhasil Diubah';
		}else{
			echo "Data tidak valid.";
		}
		
	}

	public function hapusProgramTahunan(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$this->md_SPITS->hapusProgramTahunan($nomor);
			
			echo 'Data Berhasil Dihapus';
		}else{
			echo "Data tidak valid.";
		}
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
