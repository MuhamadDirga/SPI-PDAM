<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_printTS extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function getData($nomor){
		$this->db->select("Nomor,No_Tugas,Nama_Jenis,Obyek,Ruang_Lingkup,Periode_Audit,Tgl_Mulai,Tgl_Selesai,Waktu");
		$this->db->from("Program_Tahunan pt");
		$this->db->join('Jenis j', 'pt.Kd_Jenis = j.Kd_Jenis');
		$this->db->where('pt.Nomor', $nomor);
		$hasil=$this->db->get ('');
        return $hasil->result();
    }

    function getAuditor($nomor){
        $this->db->select("CONVERT(varchar,Nama_Karyawan,255) Nama,N_Jab");
        $this->db->from("Auditor_Program_Tahunan apt");
        $this->db->join('Auditor a', 'apt.No_PKPT = a.No_PKPT');
        $this->db->join('Karyawan k', 'a.NIP = k.NIP');
        $this->db->join('Jab j', 'apt.Kd_Jab = j.Kd_Jab');
        $this->db->where('apt.Nomor', $nomor);
        $this->db->order_by('apt.Kd_Jab', 'asc');
        $hasil=$this->db->get ('');
        return $hasil->result();
    }

    function getBagian($nomor){
        $this->db->select("Nama_Bag");
        $this->db->from("Detail_Bagian dtb");
        $this->db->join('Bagian b', 'dtb.Kd_Bag = b.Kd_Bag');
        $this->db->where('dtb.Nomor', $nomor);
        $this->db->order_by('dtb.Kd_Bag', 'asc');
        $hasil=$this->db->get ('');
        return $hasil->result();
    }

    function getSasaran($nomor){
        $this->db->select("Urut_Sasaran,Isi_Sasaran");
        $this->db->from("Sasaran");
        $this->db->where('Nomor', $nomor);
        $this->db->order_by('Urut_Sasaran', 'asc');
        $hasil=$this->db->get ('');
        return $hasil->result();
    }

    function getTujuan($nomor){
        $this->db->select("Urut_Tujuan,Isi_Tujuan");
        $this->db->from("Tujuan");
        $this->db->where('Nomor', $nomor);
        $this->db->order_by('Urut_Tujuan', 'asc');
        $hasil=$this->db->get ('');
        return $hasil->result();
    }
}
?>