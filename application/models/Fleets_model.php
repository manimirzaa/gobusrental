<?php 
class Fleets_model extends CI_Model  
    {
		function get_all_companies()
		         {
					    $this->db->select('id,company_name');
						$this->db->from('tbl_companies');
						$this->db->order_by("id", "asc");
						$query = $this->db->get();
						$result=$query->result();
						return $result;
				 }
		/**********************************************/
		function save_new_fleet($form_data)
		         { 
				     $photo_name="";
					 if(file_exists($_FILES['photo']['tmp_name']) || is_uploaded_file($_FILES['photo']['tmp_name']))
					   {
								
								$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/images/buses";
								//echo $config['upload_path']; exit;
								$config['allowed_types']        = 'gif|jpg|png';
								$config['max_size']             = 100;
								$config['max_width']            = 1024;
								$config['max_height']           = 768;
								$config['encrypt_name'] = TRUE;
							//$this->load->library('upload', $config);
							$this->upload->initialize($config);
					        if(!$this->upload->do_upload('photo'))
						      {
								 $this->session->set_flashdata('error',$this->upload->display_errors());
								 redirect('fleets/add_new_fleet', 'refresh');
						      }
					      else
					          {
						     	 $upload_data = $this->upload->data(); 
							     $photo_name = $upload_data['file_name'];
						      }
						}
						/***********************************************/						
							    //$owner_id=$form_data['onwer_id'];
						  		    $rstm;
									if(isset($form_data['rstm']))
									  {
										  $rstm=$form_data['rstm'];
									  }
									else
									  {
										  $rstm="";
									  }
						            $cd;
									if(isset($form_data['cd']))
									  {
										  $cd=$form_data['cd'];
									  }
									else
									  {
										  $cd="";
									  }
								    $dvd;
									if(isset($form_data['dvd']))
									  {
										  $dvd=$form_data['dvd'];
									  }
									else
									  {
										  $dvd="";
									  }
									$stv;
									if(isset($form_data['stv']))
									  {
										  $stv=$form_data['stv'];
									  }
									else
									  {
										  $stv="";
									  }
									$wifi;
									if(isset($form_data['wifi']))
									  {
										  $wifi=$form_data['wifi'];
									  }
									else
									  {
										  $wifi="";
									  }
									$pa;
									if(isset($form_data['pa']))
									  {
										  $pa=$form_data['pa'];
									  }
									else
									  {
										  $pa="";
									  }
									$ada;
									if(isset($form_data['ada']))
									  {
										  $ada=$form_data['ada'];
									  }
									else
									  {
										  $ada="";
									  }
									$alch;
									if(isset($form_data['alch']))
									  {
										  $alch=$form_data['alch'];
									  }
									else
									  {
										  $alch="";
									  }
						$insert_data = array('quantity'=>$form_data['quantity'],
						                      'no_of_seat'=>$form_data['no_of_seat'],
						                      'manufacture_date'=>$form_data['manufacture_date'],
											  'bus_type'=>$form_data['bus_type'],
											  'company_id'=>$form_data['comp_id'],
											  'rstm'=>$rstm,
											  'cd'=>$cd,
											  'dvd'=>$dvd,
											  'stv'=>$stv,
											  'wifi'=>$wifi,
											  'pa'=>$pa,
											  'ada'=>$ada,
											  'alch'=>$alch,
											  'photo'=>$photo_name,
											  'status'=>1
											 );
						                   $query=$this->db->insert('tbl_buses', $insert_data);
											if($query)
											  {
												return TRUE;
											  }
											else
											  {
											   return FALSE;
											  }

			     }
		/**********************************************/
		    function get_all_fleets()
			     {
					    $this->db->select('*');
						$this->db->from('tbl_buses');
						$this->db->order_by("id", "asc");
						$query = $this->db->get();
						$result=$query->result();
						return $result;
				 }
		/**********************************************/
	   function  get_fleet_details($id)
		         {
					$this->db->select('tbl_buses.*');
					$this->db->from('tbl_buses');
					$this->db->where('id',$id);
					$rec=$this->db->get();
					return $rec->row();
				}
		/**********************************************/
	     function save_update_fleet($form_data)
		       {
				   	 $photo_name="";
					 if(file_exists($_FILES['photo']['tmp_name']) || is_uploaded_file($_FILES['photo']['tmp_name']))
					   {
								
								$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/images/buses";
								//echo $config['upload_path']; exit;
								$config['allowed_types']        = 'gif|jpg|png';
								$config['max_size']             = 100;
								$config['max_width']            = 1024;
								$config['max_height']           = 768;
								$config['encrypt_name'] = TRUE;
							//$this->load->library('upload', $config);
							$this->upload->initialize($config);
					        if(!$this->upload->do_upload('photo'))
						      {
								 $this->session->set_flashdata('error',$this->upload->display_errors());
								 redirect('fleets/add_new_fleet', 'refresh');
						      }
					      else
					          {
						     	 $upload_data = $this->upload->data(); 
							     $photo_name = $upload_data['file_name'];
						      }
						}
					 else
					    {
						 $photo_name=$form_data['old_photo'];
						}
						/***********************************************/						
							    //$owner_id=$form_data['onwer_id'];
						  		    $rstm;
									if(isset($form_data['rstm']))
									  {
										  $rstm=$form_data['rstm'];
									  }
									else
									  {
										  $rstm="";
									  }
						            $cd;
									if(isset($form_data['cd']))
									  {
										  $cd=$form_data['cd'];
									  }
									else
									  {
										  $cd="";
									  }
								    $dvd;
									if(isset($form_data['dvd']))
									  {
										  $dvd=$form_data['dvd'];
									  }
									else
									  {
										  $dvd="";
									  }
									$stv;
									if(isset($form_data['stv']))
									  {
										  $stv=$form_data['stv'];
									  }
									else
									  {
										  $stv="";
									  }
									$wifi;
									if(isset($form_data['wifi']))
									  {
										  $wifi=$form_data['wifi'];
									  }
									else
									  {
										  $wifi="";
									  }
									$pa;
									if(isset($form_data['pa']))
									  {
										  $pa=$form_data['pa'];
									  }
									else
									  {
										  $pa="";
									  }
									$ada;
									if(isset($form_data['ada']))
									  {
										  $ada=$form_data['ada'];
									  }
									else
									  {
										  $ada="";
									  }
									$alch;
									if(isset($form_data['alch']))
									  {
										  $alch=$form_data['alch'];
									  }
									else
									  {
										  $alch="";
									  }
						$updat_data = array('quantity'=>$form_data['quantity'],
						                      'no_of_seat'=>$form_data['no_of_seat'],
						                      'manufacture_date'=>$form_data['manufacture_date'],
											  'bus_type'=>$form_data['bus_type'],
											  'company_id'=>$form_data['comp_id'],
											  'rstm'=>$rstm,
											  'cd'=>$cd,
											  'dvd'=>$dvd,
											  'stv'=>$stv,
											  'wifi'=>$wifi,
											  'pa'=>$pa,
											  'ada'=>$ada,
											  'alch'=>$alch,
											  'photo'=>$photo_name,
											  'status'=>1
											 );
										 $this->db->where('id', $form_data['fleet_id']);
						                 $query=$this->db->update('tbl_buses', $updat_data);
						                 //$query=$this->db->insert('tbl_buses', $updat_data);
											if($query)
											  {
												return TRUE;
											  }
											else
											  {
											   return FALSE;
											  }

			   }
		/**********************************************/
	}