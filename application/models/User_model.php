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
}