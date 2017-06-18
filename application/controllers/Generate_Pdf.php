<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate_Pdf extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Bacteria_model','bacteria');
	}

	public function index($id, $strain)
	{

		$data = [];
		$data['page_title'] = 'Data Strain '.$id; 

		$data['id'] = $id;
		$data['strain'] = $strain;

		$data['output'] = $this->bacteria->get_by_id($id, $strain);


		foreach ($data['output'] as $val) {
			if ( $val->canister == ''){

				$pdfFilePath = "data_Freeze.pdf";

				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetTitle('Data strain');

    $pdf->WriteHTML($this->load->view('view_strain_utk_Freeze_pdf', $data, true)); // write the HTML into the PDF
    $pdf->Output($pdfFilePath, 'D'); // save to file because we can


}else if( $val->Row == ''){

	$pdfFilePath = "data_Cryo.pdf";

	$this->load->library('pdf');
	$pdf = $this->pdf->load();
	$pdf->SetTitle('Data strain');

    $pdf->WriteHTML($this->load->view('view_strain_utk_Cryo_pdf', $data, true)); // write the HTML into the PDF
    $pdf->debug = true; 

    $pdf->Output($pdfFilePath, 'D'); // save to file because we can



}
}


}


public function ixndex()
{
	$header = '
	<!--mpdf
	<htmlpageheader name="letterheader">
	<table width="100%" style=" font-family: sans-serif;"><tr>
	<td width="50%" style="color:#0000BB; "><span style="font-weight: bold; font-size: 14pt;">Acme Trading Co.</span><br />123 Anystreet<br />Your City<br />GD12 4LP<br /><span style="font-size: 15pt;">☎</span> 01777 123 567</td>
	<td width="50%" style="text-align: right; vertical-align: top;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
	</tr></table>
	<div style="margin-top: 1cm; text-align: right; font-family: sans-serif;">{DATE jS F Y}</div>
	</htmlpageheader>

	<htmlpagefooter name="letterfooter2">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; font-family: sans-serif; ">
	Page {PAGENO} of {nbpg}
	</div>
	</htmlpagefooter>

	mpdf-->

	<style>
	@page {
		margin-top: 2.5cm;
		margin-bottom: 2.5cm;
		margin-left: 2cm;
		margin-right: 2cm;
		footer: html_letterfooter2;
		background-color: pink;
	}

	@page :first {
		margin-top: 8cm;
		margin-bottom: 4cm;
		header: html_letterheader;
		footer: _blank;
		resetpagenum: 1; 
		background-color: yellow;
	}
	@page letterhead :first {
		margin-top: 8cm;
		margin-bottom: 4cm;  
		header: html_letterheader;
		footer: _blank;
		resetpagenum: 1; 
		background-color: lightblue;
	}
	.letter {     
		page-break-before: always; 
		page: letterhead;
	}
	</style>
	';

	$firstletter = '<div>Dear Sir or Madam,<br />
	Contents of your letter...
	<pagebreak />
	... more letter on page 2 ...
	<pagebreak />
	... more letter on page 3 ...
	</div>
	';

	$letter = '<div class="letter">Dear Sir or Madam,<br />
	Contents of your letter...
	<pagebreak />
	... more letter on page 2 ...
	<pagebreak />
	... more letter on page 3 ...
	</div>
	';
	$pdfFilePath = "output_pdf_name.pdf";

	$this->load->library('pdf');
	$mpdf = $this->pdf->load();
	$mpdf->WriteHTML($header);

	$mpdf->WriteHTML($firstletter);
	$mpdf->WriteHTML($letter);
	$mpdf->WriteHTML($letter);

    $mpdf->Output($pdfFilePath, 'D'); // save to file because we can	
}
}


