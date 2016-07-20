<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller 
{
		public   function __construct()
				 {
				  parent::__construct();
				  $this->load->model('Company_model');
				 }
/*************************************************************/	
		public  function add_new_company()
				{
				$data['title'] = "Admin--New Company";
				$data['page'] = "Company";
				$data['users'] = $this->Company_model->get_all_users();
				$this->load->view('admin/new_company',$data);
				}
/*************************************************************/	
	   public function register_company()
				{
				$return=$this->Company_model->save_new_company($_POST);
				if($return)
				{
				$this->session->set_flashdata('success', 'Company saved successfully.');
				}
				else
				{
				$this->session->set_flashdata('error', 'Problem saving Company. Please try again.');
				}
				redirect('company/add_new_company', 'refresh');
				}
/*************************************************************/	
      public function manage_companies()
	           {
				$data['title'] = "Admin--Manage Companies";
				$data['companies']=$this->Company_model->get_all_companies();
				$this->load->view('admin/manage_companies',$data);
			   }
/*************************************************************/	
     public function company_profile($company_id = NULL)
	          {
				  $this->load->model('Fleets_model');
				  $data['title'] = "Admin--Company Profile";
				  $data['users'] = $this->Company_model->get_all_users();
				  $data['comp_details']=$this->Company_model->get_company_details($company_id);
				  $data['quotes']=$this->Company_model->get_company_quotes($company_id);

				  $data['company_buses']=$this->Company_model->get_company_buses($company_id);
				  $data['comps'] = $this->Fleets_model->get_all_companies();
				  //echo"<pre>"; print_r($data['quotes']); exit;
				  $this->load->view('admin/company_profile',$data);
			  }
/*************************************************************/	
    public function edit_company()
	        {
				$return=$this->Company_model->update_company($_POST);
				if($return)
				{
				$this->session->set_flashdata('success', 'Company Updated.');
				}
				else
				{
				$this->session->set_flashdata('error', 'Problem updating company. Please try again.');
				}
				redirect('company/company_profile/'.$_POST['comp_id'], 'refresh');
		    }
/*************************************************************/	
}
