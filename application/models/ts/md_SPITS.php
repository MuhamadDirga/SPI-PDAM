<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_SPITS extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function checkNomor($nomor){
		$this->db->select("TOP 1 *");
		$this->db->from("Program_Tahunan");
		$this->db->where('LEFT(Nomor,19)', $nomor);
		$this->db->order_by('Nomor', 'desc');
		$hasil=$this->db->get ('');
        return $hasil;
    }

    function checkTugas($tugas){
		$this->db->select("TOP 1 *");
		$this->db->from("Program_Tahunan");
		$this->db->where('LEFT(No_Tugas,11)', $tugas);
		$this->db->order_by('No_Tugas', 'desc');
		$hasil=$this->db->get ('');
        return $hasil;
    }

	function ambilDaftarSPITS($page,$rows,$type=null,$tahun=null,$program=null,$jenis=null){
        $offset = ($page-1)*$rows;
        $this->limit = $rows;
        $this->offset = $offset;
		
		$this->db->select("pt.Nomor,pt.Obyek,pt.Ruang_Lingkup,pt.Kd_Jenis,j.Nama_Jenis Jenis,pt.Waktu,pt.Tgl_Mulai,pt.Tgl_LHA,pt.Kd_Program,p.Nama_Program Program,pt.No_Tugas,pt.Dasar,pt.Periode_Audit,pt.Tgl_Selesai,pt.Tgl_Audit_Meeting,pt.Tgl_Ke_Direksi,pt.Tgl_Dari_Direksi,pt.Disposisi_Direksi,pt.Kd_Tahun,t.Tahun,pt.Tgl_Pembuaan,pt.Credit
		");
		$this->db->from("Program_Tahunan pt");
		$this->db->join("Tahun t","pt.Kd_Tahun = t.Kd_Tahun");
		$this->db->join("Program p","pt.Kd_Program = p.Kd_Program");
		$this->db->join("Jenis j","pt.Kd_Jenis=j.Kd_Jenis");
			$this->db->where('pt.Status',1);
			if($tahun!=null)$this->db->where('pt.Kd_Tahun', $tahun);
			if($program!=null)$this->db->where('pt.Kd_Program', $program);
			if($jenis!=null)$this->db->where('pt.Kd_Jenis', $jenis);
		
        if($type=='total'){
			$hasil=$this->db->get('')->num_rows();
        }else{
			$hasil=$this->db->get ('',$this->limit, $this->offset)->result_array();
        }
        return $hasil;

    }

    function SPITSOrderByDesc($page,$rows,$type=null,$tahun=null,$program=null,$jenis=null){
        $offset = ($page-1)*$rows;
        $this->limit = $rows;
        $this->offset = $offset;
		
		$this->db->select("pt.Nomor,pt.Obyek,pt.Ruang_Lingkup,pt.Kd_Jenis,j.Nama_Jenis Jenis,pt.Waktu,pt.Tgl_Mulai,pt.Tgl_LHA,pt.Kd_Program,p.Nama_Program Program,pt.No_Tugas,pt.Dasar,pt.Periode_Audit,pt.Tgl_Selesai,pt.Tgl_Audit_Meeting,pt.Tgl_Ke_Direksi,pt.Tgl_Dari_Direksi,pt.Disposisi_Direksi,pt.Kd_Tahun,t.Tahun,pt.Tgl_Pembuaan,pt.Credit
		");
		$this->db->from("Program_Tahunan pt");
		$this->db->join("Tahun t","pt.Kd_Tahun = t.Kd_Tahun");
		$this->db->join("Program p","pt.Kd_Program = p.Kd_Program");
		$this->db->join("Jenis j","pt.Kd_Jenis=j.Kd_Jenis");
			$this->db->where('pt.Status',1);
			if($tahun!=null)$this->db->where('pt.Kd_Tahun', $tahun);
			if($program!=null)$this->db->where('pt.Kd_Program', $program);
			if($jenis!=null)$this->db->where('pt.Kd_Jenis', $jenis);
        if($type=='total'){
			$hasil=$this->db->get('')->num_rows();
        }else{
        	$this->db->order_by('Nomor', 'desc');
			$hasil=$this->db->get ('',$this->limit, $this->offset)->result_array();
        }
        return $hasil;

    }

    function ambilProgramBy($nomor){
		$this->db->select("Obyek,Ruang_Lingkup,Dasar,Periode_Audit,No_Tugas,Tgl_Mulai,Tgl_Selesai,Waktu");
		$this->db->from("Program_Tahunan");
		$this->db->where('Nomor', $nomor);
		return $this->db->get();
    }

    function daftarNomorTugas(){
		$this->db->select("Nomor,No_Tugas,Tgl_Mulai,Tgl_Selesai,Waktu,Obyek");
		$this->db->from("Program_Tahunan");
		$this->db->order_by('No_Tugas', 'desc');
		return $this->db->get();
    }
	
	function simpanProgTahunan($nomor,$program,$jenis,$tahun,$obyek,$ruang,$dasar,$credit){
		$data = array(
        	'Nomor' => $nomor,
        	'Kd_Tahun' => $tahun,
        	'Kd_Jenis' => $jenis,
        	'Kd_Program' => $program,
        	'Obyek' => $obyek,
        	'Ruang_Lingkup' => $ruang,
        	'Dasar' => $dasar,
        	'Status' => '1',
        	'No_Tugas' => $nomor,
        	'Credit' => $credit
		);

		$this->db->insert('Program_Tahunan', $data);
	}

	function updateSuratTugas($nomor,$periode,$tugas,$mulai,$selesai,$waktu){
		$data = array(
        	'No_Tugas' => $tugas,
        	'Tgl_Mulai' => $mulai,
        	'Tgl_Selesai' => $selesai,
        	'Periode_Audit' => $periode,
        	'Waktu' => $waktu
		);
		$this->db->where('Nomor', $nomor);
		$this->db->update('Program_Tahunan', $data);
	}

	function ubahProgTahunan($nomor,$obyek,$ruang,$dasar,$periode){
		$data = array(
        	'Obyek' => $obyek,
        	'Ruang_Lingkup' => $ruang,
        	'Dasar' => $dasar,
        	'Periode_Audit' => $periode
		);
		$this->db->where('Nomor', $nomor);
		$this->db->update('Program_Tahunan', $data);
	}

	function ubahSuratTugas($nomor,$periode){
		$data = array(
        	'Periode_Audit' => $periode
		);
		$this->db->where('Nomor', $nomor);
		$this->db->update('Program_Tahunan', $data);
	}

	function simpanAuditorProgram($nopkpt,$nomor,$jab){
		$data = array(
        	'No_PKPT' => $nopkpt,
        	'Nomor' => $nomor,
        	'Kd_Jab' => $jab
		);

		$this->db->insert('Auditor_Program_Tahunan', $data);
	}

	function simpanBagianProgram($nomor,$bag){
		$data = array(
        	'Nomor' => $nomor,
        	'Kd_Bag' => $bag
		);

		$this->db->insert('Detail_Bagian', $data);
	}

	function simpanSasaranProgram($nomor,$urut,$isi){
		$data = array(
        	'Nomor' => $nomor,
        	'Urut_Sasaran' => $urut,
        	'Isi_Sasaran' => $isi
		);

		$this->db->insert('Sasaran', $data);
	}

	function simpanTujuanProgram($nomor,$urut,$isi){
		$data = array(
        	'Nomor' => $nomor,
        	'Urut_Tujuan' => $urut,
        	'Isi_Tujuan' => $isi
		);

		$this->db->insert('Tujuan', $data);
	}
	function hapusProgramTahunan($nomor){
		$this->db->where('Nomor', $nomor);
		$this->db->delete('Program_Tahunan');
    }
}
?>