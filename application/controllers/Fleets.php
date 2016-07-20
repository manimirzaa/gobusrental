<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fleets extends CI_Controller 
      {
		  public function __construct()
				 {
				  parent::__construct();
				  $this->load->model('Fleets_model');
				 }
		/**********************************************/
		  public function add_new_fleet()
		         {
						$data['title'] = "Admin--New Fleet";
						$data['page'] = "fleet";
						$data['comps'] = $this->Fleets_model->get_all_companies();
						$this->load->view('admin/new_fleet',$data);
				 }
		/**********************************************/
		 public function add_fleet()
		        {
					$return=$this->Fleets_model->save_new_fleet($_POST);
					if($return)
					{
					$this->session->set_flashdata('success', 'Fleet Details saved successfully.');
					}
					else
					{
					$this->session->set_flashdata('error', 'Problem saving Fleet Details. Please try again.');
					}
					redirect('fleets/add_new_fleet', 'refresh');
				}
		/**********************************************/
		 public function manage_fleets()
		        {
					$data['title'] = "Admin--Manage Fleets";
				    $data['fleets']=$this->Fleets_model->get_all_fleets();
					echo "<pre>";
					print_r($data['fleets']);
					exit;
				    $this->load->view('admin/manage_fleets',$data);
				}
		/**********************************************/
		public function get_fleet_details()
		       {
				$rec=$this->Fleets_model->get_fleet_details($this->input->post('id'));
				echo json_encode(array('company_id'=>$rec->company_id,'quantity'=>$rec->quantity,'no_of_seat'=>$rec->no_of_seat,'manufacture_date'=>$rec->manufacture_date,'fleet_id'=>$rec->id,'bus_type'=>$rec->bus_type,'rstm'=>$rec->rstm,'cd'=>$rec->cd,'dvd'=>$rec->dvd,'stv'=>$rec->stv,'wifi'=>$rec->wifi,'pa'=>$rec->pa,'ada'=>$rec->ada,'alch'=>$rec->alch,'old_photo'=>$rec->photo));
				 exit;
			   }
		/**********************************************/
		 public function edit_fleet()
		        {
					$return=$this->Fleets_model->save_update_fleet($_POST);
					if($return)
					{
					$this->session->set_flashdata('success', 'Fleet Details Updated Successfully.');
					}
					else
					{
					$this->session->set_flashdata('error', 'Problem Updating Fleet Details. Please try again.');
					}
					if(isset($_POST['fleet_comp']))
					   {
					redirect('company/company_profile/'.$_POST['fleet_comp'], 'refresh');
					   }
					else
					   {
					redirect('fleets/fleet_details/'.$_POST['fleet_id'], 'refresh');
					   }
				}
			   
     }