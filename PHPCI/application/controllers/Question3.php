<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question3 extends CI_Controller {
	
	public function index()
	{
		$this->load->view('question3_output');
	}
	public function inser_data()
	{
		$this->load->library('encryption');
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$data['first_name'] = $this->encrypt->encode($first_name);
		$data['last_name'] = $this->encrypt->encode($last_name);
		$this->load->model("common");
		$data = $this->common->inser_data($data);
		
	}
}
