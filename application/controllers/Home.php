<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('User_model');
	}
	
	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/includes/carousel');
		$this->load->view('front/home_page');
	}
	
	public function update_comp()
	{
		$this->Home_model->update_comp();
	}
	
	public function ajax_state_cities()
	{
		$rec=$this->Home_model->get_state_cities($this->input->post('state_id'));
		echo json_encode($rec); exit;
	}
	
	public function ajax_state_county()
	{
		$rec=$this->Home_model->ajax_state_county($this->input->post('state_id'));
		echo json_encode($rec); exit;
	}
	
	public function search()
	{
		if($this->input->post())
		{
			$data['searched_parameters']=$this->input->post();
			$data['searched_data']=$this->Home_model->get_searched_results($this->input->post());
			$this->load->view('front/includes/header');
		    $this->load->view('front/search_result',$data);
		}
		else
		{
			$message='Please specifiy search parameters first';
			$status_code='404';
			show_error($message, $status_code, $heading = 'Information');
		}
	}
	
	public function get_a_quote()
	{
		if($this->input->post())
		{
			$data['travel_needs']=json_decode(htmlspecialchars_decode($this->input->post('travel_needs')));
			$data['bus_id']=$this->input->post('bus_id');
			$data['title']="Get A Quote";
			$data['company_bus_details']=$this->Home_model->get_bus_details($this->input->post('bus_id'));
			$this->load->view('front/get_a_quote',$data);
		}
		else
		{
			redirect('Home', 'refresh');
		}
	}
	
	public function quote_request()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('from', 'From', 'required');
			$this->form_validation->set_rules('to', 'To', 'required');
			$this->form_validation->set_rules('from_date', 'From_Date', 'required');
			$this->form_validation->set_rules('pick_up_time', 'Pick_Up_Time', 'required');
			$this->form_validation->set_rules('to_date', 'To_Date', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() == FALSE) 
			{
                $message='Please fill all required field first';
				$status_code='404';
				show_error($message, $status_code, $heading = 'Information');
            }
			else
			{
				$response=$this->Home_model->quote_request();
				if($response)
				{
					$this->session->set_flashdata('success', 'Quote request has been sent successfully. Please login to view quote status. If you are a new user please view your email id for login credentials.');
					$data['quote_request_details']=$this->Home_model->get_quote_request_details($response);
					$data['quote_multi_cities']=$this->Home_model->get_quote_multi_cities($response);
					$this->load->view('front/quote_request_status',$data);
				}
				else
				{
					$message='Something went wrong please try again';
					$status_code='404';
					show_error($message, $status_code, $heading = 'Information');
				}
			}
		}
		else
		{
			redirect('Home', 'refresh');
		}
	}
	
	public function get_permileage_cost()
	{
		$rec=$this->Home_model->get_permileage_cost($this->input->post('from_date'),$this->input->post('to_date'));
		//echo"<pre>"; print_r($rec);exit;
		echo json_encode(array('per_mile'=>$rec['per_mile'],'per_day'=>$rec['per_day'])); exit;
	}
	
	function test()
	{
		$this->load->view('front/test');
	}
	
	public function distance_calculator()
	{
		$data['title']="Distance Calculator";
		$this->load->view('front/distance_calculator',$data);
	}
	
	public function cost_calculator()
	{
		$data['title']="Cost Calculator";
		$this->load->view('front/cost_calculator',$data);
	}

}
