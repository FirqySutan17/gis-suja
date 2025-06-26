<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class GisKemitraan extends CI_Controller {
	var $menu_id 	= "";
	var $menu_id2 	= "";
	var $session_data = "";
	var $menu_ids = [];
	public function __Construct() {
		parent::__construct();
		$this->menu_id 		= 'GIS001';
		$this->menu_id2 	= 'GIS002';
		$this->menu_ids = ['GIS001', 'GIS002'];
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('sales');
		$this->load->library('upload');
	}

  public function index_kemitraan()
	{
		$filter = [
			"area"	=> "*"
		];

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$filter["area"] = $this->input->post('area');
		}

		$data['title'] = 'GIS KEMITRAAN SUJA';
		$data['user'] = $this->session_data['user'];
		$data['area']				= $this->getArea();
		$data['gisite'] = $this->datatable($filter); // perbaikan: kirim 2 parameter
		// dd($data['gisite']);
		$this->template->_v('kemitraan/index', $data);
	}

	public function create_kemitraan() {
		$data['title'] 				= 'GIS KEMITRAAN SUJA';
		$data['user']				= $this->session_data['user'];
		$data['area']				= $this->getArea();
		$data['farm']				= $this->getFarm(true);
		// $data['customer'] 			= $this->datatable_cust();

		$this->template->_v('kemitraan/create', $data);
	}

	public function save_kemitraan()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$this->load->helper('date');

			$now  = date('Y-m-d H:i:s');
			$user = $this->session_data['user']['EMPLOYEE_ID'];

			try {
				$data = [
					'FARM'     		=> $post['farm'],
					'PLAZMA'      => $post['plazma'],
					'FARM_NAME'   => $post['farm_name'],
					'POPULASI'  	=> $post['populasi'],
					'AREA'       	=> $post['area'],
					'UNIT'   			=> $post['unit'],
					'COORDINATE' 	=> $post['coordinate'],
					'ADDRESS'    	=> $post['address'],
					'LINK_GMAPS' 	=> $post['link_gmaps'],
				];

				$insert = $this->db->insert('GIS_KEMITRAAN', $data);

				if (!$insert) {
					throw new Exception("GAGAL MENYIMPAN DATA GIS KEMITRAAN");
				}

				$this->session->set_flashdata('success', 'DATA BERHASIL TERSIMPAN.');
				redirect('dashboard/gis/kemitraan');
			} catch (Exception $e) {
				log_message('error', $e->getMessage());
				$this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
				redirect('dashboard/gis/kemitraan');
			}
		}

		$this->session->set_flashdata('error', 'Akses tidak valid.');
		redirect('dashboard/gis/kemitraan');
	}

	public function delete_kemitraan($id)
	{
		// Terakhir hapus dari TB_PLAN
		$this->db->where('ID', $id);
		$this->db->delete('GIS_KEMITRAAN');

		$this->session->set_flashdata('success', 'DATA BERHASIL TERHAPUS.');
		redirect('dashboard/gis/kemitraan');
	}

	public function edit_kemitraan($id) {
		$data['title']       	= 'GIS KEMITRAAN SUJA';
		$data['user']        	= $this->session_data['user'];
		$data['area']					= $this->getArea();
		// $data['customer']    = $this->datatable_cust();

		// Ambil data TB_PLAN berdasarkan ACTIVITY_NO
		$this->db->where('ID', $id);
		$data['kemitraan'] = $this->db->get('GIS_KEMITRAAN')->row_array();

		$this->template->_v('kemitraan/edit', $data);
	}

	public function update_kemitraan()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$this->load->helper('date');

			$now  = date('Y-m-d H:i:s');
			$user = $this->session_data['user']['EMPLOYEE_ID'];

			try {
				if (empty($post['id'])) {
					throw new Exception("ID tidak ditemukan untuk update.");
				}

				$data = [
					'POPULASI'  	=> $post['populasi'],
					'AREA'       	=> $post['area'],
					'UNIT'   			=> $post['unit'],
					'COORDINATE' 	=> $post['coordinate'],
					'ADDRESS'    	=> $post['address'],
					'LINK_GMAPS' 	=> $post['link_gmaps'],
				];

				$this->db->where('ID', $post['id']);
				$update = $this->db->update('GIS_KEMITRAAN', $data);

				if (!$update) {
					throw new Exception("GAGAL MENGUPDATE DATA GIS KEMITRAAN");
				}

				$this->session->set_flashdata('success', 'DATA BERHASIL DIPERBARUI.');
				redirect('dashboard/gis/kemitraan');

			} catch (Exception $e) {
				log_message('error', $e->getMessage());
				$this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
				redirect('dashboard/gis/kemitraan');
			}
		}

		$this->session->set_flashdata('error', 'Akses tidak valid.');
		redirect('dashboard/gis/kemitraan');
	}

	private function datatable($filter)
	{
		$where = "";
		if ($filter['area'] != '*') {
			$area = $filter['area'];
			$where .= " AND A.AREA = $area";
		}
		$query = "
			SELECT
				A.*,
				B.PLAZMA_NAME
			FROM 
				GIS_KEMITRAAN A,
				TR_CD_PLAZMA B
			WHERE
				A.PLAZMA = B.PLAZMA
				$where
		";

		$main_data = $this->db->query($query)->result_array();

		return array_values($main_data);
	}

	private function getArea($key = "")
	{
		$list = [
			"JABAR"			=> "JAWA BARAT",
			"JATENG"		=> "JAWA TENGAH",
			"JATIM"			=> "JAWA TIMUR",
			"SUMATERA"	=> "SUMATERA"
		];

		if (!empty($key)) {
			return !empty($list[$key]) ? $list[$key] : "N/A";
		}

		return $list;
	}

	private function getFarmData($create = false)
	{
		$where = "";
		if ($create) {
			$where .= "AND A.PLAZMA NOT IN (SELECT FARM FROM GIS_KEMITRAAN)";
		}
		$query = "
			SELECT A.FARM, A.PLAZMA, A.FARM_NAME, A.FARM_ADDRESS, B.PLAZMA_NAME
			FROM 
					TR_CD_FARM A,
					TR_CD_PLAZMA B
			WHERE
					A.PLAZMA = B.PLAZMA
					$where
			ORDER BY A.FARM_NAME ASC
		";
		$data = $this->db->query($query)->get()->result_array();
		return $data;
	}

	private function cekLogin() 
	{
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		$menu_access = $this->menu_ids;
		$check_exist = array_intersect($menu_access, $user_access);
		// dd($check_exist);
		if (empty($check_exist) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}