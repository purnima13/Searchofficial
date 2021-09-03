<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

    public function __construct(){
    parent::__construct();
      $this->load->model('Admin_model');
      $this->load->model('ajaxsearch_model');
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

    
     function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->ajaxsearch_model->search_title($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->SName;
                echo json_encode($arr_result);
            }
        }
    }


	
}

