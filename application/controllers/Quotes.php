<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Quotes_model');
		$this->load->model('Home_model');
		$this->load->model('User_model');
		$this->load->model('Notification_model');
		$this->load->model('Admin_model');
	}
	
	/** This function checks if the user session is active or not, if not redirect to login page */
	function _check_login() 
	{
		if(!$this->session->userdata('user_id'))
		{
			$this->session->set_flashdata('error', 'Please login first');
			redirect('Admin/login', 'refresh');
		}
	}
	
	function _check_access() 
	{
		if($this->session->userdata('user_type')==1)
		{
		}
		else
		{
			$this->session->set_flashdata('error', 'Access denied');
			redirect('Admin', 'refresh');
		}
	}
	
	function _check_company_access() 
	{
		if($this->session->userdata('user_type')==1 || $this->session->userdata('user_type')==2)
		{
		}
		else
		{
			$this->session->set_flashdata('error', 'Access denied');
			redirect('Admin', 'refresh');
		}
	}
	
	public function all_quotes()
	{
		$this->_check_login();
		$user_type=$this->session->userdata('user_type');
		$data['title']="All Quotes";
		if($user_type==1)
		{
		    $data['all_quotes']=$this->Quotes_model->all_quotes();
		}
		if($user_type==2)
		{
		    $data['all_quotes']=$this->Quotes_model->company_all_quotes();
		}
		$this->load->view('quotes/all_quotes',$data);
	}
	
	public function get_quote_details()
	{
		$this->_check_login();
		$qt_details=$this->Quotes_model->get_quote_details($this->input->post('id'));
		echo json_encode($qt_details); exit;
	}
	
	public function quote_forward_to_company($quote_id)
	{
		$this->_check_login();
		$this->_check_access();
		$return=$this->Quotes_model->quote_forward_to_company($quote_id);
		if($return)
		{
			$this->session->set_flashdata('success', 'Quote successfully forwarded to comapny.');
			redirect('Quotes/all_quotes');
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			redirect('Quotes/all_quotes');
		}
	}
	
	public function quote_reject($quote_id)
	{
		$this->_check_login();
		$this->_check_access();
		$return=$this->Quotes_model->quote_reject($quote_id);
		if($return)
		{
			$this->session->set_flashdata('success', 'Quote rejected successfully.');
			redirect('Quotes/all_quotes');
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			redirect('Quotes/all_quotes');
		}
	}
	
	public function quote_reject_by_company($quote_id)
	{
		$this->_check_login();
		$this->_check_company_access();
		$return=$this->Quotes_model->quote_reject_by_company($quote_id);
		if($return)
		{
			$this->session->set_flashdata('success', 'Quote rejected successfully.');
			redirect('Quotes/all_quotes');
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			redirect('Quotes/all_quotes');
		}
	}
	
	public function make_proposal($quote_id)
	{
		$this->_check_login();
		$this->_check_company_access();
		$data['title']="Make Proposal";
		$check=$this->Quotes_model->make_proposal_pre_check($quote_id);
		$data['quote']=$this->Quotes_model->get_quote_data($quote_id);
		$data['multi_locations']=$this->Home_model->get_quote_multi_cities($quote_id);
		$this->load->view('quotes/make_proposal',$data);
	}
	
	public function add_proposal()
	{
		$this->_check_login();
		if($this->input->post())
		{
			$this->form_validation->set_rules('trip_cost', 'trip_cost', 'required');
			$this->form_validation->set_rules('deposit_amount_percentage', 'deposit_amount_percentage', 'required');
			$this->form_validation->set_rules('deposit_amount', 'deposit_amount', 'required');
			$this->form_validation->set_rules('deposit_amount_due_date', 'deposit_amount_due_date', 'required');
			$this->form_validation->set_rules('final_payment', 'final_payment', 'required');
			$this->form_validation->set_rules('final_payment_due_date', 'final_payment_due_date', 'required');
			if ($this->form_validation->run() == FALSE) 
			{
                $message='Please fill all required field first';
				$status_code='404';
				show_error($message, $status_code, $heading = 'Information');
            }
			else
			{
				$response=$this->Quotes_model->add_proposal();
				if($response)
				{
					$this->session->set_flashdata('success', 'Proposal successfully sent.');
					redirect('Quotes/all_quotes');
				}
				else
				{
					$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
					redirect('Quotes/all_quotes');
				}
			}
		}
	}
	
	public function quote_proposal($quote_id)
	{
		$this->_check_login();
		$this->_check_company_access();
		$data['title']="Quote Proposals";
		$data['quote']=$this->Quotes_model->get_quote_data($quote_id);
		$data['multi_locations']=$this->Home_model->get_quote_multi_cities($quote_id);
		$data['quote_proposals']=$this->Quotes_model->quote_proposal($quote_id);
		$this->load->view('quotes/quote_proposal',$data);
	}
	
	public function get_proposal_details()
	{
		$this->_check_login();
		$proposal_details=$this->Quotes_model->get_proposal_details($this->input->post('id'));
		echo json_encode($proposal_details); exit;
	}
	
	public function proposal_reject_by_admin($id,$quote_id)
	{
		$this->_check_login();
		$this->_check_access();
		$return=$this->Quotes_model->proposal_reject_by_admin($id,$quote_id);
		if($return)
		{
			$this->session->set_flashdata('success', 'Proposal rejected successfully.');
			redirect('Quotes/quote_proposal/'.$quote_id);
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			redirect('Quotes/quote_proposal'.$quote_id);
		}
	}
	
	public function proposal_admin_pricing()
	{
		$this->_check_login();
		$this->_check_access();
		$rec=$this->Quotes_model->proposal_admin_pricing();
		if($rec)
		{
			$msg=1;
		}
		else
		{
			$msg=2;
		}
		echo json_encode($msg); exit;
	}
	
	public function proposal_forward_to_user($proposal_id,$quote_id)
	{
		$this->_check_login();
		$this->_check_access();
		$return=$this->Quotes_model->proposal_forward_to_user($proposal_id,$quote_id);
		if($return)
		{
			$this->session->set_flashdata('success', 'Proposal forwarded to user successfully.');
			redirect('Quotes/quote_proposal/'.$quote_id);
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			redirect('Quotes/quote_proposal'.$quote_id);
		}
	}

}
