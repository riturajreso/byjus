<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question2 extends CI_Controller {
	
	public function index()
	{
		$this->load->view('question2_output');
	}
	public function calculate()
	{
		$this->load->library('expression');
		$val = $_POST['input'];
		$result = $this->expression->calculate($val); // 30.4
		echo $result;exit();
	}
}
