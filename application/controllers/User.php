<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public   function __construct()
				 {
				  parent::__construct();
				  $this->load->model('User_model');
				 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	       {
		//$this->load->view('front/includes/header');
		     redirect('user/login', 'refresh');
		     $this->load->view('front/includes/footer');
	       }
	/********************************************************/
	public function login()
	       {
		      //$this->load->view('admin/includes/header');
		       $this->load->view('login');
		      //$this->load->view('admin/includes/footer');
	       }
	/********************************************************/
	public function add_new_user()
	       {
			  $data['title'] = "Admin--New User";
			  $this->load->view('admin/new_user',$data);
		   }
	/********************************************************/
	public function register_user()
	       {
			  
			    $return=$this->User_model->save_new_user($_POST);
				if($return)
				{
				$this->session->set_flashdata('success', 'User saved successfully.');
				}
				else
				{
				$this->session->set_flashdata('error', 'Problem saving User. Please try again.');
				}
				redirect('user/add_new_user', 'refresh');
		   }
	/********************************************************/
	 public function manage_users()
	        {
				$data['title'] = "Admin--Manage Users";
				$data['users']=$this->User_model->get_all_users();
				$this->load->view('admin/manage_users',$data);
			}
	/***************************************************************/
	 public function user_profile($user_id = NULL)
	        {
				 
				  $data['title'] = "Admin--User Profile";
				  $data['user_details']=$this->User_model->get_user_details($user_id);
				  $data['quotes']=$this->User_model->get_user_quotes($user_id);

				  //echo"<pre>"; print_r($data['quotes']); exit;
				  $this->load->view('admin/user_profile',$data);
			}
	/***************************************************************/
	  public function edit_user()
	         {
				$return=$this->User_model->update_user($_POST);
				if($return)
				{
				$this->session->set_flashdata('success', 'User Details Updated.');
				}
				else
				{
				$this->session->set_flashdata('error', 'Problem updating User Details. Please try again.');
				}
				redirect('user/user_profile/'.$_POST['user_id'], 'refresh');
			 }
}
