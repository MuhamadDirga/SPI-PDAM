<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_temuanTS extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function ambilDaftarTemuanTS($page,$rows,$type=null,$nomor=null){
        $offset = ($page-1)*$rows;
        $this->limit = $rows;
        $this->offset = $offset;
		
		$this->db->select("Nomor,Urut,t.Kd_Bag,Nama_Bag,Isi");
		$this->db->from("Temuan t");
		$this->db->join('Bagian b', 't.Kd_Bag = b.Kd_Bag');
			if($nomor!=null)$this->db->where('Nomor', $nomor);
		
        if($type=='total'){
			$hasil=$this->db->get('')->num_rows();
        }else{
			$hasil=$this->db->get ('',$this->limit, $this->offset)->result_array();
        }
        return $hasil;

    }

    function ambilNoTugas(){
		$this->db->select("Nomor,No_Tugas");
		$this->db->from("Program_Tahunan");
		$this->db->order_by("No_Tugas");
		return $this->db->get();
    }

    function ambilTemuanAll(){
		$this->db->select("Nomor,Urut,t.Kd_Bag,Nama_Bag,Isi");
		$this->db->from("Temuan t");
		$this->db->join('Bagian b', 't.Kd_Bag = b.Kd_Bag');
		$this->db->order_by('Urut', 'asc');
		return $this->db->get();
    }

    function ambilTemuan($nomor){
		$this->db->select("Nomor,Urut,t.Kd_Bag,Nama_Bag,Isi");
		$this->db->from("Temuan t");
		$this->db->join('Bagian b', 't.Kd_Bag = b.Kd_Bag');
		$this->db->where('Nomor', $nomor);
		$this->db->order_by('Urut', 'asc');
		return $this->db->get();
    }

    function ambilBagianAll(){
		$this->db->select("Kd_Bag,Nama_Bag");
		$this->db->from("Bagian");
		return $this->db->get();
    }

    function ambilBagian($nomor){
		$this->db->select("de.Kd_Bag,Nama_Bag");
		$this->db->from("Program_Tahunan pt");
		$this->db->join('Detail_Bagian de', 'pt.Nomor = de.Nomor');
		$this->db->join('Bagian b', 'de.Kd_Bag = b.Kd_Bag');
		$this->db->where('No_Tugas', $nomor);
		return $this->db->get();
    }

	function updateLHA($nomor,$meeting,$lha){
		$data = array(
        	'Tgl_Audit_Meeting' => $meeting,
        	'Tgl_LHA' => $lha
		);
		$this->db->where('Nomor', $nomor);
		$this->db->update('Program_Tahunan', $data);
	}

	function simpanTemuan($nomor,$bag,$isi,$urut){
		$data = array(
        	'Nomor' => $nomor,
        	'Kd_Bag' => $bag,
        	'Isi' => $isi,
        	'Urut' => $urut
		);

		$this->db->insert('Temuan', $data);
	}

	function simpanFile($nomor,$nama,$lok,$ket){
		$data = array(
        	'Nomor' => $nomor,
        	'Nama_File' => $nama,
        	'Lok_File' => $lok,
        	'Keterangan' => $ket
		);

		$this->db->insert('[File]', $data);
	}

	function hapusTemuan($nomor){
		$this->db->where('Nomor', $nomor);
		$this->db->delete('Temuan');
    }

    function hapusFile($nomor){
		$this->db->where('Nomor', $nomor);
		$this->db->delete('[File]');
    }
}
?>