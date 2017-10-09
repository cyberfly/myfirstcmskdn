<?php 

class Report extends MY_Controller{


	public function attendance_report()
	{
		$articles = $this->article_model->article_info()->get_all();

		$data = array();

		$data['articles'] = $articles;

		$data['content'] = 'reports/pdf/attendance_report';

		$html_content = $this->load->view('templates/pdf_template', $data, true);

		$this->load->library('m_pdf');

		// set watermark

		$this->m_pdf->pdf->SetWatermarkImage('assets/images/logo-kdn.jpg');

		$this->m_pdf->pdf->showWatermarkImage = true;

		//set header footer

		$this->m_pdf->pdf->SetHeader('Attendance report|2017|{PAGENO}');

		$this->m_pdf->pdf->SetFooter('Attendance report|{PAGENO}');

		//generate the PDF

		$this->m_pdf->pdf->WriteHtml($html_content);

		//set pdf filepath

		$pdf_filepath = 'attendance_report.pdf';

		//download the PDF

		$this->m_pdf->pdf->Output($pdf_filepath, "D");

	}

	public function setLanguage()
	{
		$language = $this->input->post('language');

		//simpan language dalam session

		$this->session->set_userdata('user_language',$language);

		echo 'success';
	}


}



