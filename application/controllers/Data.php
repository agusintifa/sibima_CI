<?php

class Data extends CI_Controller {

	function tahun(){
		return array('Desember','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	}

	function bayar($pakai, $gol){
		if ($gol == "R") {
			if($pakai < 10){
				return 10000;
			} else {
				return $pakai*1000;
			}
		} else {
			return 0;
		}
	}

	public function index(){
		$data['data'] = $this->data_model->search();

		$this->load->view('templates/header');
		$this->load->view('cari', $data);
		$this->load->view('templates/footer');
	}

	public function baru(){
		$data['data'] = $this->data_model->new();
		$this->form_validation->set_rules('nama','Nama','required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			
			$in = $this->session->flashdata('in');
			if($in != 0){
				$this->load->view('buat_sukses');	
			}
			$this->load->view('baru',$data);
			$this->load->view('templates/footer');			
		} else {
			if($this->data_model->create($data['data']['terakhir']['no']+1)){
				$this->session->set_flashdata('in',1);
				redirect(base_url().'data/baru');
			};
		}
	}

	public function detail($no){

		$data['tahun'] = $this->tahun();
		$data['data'] = $this->data_model->get_data($no);

		$in = $this->session->flashdata('in');
		$this->load->view('templates/header');
		if($in != 0){
			$this->load->view('update_sukses');	
		}
		$this->load->view('detail', $data);
		$this->load->view('templates/footer');
	}

	public function update($no){
		$res = $this->data_model->update_data($no);
		$this->session->set_flashdata('in',$res);
		redirect(base_url().'data/detail/'.$no);
	}

	public function print($no){
		$bulan = $this->input->post('bulan');
		$data['data'] = $this->data_model->get_data($no);
		$data['akhir'] = $data['data'][$bulan];
		$data['awal'] = $data['data'][$bulan-1];
		$data['pakai'] = $data['akhir'] - $data['awal'];
		$data['bulan'] = $this->tahun()[$bulan];
		$data['bayar'] = $this->bayar($data['pakai'], $data['data']['gol']);
		//print_r($data['bulan']);
		//print_r($this->input->post('gol'));
		$this->load->view('print', $data);
	}

	public function excel(){
		$data['data'] = $this->data_model->search();
		$this->load->view('excel', $data);
		//redirect(base_url());	
	}

}
