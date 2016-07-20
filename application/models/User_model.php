<?php 
class User_model extends CI_Model  
{
	function is_user_email_already_exists($email)
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$rec=$this->db->get();
		return $rec;
	}
	function add_user($form_data)
	{
		$rand_pas=rand(100000, 999999);
		$rand_pas_md5=md5($rand_pas);
		$user = array('first_name' => $form_data['first_name'],
		                       'last_name' => $form_data['last_name'],
							   'country' => 'United States',
							   'status' => '1',
							   'email'=> $form_data['email'],
							   'password'=>$rand_pas_md5,
							   'mobile_no'=>$form_data['p_number'],
							   'phone_no'=>$form_data['o_number'],
							   'organization'=>$form_data['company'],
							   'user_type' => '3',
							   'added_by' => '1',
							   'date_added' => date('Y-m-d')
							 );
	    if($this->db->insert('users', $user))
		{
			$message = '<b>Hi,</b><br><br>Your account has been created. Details are: <br><br> <b>Email:</b> '.$form_data['email'].'<br><br><b>Password:</b> '.$rand_pas.'<br><br><b>Login Link:</b>http://www.gobusrental.com<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('no_reply@gobusrental.com', 'Gobusrental');
			$this->email->to($form_data['email']); 
			$this->email->subject('Account Created');
			$this->email->message($message );
			$this->email->send();
			return $this->db->insert_id();
		}
		else
		{
			$message='Something went wrong plese try again';
			$status_code='404';
			show_error($message, $status_code, $heading = 'Information');
		}
	}
	function get_user_details($user_id)
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('id',$user_id);
		$rec=$this->db->get();
		return $rec->row();
	}
/***************************************************/
   function save_new_user($form_data)
    {
				$picture="";
				if(file_exists($_FILES['profil_picture']['tmp_name']) || is_uploaded_file($_FILES['profil_picture']['tmp_name']))
				{
				
				$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/images/profile_pics";
				//echo $config['upload_path']; exit;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['encrypt_name'] = TRUE;
				//$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('profil_picture'))
				{
				$this->session->set_flashdata('error',$this->upload->display_errors());
				redirect('user/add_new_user', 'refresh');
				}
				else
				{
				$upload_data = $this->upload->data(); 
				$picture = $upload_data['file_name'];
				}
				}
		
				$rand_pas=$form_data['password'];
				$rand_pas_md5=md5($rand_pas);
		$user = array(
		        'first_name' => $form_data['first_name'],
				'last_name' => $form_data['last_name'],
				'middle_name' => $form_data['middle_name'],
				'country' =>$form_data['country'],
				'state' =>$form_data['state'],
				'city' =>$form_data['city'],
				'address' =>$form_data['address'],
				'status' => '1',
				'email'=> $form_data['email'],
				'password'=>$rand_pas_md5,
				'mobile_no'=>$form_data['mobile_no'],
				'phone_no'=>$form_data['phone_no'],
				'fax'=>$form_data['fax'],
				'picture'=>$picture,
				'emergency_contact_no'=>$form_data['emergency_contact_no'],
				'organization'=>$form_data['organization'],
				'user_type' => '3',
				'added_by' => $this->session->userdata('user_id'),
				'date_added' => date('Y-m-d')
				);
				if($this->db->insert('users', $user))
				{
					return TRUE;
			/*	$message = '<b>Hi,</b><br><br>Your account has been created. Details are: <br><br> <b>Email:</b> '.$form_data['email'].'<br><br><b>Password:</b> '.$rand_pas.'<br><br><b>Login Link:</b>http://www.gobusrental.com<br><br><b><br><b>Regards,</b><br><br> Gobusrental';

				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('no_reply@gobusrental.com', 'Gobusrental');
				$this->email->to($form_data['email']); 
				$this->email->subject('Account Created');
				$this->email->message($message );
				$this->email->send();
				return $this->db->insert_id();*/
				}
				else
				{
					return FALSE;
				/*$message='Something went wrong plese try again';
				$status_code='404';
				show_error($message, $status_code, $heading = 'Information');*/
				}

	}
	/****************************************************/
	function get_all_users()
	         {
				         $this->db->select('*');
						 $this->db->from('users');
						 $this->db->where('user_type',3);
						 $this->db->order_by("id", "asc");
						 $query = $this->db->get();
						 $result=$query->result();
						 return $result;
			 }
	/*******************************************************/
	function update_user($form_data)
	         {
				$picture="";
				if(file_exists($_FILES['profil_picture']['tmp_name']) || is_uploaded_file($_FILES['profil_picture']['tmp_name']))
				{
				
				$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/images/profile_pics";
				//echo $config['upload_path']; exit;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['encrypt_name'] = TRUE;
				//$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('profil_picture'))
				{
				$this->session->set_flashdata('error',$this->upload->display_errors());
				redirect('user/add_new_user', 'refresh');
				}
				else
				{
				$upload_data = $this->upload->data(); 
				$picture = $upload_data['file_name'];
				}
				}
				else
				{
					 $picture = $form_data['old_pic'];
				}
		
				//$rand_pas=$form_data['password'];
				//$rand_pas_md5=md5($rand_pas);
		$user = array(
		        'first_name' => $form_data['first_name'],
				'last_name' => $form_data['last_name'],
				'middle_name' => $form_data['middle_name'],
				'country' =>$form_data['country'],
				'state' =>$form_data['state'],
				'city' =>$form_data['city'],
				'address' =>$form_data['address'],
				'status' => '1',
				'email'=> $form_data['email'],
				'mobile_no'=>$form_data['mobile_no'],
				'phone_no'=>$form_data['phone_no'],
				'fax'=>$form_data['fax'],
				'picture'=>$picture,
				'emergency_contact_no'=>$form_data['emergency_contact_no'],
				'organization'=>$form_data['organization'],
				'user_type' => '3',
				'added_by' => $this->session->userdata('user_id'),
				'date_added' => date('Y-m-d')
				);
				$this->db->where('id', $form_data['user_id']);
				$query=$this->db->update('users', $user);
				if($query)
				  {
					return TRUE;
				  }
				else
				  {
					return FALSE;
				  }
			 }
	/*******************************************************/
	  function get_user_quotes($user_id)
	             {
					    $this->db->select('tbl_quotes.*,tbl_buses.bus_type,tbl_companies.company_name');
						$this->db->from('tbl_quotes');
						$this->db->join('tbl_buses','tbl_buses.id=tbl_quotes.bus_id','left');
						$this->db->join('tbl_companies','tbl_companies.id=tbl_buses.company_id','left');
						//$this->db->where('tbl_quotes.quote_stage>','1');
						$this->db->where('tbl_quotes.user_id', $user_id);
						$this->db->order_by('tbl_quotes.id', 'desc');
						$rec=$this->db->get();
						//echo"<pre>"; print_r($rec->result()); exit;
						return $rec->result();
				 }
}