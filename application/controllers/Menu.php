<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function index(){
		$this->menuTree();
	}
	public function menuTree(){
		$rss = '
			[{
				"id":"1",
				"text":"Master",
				"children":[{
						"id":11,
						"text":"Jenis",
						"attributes":"ts/jenis_ts"
					},{
						"id":12,
						"text":"Tahun",
						"attributes":"ts/tahun_ts"
					},{
						"id":13,
						"text":"Auditor",
						"attributes":"ts/auditor_ts"
					},{
						"id":14,
						"text":"Bagian",
						"attributes":"ts/bagian_ts"
					}
					],
				"attributes":""
			},{
				"id":2,
				"text":"SPI",
				"attributes":"",
				"children":[{
						"id":21,
						"text":"Program Tahunan",
						"attributes":"ts/kelola_spi_ts"
					},{
						"id":22,
						"text":"Temuan",
						"attributes":"ts/temuan_ts"
					},{
						"id":23,
						"text":"Ekspedisi",
						"attributes":"ts/ekspedisi_ts"
					}]
			}]
		';
		echo $rss;
	}
}