<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_auditor extends CI_Model {
    function __construct(){
        parent::__construct();
    }
	function ambilAuditor(){
		$this->db->select("a.No_PKPT,a.NIP");
		$this->db->from("Auditor a");
		$this->db->order_by("a.No_PKPT");
		return $this->db->get();
    }

    function ambilKaryawan(){
		$this->db->select("k.NIP");
		$this->db->from("Karyawan k");
		return $this->db->get()->result_array();
    }

    function tambahAuditor($nopkpt, $nip){
		$data = array(
        	'No_PKPT' => $nopkpt,
        	'NIP' => $nip,
		);

		$this->db->insert('No_PKPT', $data);
    }
   
    function hapusAuditor($nopkpt){
		$this->db->where('No_PKPT', $nopkpt);
		$this->db->delete('NIP');
    }
}
?>