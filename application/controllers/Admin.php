<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
	
	public function index()
	{
		$this->_check_login();
		if($this->session->userdata('user_type')==1)
		{
			$data['title'] = "Dashboard";
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/sidebar');
			$this->load->view('admin/home_page');
		}
		elseif($this->session->userdata('user_type')==2)
		{
			$data['title'] = "Company -- Dashboard";
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/sidebar');
			$this->load->view('company/index');
		}
		else
		{
			$message='Under Construction...';
			$status_code='404';
			show_error($message, $status_code, $heading = 'Information');
		}
	}
	
	public function import_excel_file()
	{
		$this->Admin_model->import_excel_file();
	}
	
	public function login()
	{
		if($this->session->userdata('user_id'))
		{
			redirect('Admin');
		}
		else
		{
			if($this->input->post())
			{
				$password = md5($this->input->post('password'));
				$query = $this->Admin_model->authenticate_user($this->input->post('email'),$password);
				if($query->num_rows()==1)
				{
					$row = $query->row();
					$sessionData = array(
									'user_id' => $row->id,
									'user_email' => $row->email,
									'user_name' => $row->first_name." ".$row->last_name,
									'user_type' => $row->user_type,	
									'company_id' => $row->company_id	
								   );
					
					$this->session->set_userdata($sessionData);	
					
					//echo"<pre>"; print_r($this->session->all_userdata()); exit;				
					redirect('Admin', 'refresh');
				}
				else
				{
					$this->session->set_flashdata('error', 'Email or password is invalid. Please try again.');
					redirect('Admin/login');
				}
			}
			$this->load->view('login');
		}
	}
	
	/** User will logout through this function */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Admin/login');
	}
	
	public function forget_password()
	{
		if($this->input->post())
		{
			$return=$this->Admin_model->forget_password($this->input->post('email'));
			if($return==1)
			{
				$this->session->set_flashdata('success', 'Password has been changed successfully.Please check your email for new password.');
				redirect('Admin/login');
			}
			elseif($return==2)
			{
				$message='Some thing went wrong please try again';
				$status_code='404';
				show_error($message, $status_code, $heading = 'Information');
			}
			elseif($return==3)
			{
				$message='No email id found.Please try again';
				$status_code='404';
				show_error($message, $status_code, $heading = 'Information');
			}
		}
	}
	
	public function per_mile_costing()
	{
		$this->_check_login();
		$this->_check_access();
		$data['title']="Per Mile Costing";
		$data['per_mile_costing']=$this->Admin_model->per_mile_costing();
		$this->load->view('admin/per_mile_costing',$data);		
	}
	
	public function get_cost_details()
	{
		$rec=$this->Admin_model->get_cost_details($this->input->post('id'));
		echo json_encode(array('per_mile'=>$rec->per_mile,'start_date'=>$rec->start_date,'end_date'=>$rec->end_date,'cost_id'=>$rec->id)); exit;
	}
	
	public function add_per_mile_cost()
	{
		$this->_check_login();
		$this->_check_access();
		if($this->input->post())
		{
			$return=$this->Admin_model->add_per_mile_cost();
			if($return)
			{
				$this->session->set_flashdata('success', 'Cost details successfully added.');
				redirect('Admin/per_mile_costing');
			}
			else
			{
				$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
				redirect('Admin/per_mile_costing');
			}
		}
	}
	
	public function delete_per_mile_cost($id)
	{
		$this->_check_login();
		$this->_check_access();
		$return=$this->Admin_model->delete_per_mile_cost($id);
		if($return)
		{
			$this->session->set_flashdata('success', 'Successfully deleted.');
			redirect('Admin/per_mile_costing');
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			redirect('Admin/per_mile_costing');
		}
	}
	
	public function edit_per_mile_cost()
	{
		$this->_check_login();
		$this->_check_access();
		if($this->input->post())
		{
			$return=$this->Admin_model->edit_per_mile_cost();
			if($return)
			{
				$this->session->set_flashdata('success', 'Cost details successfully updated.');
				redirect('Admin/per_mile_costing');
			}
			else
			{
				$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
				redirect('Admin/per_mile_costing');
			}
		}
	}
	
	public function per_day_costing()
	{
		$this->_check_login();
		$this->_check_access();
		$data['title']="Per Day Costing";
		$data['per_day_costing']=$this->Admin_model->per_day_costing();
		$this->load->view('admin/per_day_costing',$data);	
	}
	
	public function get_day_cost_details()
	{
		$rec=$this->Admin_model->get_day_cost_details($this->input->post('id'));
		echo json_encode(array('per_day'=>$rec->per_day,'start_date'=>$rec->start_date,'end_date'=>$rec->end_date,'cost_id'=>$rec->id)); exit;
	}
	
	public function add_per_day_cost()
	{
		$this->_check_login();
		$this->_check_access();
		if($this->input->post())
		{
			$return=$this->Admin_model->add_per_day_cost();
			if($return)
			{
				$this->session->set_flashdata('success', 'Cost details successfully added.');
				redirect('Admin/per_day_costing');
			}
			else
			{
				$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
				redirect('Admin/per_day_costing');
			}
		}
	}
	
	public function delete_per_day_cost($id)
	{
		$this->_check_login();
		$this->_check_access();
		$return=$this->Admin_model->delete_per_day_cost($id);
		if($return)
		{
			$this->session->set_flashdata('success', 'Successfully deleted.');
			redirect('Admin/per_day_costing');
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			redirect('Admin/per_day_costing');
		}
	}
	
	public function edit_per_day_cost()
	{
		$this->_check_login();
		$this->_check_access();
		if($this->input->post())
		{
			$return=$this->Admin_model->edit_per_day_cost();
			if($return)
			{
				$this->session->set_flashdata('success', 'Cost details successfully updated.');
				redirect('Admin/per_day_costing');
			}
			else
			{
				$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
				redirect('Admin/per_day_costing');
			}
		}
	}
	
	public function change_status($id,$tbl_name,$status)
	{
		$this->_check_login();
		$this->_check_access();
		$return=$this->Admin_model->change_status($id,$tbl_name,$status);
		if($return)
		{
			$this->session->set_flashdata('success', 'Successfully updated.');
			if($tbl_name=="permileage")
			{
				redirect('Admin/per_mile_costing');
			}
			else
			{
			    redirect('Admin/per_day_costing');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Some thing went wrong.Please try again.');
			if($tbl_name=="permileage")
			{
				redirect('Admin/per_mile_costing');
			}
			else
			{
			    redirect('Admin/per_day_costing');
			}
		}
	}

}
