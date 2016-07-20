<?php 
class Company_model extends CI_Model  
    {
		
/*******************************************************************************************/	
			function save_new_company($form_data)
	                 {
					  /***********************************************/
					  $logo_name="";
					 if(file_exists($_FILES['logo_img']['tmp_name']) || is_uploaded_file($_FILES['logo_img']['tmp_name']))
					   {
								
								$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/images/logos";
								//echo $config['upload_path']; exit;
								$config['allowed_types']        = 'gif|jpg|png';
								$config['max_size']             = 100;
								$config['max_width']            = 1024;
								$config['max_height']           = 768;
							//$this->load->library('upload', $config);
							$this->upload->initialize($config);
					        if(!$this->upload->do_upload('logo_img'))
						      {
								 $this->session->set_flashdata('error',$this->upload->display_errors());
								 redirect('company/add_new_company', 'refresh');
						      }
					      else
					          {
						     	 $upload_data = $this->upload->data(); 
							     $logo_name = $upload_data['file_name'];
						      }
						}
						/***********************************************/
						
						$owner_id;
					    if($form_data['onwer_id']!=="")
						  {
							  $owner_id=$form_data['onwer_id'];
						  }
						else
						  {
								$this->db->select('id');
								$this->db->from('users');
								$this->db->where('email',$form_data['email']);
								$owner_id=$this->db->get()->row()->id;
								if($owner_id=="")
								  {
										$user = array('first_name' => $form_data['comp_name'],
										'country' =>$form_data['country'],
										'State' =>$form_data['state'],
										'City' =>$form_data['city'],
										'status' => '1',
										'email'=>$form_data['email'],
										'password'=>'827ccb0eea8a706c4c34a16891f84e7b',
										'user_type' =>'2',
										'added_by' =>'1',
										'date_added' =>date('Y-m-d')
										);
										$this->db->insert('users', $user);
										$owner_id=$this->db->insert_id();
								  }
						  }
									$visa;
									if(isset($form_data['visa']))
									  {
										  $visa=$form_data['visa'];
									  }
									else
									  {
										  $visa="N";
									  }
						            $master_card;
									if(isset($form_data['master_card']))
									  {
										  $master_card=$form_data['master_card'];
									  }
									else
									  {
										  $master_card="N";
									  }
								    $american_express;
									if(isset($form_data['american_express']))
									  {
										  $american_express=$form_data['american_express'];
									  }
									else
									  {
										  $american_express="N";
									  }
									$discover;
									if(isset($form_data['discover']))
									  {
										  $discover=$form_data['discover'];
									  }
									else
									  {
										  $discover="N";
									  }
									$paypal;
									if(isset($form_data['paypal']))
									  {
										  $paypal=$form_data['paypal'];
									  }
									else
									  {
										  $paypal="N";
									  }
						$insert_data = array( 'company_name'=>$form_data['comp_name'],
						                      'logo'=>$logo_name,
						                      'country'=>$form_data['country'],
											  'state'=>$form_data['state'],
											  'city'=>$form_data['city'],
											  'street'=>$form_data['address'],
											  'zip'=>$form_data['zip_code'],
											  'company_phone'=>$form_data['comp_phone'],
											  'alt_phone'=>$form_data['comp_phone_alt'],
											  'email'=>$form_data['email'],
											  'website'=>$form_data['website'],
											  'area_of_service'=>$form_data['service_area'],
											  'association'=>$form_data['associat_1'],
											  'association2'=>$form_data['associat_2'],
											  'association1'=>$form_data['associat_3'],
											  'visa'=>$visa,
											  'master_card'=>$master_card,
											  'american_express' => $american_express,
											  'discover'=>$discover,
											  'paypal'=>$paypal,
											  'status'=>'1',
											  'owner_id'=>$owner_id,
											  'date_created'=>date('Y-m-d')
											 );
						$query=$this->db->insert('tbl_companies', $insert_data);
											if($query)
											  {
												return TRUE;
											  }
											else
											  {
											   return FALSE;
											  }
	                  }
/*******************************************************************************************/	
             function get_all_users()
				      {
						 $this->db->select('*');
						 $this->db->from('users');
						 $this->db->order_by("id", "asc");
						 $query = $this->db->get();
						 $result=$query->result();
						 return $result;
					  }
/*******************************************************************************************/	
             function get_all_companies()
			          {
						$this->db->select('*');
						$this->db->from('tbl_companies');
						$this->db->order_by("id", "asc");
						$query = $this->db->get();
						$result=$query->result();
						return $result;
					  }
/*******************************************************************************************/	
           function  get_company_details($company_id)
		             {
						 $this->db->select('*');
						 $this->db->from('tbl_companies');
						 $this->db->where("id",$company_id);
						 $query = $this->db->get();
						 $result = $query->row();
						 return $result;
					 }
/*******************************************************************************************/	
		  function get_company_buses($company_id)
		            {
						 $this->db->select('*');
						 $this->db->from('tbl_buses');
						 $this->db->where("company_id",$company_id);
						 $query = $this->db->get();
						 $result = $query->result();
						 return $result;
					}
/*******************************************************************************************/	
         function update_company($form_data)
		            {
					 $logo_name="";
					 if(file_exists($_FILES['logo_img']['tmp_name']) || is_uploaded_file($_FILES['logo_img']['tmp_name']))
					   {
								
								$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/images/logos";
								//echo $config['upload_path']; exit;
								$config['allowed_types']        = 'gif|jpg|png';
								$config['max_size']             = 100;
								$config['max_width']            = 1024;
								$config['max_height']           = 768;
							//$this->load->library('upload', $config);
							$this->upload->initialize($config);
					        if(!$this->upload->do_upload('logo_img'))
						      {
								 $this->session->set_flashdata('error',$this->upload->display_errors());
								 redirect('company/add_new_company', 'refresh');
						      }
					      else
					          {
						     	 $upload_data = $this->upload->data(); 
							     $logo_name = $upload_data['file_name'];
						      }
						}
				    else
					   {
						          $logo_name=$form_data['old_logo'];
					   }
						/***********************************************/						
							    //$owner_id=$form_data['onwer_id'];
						  		$visa;
									if(isset($form_data['visa']))
									  {
										  $visa=$form_data['visa'];
									  }
									else
									  {
										  $visa="N";
									  }
						            $master_card;
									if(isset($form_data['master_card']))
									  {
										  $master_card=$form_data['master_card'];
									  }
									else
									  {
										  $master_card="N";
									  }
								    $american_express;
									if(isset($form_data['american_express']))
									  {
										  $american_express=$form_data['american_express'];
									  }
									else
									  {
										  $american_express="N";
									  }
									$discover;
									if(isset($form_data['discover']))
									  {
										  $discover=$form_data['discover'];
									  }
									else
									  {
										  $discover="N";
									  }
									$paypal;
									if(isset($form_data['paypal']))
									  {
										  $paypal=$form_data['paypal'];
									  }
									else
									  {
										  $paypal="N";
									  }
						$rec_data = array('company_name'=>$form_data['comp_name'],
						                      'logo'=>$logo_name,
						                      'country'=>$form_data['country'],
											  'state'=>$form_data['state'],
											  'city'=>$form_data['city'],
											  'street'=>$form_data['address'],
											  'zip'=>$form_data['zip_code'],
											  'company_phone'=>$form_data['comp_phone'],
											  'alt_phone'=>$form_data['comp_phone_alt'],
											  'email'=>$form_data['email'],
											  'website'=>$form_data['website'],
											  'area_of_service'=>$form_data['service_area'],
											  'association'=>$form_data['associat_1'],
											  'association2'=>$form_data['associat_2'],
											  'association1'=>$form_data['associat_3'],
											  'visa'=>$visa,
											  'master_card'=>$master_card,
											  'american_express' => $american_express,
											  'discover'=>$discover,
											  'paypal'=>$paypal,
											  'owner_id'=>$form_data['onwer_id']
											 );

						                      $this->db->where('id', $form_data['comp_id']);
						                      $query=$this->db->update('tbl_companies', $rec_data);
												if($query)
												{
												return TRUE;
												}
												else
												{
												return FALSE;
												}
				    }
			/****************************************************************/
			function get_company_quotes($company_id)
			         {
						 //$company_id=$this->session->userdata('company_id');
						$this->db->select('tbl_quotes.*,tbl_buses.bus_type,tbl_companies.company_name');
						$this->db->from('tbl_quotes');
						$this->db->join('tbl_buses','tbl_buses.id=tbl_quotes.bus_id','left');
						$this->db->join('tbl_companies','tbl_companies.id=tbl_buses.company_id','left');
						$this->db->where('tbl_quotes.quote_stage>','1');
						$this->db->where('tbl_quotes.company_id', $company_id);
						$this->db->order_by('tbl_quotes.id', 'desc');
						$rec=$this->db->get();
						//echo"<pre>"; print_r($rec->result()); exit;
						return $rec->result();
					 }
    }
?>