<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_tugas_ts extends CI_Controller {
function __construct(){
    parent::__construct();
		$this->load->model('ts/md_SPITS');
		$this->load->model('ts/md_printTS');
		$this->load->model('master_data/md_program');
		$this->load->model('master_data/md_auditor');
		$this->load->model('master_data/md_auditor_tahunan');
    }
	public function index(){
		$bag 	= array("1.01", "3.03");
		$kodJ	= substr($this->session->userdata('kode_jabatan'),0,4);
		if (in_array($kodJ,$bag)) {
			$this->viewSuratTugas();
		} else {
			echo '<div style="padding:20px;color:red"> 
				  Maaf, Anda tidak memiliki hak akses pada menu ini.
				  </div>';
		}
	}
	function viewSuratTugas(){
		$view = $this->load->view('ts/st_general',null,true);
		echo $view;
	}

	function viewDaftarCetakPKPT(){
		$view = $this->load->view('ts/daftarCetakPKPT',null,true);
		echo $view;
	}

	function CetakPKPT() {
		require_once(APPPATH. '/libraries/mpdf/mpdf.php');
		define('_MPDF_TTFONTPATH', APPPATH. 'libraries/mpdf/font');
		//echo (APPPATH. 'libraries/mpdf/font');
		$Nomor = $this->input->post('nomor_cetak');
		$row['prog'] = $this->md_printTS->getData($Nomor);
		$row['auditor'] = $this->md_printTS->getAuditor($Nomor);
		$row['bagian'] = $this->md_printTS->getBagian($Nomor);
		$row['sasaran'] = $this->md_printTS->getSasaran($Nomor);
		$row['tujuan'] = $this->md_printTS->getTujuan($Nomor);
		$mpdf = new mpdf('','A4',14,'CTimes',15,15,16,16,9,9,'P');
		$mpdf->SetTitle($Nomor);
		$data = $this->load->view('ts/cetak_PKPT',$row, true);
		$mpdf->WriteHTML($data);
		$mpdf->Output($Nomor.'.pdf','I');
		// $this->load->view('ts/cetak_PKPT',$row);
	}

	public function daftarSuratTugas(){
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

	public function daftarSuratTugasDesc(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
		$filterTahun = isset($_POST['tahun']) ? $_POST['tahun'] : null;
		$filterProgram = isset($_POST['program']) ? $_POST['program'] : null;
		$filterJenis = isset($_POST['jenis']) ? $_POST['jenis'] : null;
		
		$rs = $this->md_SPITS->SPITSOrderByDesc(null,null,"total",$filterTahun,$filterProgram,$filterJenis);
		$result["total"] = $rs;
		
		$query = $this->md_SPITS->SPITSOrderByDesc($page,$rows,null,$filterTahun,$filterProgram,$filterJenis);
		$result["rows"] = $query;
		
		echo json_encode($result);
	}

	public function daftarAuditor(){
		$No_Tahunan = $_POST['Nomor'];
		$result["total"] = 0;
		
		$query = $this->md_auditor_tahunan->ambilAuditor($No_Tahunan);
		echo '{"total":1,"rows":'.json_encode($query->result()).',"footer":[]}';
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
	public function daftarSemuaAuditor(){
		$query = $this->md_auditor->ambilAuditor();
		echo json_encode($query->result());
	}
	public function ambilAuditorBy(){
		$pkpt = $_POST['pkpt'];
		$query = $this->md_auditor->ambilAuditorBy($pkpt);
		echo json_encode($query->result());
	}
	public function ambilProgramBy(){
		$nomor = $_POST['nomor'];
		$query = $this->md_SPITS->ambilProgramBy($nomor);
		echo json_encode($query->result());
	}
	
	public function formTambahProgram(){
		$view = $this->load->view('ts/formTambahST',null,true);
		echo $view;
	}
	public function ambilAuditorByNomor(){
		$nomor = $_POST['nomor'];
		$query = $this->md_auditor_tahunan->ambilAuditorByNomor($nomor);
		echo json_encode($query->result());
	}
	
	public function formUbahProgram(){
		$data['nomor'] = $_POST['nomor'];
		$view = $this->load->view('ts/formUbahSPI',$data,true);
		echo $view;
	}

	public function genNoTugas(){
		
		if($_POST){
			$tugas = $_POST['tugas'];
			$hasil = $this->md_SPITS->checkTugas(substr($tugas, 0,11));
			
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
			$periode = $_POST['periode'];
			$tugas = $_POST['tugas'];
			$tgl_mulai = $_POST['tgl_mulai'];
			$tgl_selesai = $_POST['tgl_selesai'];
			$waktu = $_POST['waktu'];
			$dasar = $_POST['dasar'];
			$credit = $_POST['credit'];
			$this->md_SPITS->simpanProgTahunan($nomor,$program,$jenis,$tahun,$obyek,$ruang,$periode,$tugas,$tgl_mulai,$tgl_selesai,$waktu,$dasar,$credit);
			
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

	public function hapusAuditorProgram(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$this->md_auditor_tahunan->hapusAuditorTahunan($nomor);
			
			echo 'Data Berhasil Dihapus';
		}else{
			echo "Data tidak valid.";
		}
		
	}

	public function ubahProgram(){
		
		if($_POST){
			$nomor = $_POST['nomor'];
			$obyek = $_POST['obyek'];
			$ruang = $_POST['ruang'];
			$dasar = $_POST['dasar'];
			$periode = $_POST['periode'];
			$this->md_SPITS->ubahProgTahunan($nomor,$obyek,$ruang,$dasar,$periode);
			
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
