<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

    public function __construct(){
    parent::__construct();
      $this->load->model('Admin_model');
    }

    function index(){

    	$this->load->view('login');

    	$jwt = new JWT();

    	$JwtSecretKey = "loginsecretcode";

    	$email=$this->input->post('email');
    	$password=$this->input->post('password');

    	$result = $this->Admin_model->check_login($email,$password);

    	if($result->num_rows()==1){

    	$token = $jwt->encode($result,$JwtSecretKey,'HS256');
        json_encode($token);
    	$this->load->view('ajaxsearch');

        }
    	
    
    }

	// function index()
	// {
	// 	$this->load->view('ajaxsearch');
	// }

	public function token(){

	}

	function fetchdata()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->ajaxsearch_model->fetch_data($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped" style="background-color:white;" width="100%" height="100%">
						<tr>
							<th>SName</th>
							<th>Current_Market_Price</th>
							<th>Market_cap</th>
							<th>Stock</th>
							<th>Dividend_yield</th>
							<th>ROCE_perc</th>
							<th>ROE_Previous_Annum</th>
							<th>Debt_to_equity</th>
							<th>EPS	</th>
							<th>Reserves</th>
							<th>Debt</th>

						</tr>';

		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->SName.'</td>
							<td>'.$row->Current_Market_Price.'</td>
							<td>'.$row->Market_cap.'</td>
							<td>'.$row->Stock.'</td>
							<td>'.$row->Dividend_yield.'</td>
							<td>'.$row->ROCE_perc.'</td>
							<td>'.$row->ROE_Previous_Annum.'</td>
							<td>'.$row->Debt_to_equity.'</td>
							<td>'.$row->EPS.'</td>
							<td>'.$row->Reserves.'</td>
							<td>'.$row->Debt.'</td>
                            

						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="11">No Data Found</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;
	}
	
}

