<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_detail_bagian extends CI_Model {
    function __construct(){
        parent::__construct();
    }
	function ambilBagian($No_Tahunan){
		$this->db->select("dtb.Kd_Bag,b.Nama_Bag,dtb.Detail");
		$this->db->from("Detail_Bagian dtb");
		$this->db->join('Bagian b', 'dtb.Kd_Bag = b.Kd_Bag');
		$this->db->where('dtb.Nomor', strval($No_Tahunan));
		$this->db->order_by("b.Kd_Bag",'asc');
		return $this->db->get();
    }
}
?>