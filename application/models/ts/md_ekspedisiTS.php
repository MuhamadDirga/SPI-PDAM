<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_ekspedisiTS extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function ambilDaftarEkspedisiTS($page,$rows,$type=null,$tahun=null){
        $offset = ($page-1)*$rows;
        $this->limit = $rows;
        $this->offset = $offset;
		
		$this->db->select("Nomor,No_Tugas,Tgl_Ke_Direksi,Tgl_Dari_Direksi,Disposisi_Direksi");
		$this->db->from("Program_Tahunan");
			if($tahun!=null)$this->db->where('Kd_Tahun', $tahun);
		
        if($type=='total'){
			$hasil=$this->db->get('')->num_rows();
        }else{
			$hasil=$this->db->get ('',$this->limit, $this->offset)->result_array();
        }
        return $hasil;

    }

    function ambilNoProgram(){
		$this->db->select("Nomor,No_Tugas");
		$this->db->from("Program_Tahunan");
		$this->db->order_by('Nomor', 'desc');
		return $this->db->get();
    }

	function updateEkspedisi($nomor,$ke,$dari,$disposisi){
		$data = array(
        	'Tgl_Ke_Direksi' => $ke,
        	'Tgl_Dari_Direksi' => $dari,
        	'Disposisi_Direksi' => $disposisi
		);

		$this->db->where('Nomor', $nomor);
		$this->db->update('Program_Tahunan', $data);
    }
}
?>