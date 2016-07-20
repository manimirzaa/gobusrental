<?php 
class Admin_model extends CI_Model  
{
	public function session_check()
	{
		if(!$this->session->userdata('user_id'))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	public function authenticate_user($email,$password)
	{
		/*$query = $this->db->get_where("users", array('email' => $email, 'password' => $password, 'status' =>'1')); 
		return $query;*/
		$this->db->select('users.*,tbl_companies.id as company_id');
		$this->db->from('users');
		$this->db->join('tbl_companies','tbl_companies.owner_id=users.id','left');
		$this->db->where('users.email',$email);
		$this->db->where('users.password',$password);
		$this->db->where('users.status',1);
		$rec=$this->db->get();
		return $rec;
	}
	
	public function import_excel_file()
	{
		ini_set('max_execution_time', 800);
		$path=file_path.'/files/';
		$file='bus_fleets2.xls';
		$this->load->library('excel_reader');

		// Read the spreadsheet via a relative path to the document
		$this->excel_reader->read($path.$file);
		
		// Get the contents of the first worksheet
		$worksheet = $this->excel_reader->sheets[0];
		
		$numRows = $worksheet['numRows']; // ex: 14
		$numCols = $worksheet['numCols']; // ex: 4
		$cells = $worksheet['cells']; // the 1st row are usually the field's name
		//echo "<pre>";print_r($cells);echo "</pre>";exit;
		$company_name="";
		$c=0;
		foreach($cells as $key=>$val)
		{
			if($key!=1)
			{
				if(isset($val[22]))
				{
					$quantity=$val[22];
				}
				else
				{
					$quantity="";
				}
				if(isset($val[23]))
				{
					$no_of_seat=$val[23];
				}
				else
				{
					$no_of_seat="";
				}
				if(isset($val[24]))
				{
					$manufacture_date=$val[24];
				}
				else
				{
					$manufacture_date="";
				}
				if(isset($val[25]))
				{
					$bus_type=$val[25];
				}
				else
				{
					$bus_type="";
				}
				if(isset($val[26]))
				{
					$rstm=$val[26];
				}
				else
				{
					$rstm="";
				}
				if(isset($val[27]))
				{
					$cd=$val[27];
				}
				else
				{
					$cd="";
				}
				if(isset($val[28]))
				{
					$dvd=$val[28];
				}
				else
				{
					$dvd="";
				}
				if(isset($val[29]))
				{
					$stv=$val[29];
				}
				else
				{
					$stv="";
				}
				if(isset($val[30]))
				{
					$wifi=$val[30];
				}
				else
				{
					$wifi="";
				}
				if(isset($val[31]))
				{
					$pa=$val[31];
				}
				else
				{
					$pa="";
				}
				if(isset($val[32]))
				{
					$ada=$val[32];
				}
				else
				{
					$ada="";
				}
				if(isset($val[33]))
				{
					$alch=$val[33];
				}
				else
				{
					$alch="";
				}
				if(isset($val[2]))
				{
					$description=$val[2];
				}
				else
				{
					$description="";
				}
				if(isset($val[5]))
				{
					$state=$val[5];
				}
				else
				{
					$state="";
				}
				if(isset($val[6]))
				{
					$city=$val[6];
				}
				else
				{
					$city="";
				}
				if(isset($val[7]))
				{
					$street=$val[7];
				}
				else
				{
					$street="";
				}
				if(isset($val[8]))
				{
					$zip=$val[8];
				}
				else
				{
					$zip="";
				}
				if(isset($val[9]))
				{
					$company_phone=$val[9];
				}
				else
				{
					$company_phone="";
				}
				if(isset($val[10]))
				{
					$alt_phone=$val[10];
				}
				else
				{
					$alt_phone="";
				}
				if(isset($val[11]))
				{
					$email=$val[11];
				}
				else
				{
					$email="";
				}
				if(isset($val[12]))
				{
					$website=$val[12];
				}
				else
				{
					$website="";
				}
				if(isset($val[13]))
				{
					$area_of_service=$val[13];
				}
				else
				{
					$area_of_service="";
				}
				if(isset($val[14]))
				{
					$association=$val[14];
				}
				else
				{
					$association="";
				}
				if(isset($val[15]))
				{
					$association2=$val[15];
				}
				else
				{
					$association2="";
				}
				if(isset($val[16]))
				{
					$association1=$val[16];
				}
				else
				{
					$association1="";
				}
				if(isset($val[17]))
				{
					$visa=$val[17];
				}
				else
				{
					$visa="";
				}
				if(isset($val[18]))
				{
					$master_card=$val[18];
				}
				else
				{
					$master_card="";
				}
				if(isset($val[19]))
				{
					$american_express=$val[19];
				}
				else
				{
					$american_express="";
				}
				if(isset($val[20]))
				{
					$discover=$val[20];
				}
				else
				{
					$discover="";
				}
				if(isset($val[21]))
				{
					$paypal=$val[21];
				}
				else
				{
					$paypal="";
				}
				$company=$this->get_company_existance($val[1]);
				$company_data=$company->row();
				//echo"<pre>"; print_r($val); exit;
				if($company->num_rows()>0)
				{
					  $company_id=$company_data->id;
					  $user_id=$company_data->owner_id;
					  $bus = array('quantity' =>$quantity,
						 'no_of_seat' => $no_of_seat,
						 'manufacture_date' => $manufacture_date,
						 'bus_type' => $bus_type,
						 'company_id' => $company_id,
						 'rstm'=> $rstm,
						 'cd'=> $cd,
						 'dvd' => $dvd,
						 'stv' => $stv,
						 'wifi' => $wifi,
						 'pa' => $pa,
						 'ada' => $ada,
						 'alch' => $alch,
						 'added_by' => $user_id,
						 'status' => '1'
					   );
					 $this->db->insert('tbl_buses', $bus);
				}
				else
				{
					$user = array('first_name' => $val[1],
							   'country' => 'United States',
							   'State' => $state,
							   'City' => $city,
							   'status' => '1',
							   'email'=> $email,
							   'password'=>'827ccb0eea8a706c4c34a16891f84e7b',
							   'user_type' => '2',
							   'added_by' => '1',
							   'date_added' => date('Y-m-d')
							 );
					if($this->db->insert('users', $user))
					{
						$user_id=$this->db->insert_id();
						$add_company = array('company_name' => $val[1],
							   'description' => $description,
							   'country' => 'United States',
							   'State' => $state,
							   'City' => $city,
							   'street' => $street,
							   'zip' => $zip,
							   'company_phone'=> $company_phone,
							   'alt_phone'=> $alt_phone,
							   'email' => $email,
							   'website' => $website,
							   'area_of_service'=> $area_of_service,
							   'association'=> $association,
							   'association2'=> $association2,
							   'association1'=> $association1,
							   'visa'=> $visa,
							   'master_card'=> $master_card,
							   'american_express'=> $american_express,
							   'discover'=> $discover,
							   'paypal'=> $paypal,
							   'status'=>'1',
							   'owner_id'=>$user_id,
							   'date_created' => date('Y-m-d')
							 );
						if($this->db->insert('tbl_companies', $add_company))
						{
							$company_id=$this->db->insert_id();
							$bus = array('quantity' =>$quantity,
									 'no_of_seat' => $no_of_seat,
									 'manufacture_date' => $manufacture_date,
									 'bus_type' => $bus_type,
									 'company_id' => $company_id,
									 'rstm'=> $rstm,
									 'cd'=> $cd,
									 'dvd' => $dvd,
									 'stv' => $stv,
									 'wifi' => $wifi,
									 'pa' => $pa,
									 'ada' => $ada,
									 'alch' => $alch,
									 'added_by' => $user_id,
									 'status' => '1'
							       );
					        $this->db->insert('tbl_buses', $bus);
						}
					}
					
				}
			}
			
		}
	}
	function get_company_existance($name)
	{
		$this->db->select('tbl_companies.*');
		$this->db->from('tbl_companies');
		$this->db->where('company_name', $name);
		$rec=$this->db->get();
		return $rec;
	}
	function check_email_existance($email)
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$rec=$this->db->get();
		return $rec->num_rows();
	}
	function forget_password($email)
	{
		$email_existance=$this->check_email_existance($email);
		if($email_existance>0)
		{
			$rand_pas=rand(100000, 999999);
		    $rand_pas_md5=md5($rand_pas);
			$data=array('password'=>$rand_pas_md5);
			$this->db->where('email',$email);
			if($this->db->update('users',$data))
			{
				$message = '<b>Hi,</b><br><br>Password has been changed successfully.
				<br><br><b>New Password:</b> '.$rand_pas.'
				<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('no_reply@gobusrental.com', 'Gobusrental');
				$this->email->to($email); 
				$this->email->subject('Password Changed');
				$this->email->message($message );
				$this->email->send();
				return "1";
			}
			else
			{
				return "2";
			}
			
		}
		else
		{
			return "3";
		}
	}
	function per_mile_costing()
	{
		$this->db->select('permileage.*');
		$this->db->from('permileage');
		$rec=$this->db->get();
		return $rec->result();
	}
	function get_cost_details($id)
	{
		$this->db->select('permileage.*');
		$this->db->from('permileage');
		$this->db->where('id',$id);
		$rec=$this->db->get();
		return $rec->row();
	}
	function add_per_mile_cost()
	{
		$start_date=convertDate($this->input->post('start_date'));
		$end_date=convertDate($this->input->post('end_date'));
		$cost = array(
		                'per_mile' => $this->input->post('per_mile_cost'),
						'date'=>date('Y-m-d'),
		                'start_date' => $start_date,
						'end_date' => $end_date,
						'status'=>1
					 );
		$this->db->insert('permileage', $cost);
	    if($this->db->insert_id()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function delete_per_mile_cost($id)
	{
		$return=$this->db->delete('permileage', array('id' => $id));
		return $return;
	}
	function edit_per_mile_cost()
	{
		$start_date=convertDate($this->input->post('start_date'));
		$end_date=convertDate($this->input->post('end_date'));
		$cost = array(
		                'per_mile' => $this->input->post('per_mile_cost'),
						'date'=>date('Y-m-d'),
		                'start_date' => $start_date,
						'end_date' => $end_date
					 );
		$this->db->where('id', $this->input->post('cost_id'));
		if($this->db->update('permileage', $cost))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function per_day_costing()
	{
		$this->db->select('perday.*');
		$this->db->from('perday');
		$rec=$this->db->get();
		return $rec->result();
	}
	function get_day_cost_details($id)
	{
		$this->db->select('perday.*');
		$this->db->from('perday');
		$this->db->where('id',$id);
		$rec=$this->db->get();
		return $rec->row();
	}
	function add_per_day_cost()
	{
		$start_date=convertDate($this->input->post('start_date'));
		$end_date=convertDate($this->input->post('end_date'));
		$cost = array(
		                'per_day' => $this->input->post('per_day_cost'),
		                'start_date' => $start_date,
						'end_date' => $end_date,
						'added_at'=>date('Y-m-d H:i:s'),
						'status'=>1
					 );
		$this->db->insert('perday', $cost);
	    if($this->db->insert_id()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function delete_per_day_cost($id)
	{
		$return=$this->db->delete('perday', array('id' => $id));
		return $return;
	}
	function edit_per_day_cost()
	{
		$start_date=convertDate($this->input->post('start_date'));
		$end_date=convertDate($this->input->post('end_date'));
		$cost = array(
		                'per_day' => $this->input->post('per_day_cost'),
		                'start_date' => $start_date,
						'end_date' => $end_date,
						'added_at'=>date('Y-m-d H:i:s')
					 );
		$this->db->where('id', $this->input->post('cost_id'));
		if($this->db->update('perday', $cost))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function change_status($id,$tbl_name,$status)
	{
		
		$update_status = array(
		                'status' => $status
					 );
		$this->db->where('id', $id);
		if($this->db->update($tbl_name, $update_status))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function get_company_details($company_id)
	{
		$this->db->select('tbl_companies.*');
		$this->db->from('tbl_companies');
		$this->db->where('id',$company_id);
		$rec=$this->db->get();
		return $rec->row();
	}
}