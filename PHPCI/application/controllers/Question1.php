<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question1 extends CI_Controller {
	
	public function __construct() { 
			parent::__construct(); 
			$this->load->library('excel');
        }
 
	public function index()
	{
		$this->load->model("common");
		$data = $this->common->getLinkData();
		$finaArray = array();
		foreach ($data as $key => $value) {
			$timeout = 10;
			$ch = curl_init();
			curl_setopt ( $ch, CURLOPT_URL, $value['c_url'] );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
			$http_respond = curl_exec($ch);
			$http_respond = trim( strip_tags( $http_respond ) );
			$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
			if($http_code==200)
			{
				$finaArray[$key]['c_name'] = $value['c_name']; 
				$finaArray[$key]['c_url'] = $value['c_url']; 
			}
		}
		$data['link'] = $finaArray;
		$this->load->view('question1_output',$data);
	}

	public function action()
	{
		$this->excel->setActiveSheetIndex(0);
		$tab_col = array("College Name","College URL");
		$col = 0;
		foreach ($tab_col as $key => $value) {
			$this->excel->getActiveSheet()->setCellValuebyColumnAndRow($col,1,$value);
			$col++;
		}
		$this->load->model("common");
		$this->load->helper('url');
		$data = $this->common->getLinkData();
		$finaArray = array();
		foreach ($data as $key => $value) {
			$timeout = 10;
			$ch = curl_init();
			curl_setopt ( $ch, CURLOPT_URL, $value['c_url'] );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
			$http_respond = curl_exec($ch);
			$http_respond = trim( strip_tags( $http_respond ) );
			$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
			if($http_code==200)
			{
				$finaArray[$key]['c_name'] = $value['c_name']; 
				$finaArray[$key]['c_url'] = $value['c_url']; 
			}
		}
		$excel_row = 2;
	    /*foreach($finaArray as $row)
		  {
		   $this->excel->getActiveSheet()->setCellValue('A'.$excel_row, $row['c_name']);
		   $this->excel->getActiveSheet()->setCellValue('B'.$excel_row, $row['c_url']);
		   $excel_row++;
		  }*/
		  $filename='PHPExcelDemo.xls'; //save our workbook as this file name
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); 
			header('Cache-Control: max-age=0'); //no cache
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 fzormat
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');
	}
}
