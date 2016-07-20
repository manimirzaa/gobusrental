<?php 
class Home_model extends CI_Model  
{
	function update_comp()
	{
		$states=$this->get_all_states();
		foreach($states->result() as $key=>$val)
		{			
			$this->db->select('tbl_companies.*');
			$this->db->from('tbl_companies');
			$this->db->where('state',$val->state_name);
			$rec=$this->db->get();
			//echo"<pre>";print_r($rec->result()); exit;
			if($rec->num_rows()>0)
			{
				foreach($rec->result() as $k=>$v)
				{
					$data=array('state'=>$val->id);
					$this->db->where('id',$v->id);
					$this->db->update('tbl_companies',$data);
				}
			}
		}
	}
	
	function get_all_states()
	{
		$this->db->select('states.*');
		$this->db->from('states');
		$rec=$this->db->get();
		return $rec;
	}
	
	function get_state_cities($state_id)
	{
		$this->db->select('cities.*');
		$this->db->from('cities');
		$this->db->where('state_id',$state_id);
		$rec=$this->db->get();
		$html="";
		$html.='<select name="city" id="city" class="form-control input-sm chosen-select">';
		if($rec->num_rows()>0)
		{
			$html.='<option value="">SELECT CITY</option>';
			foreach($rec->result() as $key=>$val)
			{
				$html.='<option value="'.$val->city_name.'">'.$val->city_name.'</option>';
			}
		}
		else
		{
			$html.='<option value="">NO CITY FOUND</option>';
		}
		$html.='</select>';
		return $html;
	}
	
	function ajax_state_county($state_id)
	{
		$this->db->distinct();
		$this->db->select('county');
		$this->db->from('cities');
		$this->db->where('state_id',$state_id);
		$rec=$this->db->get();
		$html="";
		$html.='<select name="county" id="county" class="form-control input-sm chosen-select">';
		if($rec->num_rows()>0)
		{
			$html.='<option value="">SELECT COUNTY</option>';
			foreach($rec->result() as $key=>$val)
			{
				$html.='<option value="'.$val->county.'">'.$val->county.'</option>';
			}
		}
		else
		{
			$html.='<option value="">NO COUNTY FOUND</option>';
		}
		$html.='</select>';
		return $html;
	}

	function get_searched_results($searched_params)
	{
		$data="";
		//echo"<pre>"; print_r($searched_params); exit;
		if(isset($searched_params['no_of_seats']) && !empty($searched_params['no_of_seats']))
		{
			$no_of_seats=$searched_params['no_of_seats'];
		}
		else
		{
			$no_of_seats="";
		}
		if($searched_params['searched_tab']==1)
		{
			if(isset($searched_params['city']))
			{
				$city=$searched_params['city'];
			}
			else
			{
				$city="";
			}
			if(isset($searched_params['bus_type']))
			{
				$bus_type=$searched_params['bus_type'];
			}
			else
			{
				$bus_type="";
			}
			$comapnies=$this->get_companies($searched_params['state'],$city);
			//echo"<pre>"; print_r($comapnies); exit;
			if($comapnies)
			{
				foreach($comapnies as $key=>$val)
				{
					$data[$key]=$val;
					$data[$key]->company_buses=$this->get_company_buses($val->id,$bus_type,$no_of_seats);
				}
			}
		}
		elseif($searched_params['searched_tab']==2)
		{
			$comapnies=$this->get_company_by_id($searched_params['company']);
			if($comapnies)
			{
				foreach($comapnies as $key=>$val)
				{
					$data[$key]=$val;
					$data[$key]->company_buses=$this->get_company_buses($val->id,$bus_type="",$no_of_seats);
				}
			}
		}
		elseif($searched_params['searched_tab']==3)
		{
			if(isset($searched_params['county']) && !empty($searched_params['county']))
			{
				$county=$searched_params['county'];
				$comapnies=$this->get_companies_with_county($searched_params['state_id'],$county);
				//echo"<pre>"; print_r($comapnies); exit;
				if($comapnies)
				{
					foreach($comapnies as $key=>$val)
					{
						if($val)
						{
							foreach($val as $k=>$v)
							{
								$data[$k]=$v;
								$data[$k]->company_buses=$this->get_company_buses($v->id,$bus_type="",$no_of_seats);
							}
						}
					}
				}
			}
			else
			{
				$comapnies=$this->get_companies($searched_params['state_id']);
				//echo"<pre>"; print_r($comapnies); exit;
				if($comapnies)
				{
					foreach($comapnies as $key=>$val)
					{
						$data[$key]=$val;
						$data[$key]->company_buses=$this->get_company_buses($val->id,$bus_type="",$no_of_seats);
					}
				}
			}
			
		}
		//echo"<pre>"; print_r($data); exit;
		return $data;
	}
	
	function get_companies($state=NULL,$city=NULL)
	{
		$this->db->select('tbl_companies.*,states.state_name');
		$this->db->from('tbl_companies');
		$this->db->join('states','tbl_companies.state=states.id','left');
		if($state!=NULL)
		{
		    $this->db->where('tbl_companies.state',$state);
		}
		if($city!=NULL)
		{
		    $this->db->where('tbl_companies.city',$city);
		}
		$rec=$this->db->get();
		return $rec->result();
	}
	
	function get_companies_with_county($state,$county)
	{
		$data=array();
		$county_cities=$this->get_county_cities($county);
		if($county_cities)
		{
			foreach($county_cities as $k=>$city)
			{
				$comp=$this->get_companies_with_city_state($state,$city->city_name);
				if($comp)
				{
					$data[$k]=$comp;
				}
			}
		}
		//echo"<pre>"; print_r($data); exit;
		return $data;
	}
	
	function get_company_by_id($company_id)
	{
		$this->db->select('tbl_companies.*,states.state_name');
		$this->db->from('tbl_companies');
		$this->db->join('states','tbl_companies.state=states.id','left');
		$this->db->where('tbl_companies.id',$company_id);
		$rec=$this->db->get();
		return $rec->result();
	}
	
	function get_company_buses($company_id,$bus_type=NULL,$no_of_seats=NULL)
	{
		//echo"<pre>"; print_r($facilities); exit;
		$this->db->select('tbl_buses.*');
		$this->db->from('tbl_buses');
		$this->db->where('company_id',$company_id);
		if($bus_type!=NULL)
		{
		    $this->db->where('bus_type',$bus_type);
		}
		if($no_of_seats!=NULL)
		{
			if($no_of_seats<=55)
			{
			    $this->db->where('no_of_seat >=',$no_of_seats);
			}
		}
		$this->db->group_by(array("no_of_seat","bus_type"));
		$rec=$this->db->get();
		if($rec->num_rows()>0)
		{
			$return_data=$rec->result();
		}
		else
		{
			$this->db->select('tbl_buses.*');
			$this->db->from('tbl_buses');
			$this->db->where('company_id',$company_id);
			if($bus_type!=NULL)
			{
				$this->db->where('bus_type',$bus_type);
			}
			$this->db->group_by(array("no_of_seat","bus_type"));
			$rec=$this->db->get();
			$return_data=$rec->result();
		}
		return $return_data;
	}
	
	function get_county_cities($county)
	{
		$this->db->select('cities.*');
		$this->db->from('cities');
		$this->db->where('cities.county',$county);
		$rec=$this->db->get();
		return $rec->result();
	}
	
	function get_companies_with_city_state($state,$city)
	{
		$this->db->select('tbl_companies.*,states.state_name');
		$this->db->from('tbl_companies');
		$this->db->join('states','tbl_companies.state=states.id','left');
		$this->db->where('tbl_companies.state',$state);
		$this->db->where('tbl_companies.city',$city);
		$rec=$this->db->get();
		return $rec->result();
	}
	
	function get_bus_details($bus_id)
	{
		$this->db->select('tbl_buses.*,tbl_companies.company_name,tbl_companies.city,tbl_companies.id as company_id,states.state_name');
		$this->db->from('tbl_buses');
		$this->db->join('tbl_companies','tbl_buses.company_id=tbl_companies.id','left');
		$this->db->join('states','tbl_companies.state=states.id','left');
		$this->db->where('tbl_buses.id',$bus_id);
		$rec=$this->db->get();
		return $rec->row();
	}
	
	function get_permileage_cost($start_date,$end_date)
	{
		$data="";
		$parts = explode('-',$start_date);
		$start = $parts[2] .'-'.$parts[0].'-'.$parts[1];
		$parts2 = explode('-',$end_date);
		$end = $parts2[2] .'-'.$parts2[0].'-'.$parts2[1];
        $query = $this->db->query("SELECT * FROM permileage WHERE status='1' AND  start_date <= '{$start}' AND end_date >= '{$end}'");
		if($query->num_rows()>0)
		{
		    $data['per_mile']=$query->row()->per_mile;
		}
		else
		{
			$this->db->select('permileage.*');
			$this->db->from('permileage');
			$this->db->limit('1');
			$rec=$this->db->get();
			$data['per_mile']=$rec->row()->per_mile; 
		}
		$query2 = $this->db->query("SELECT * FROM perday WHERE status='1' AND start_date <= '{$start}' AND end_date >= '{$end}'");
		if($query2->num_rows()>0)
		{
		    $data['per_day']=$query2->row()->per_day;
		}
		else
		{
			$this->db->select('perday.*');
			$this->db->from('perday');
			$this->db->limit('1');
			$rec=$this->db->get();
			$data['per_day']=$rec->row()->per_day; 
		}
		return $data;
	}
	
	function quote_request()
	{
		/*echo"<pre>"; print_r($this->input->post()); echo"<br>"; exit;
		$travel_needs=json_decode(htmlspecialchars_decode($this->input->post('travel_needs')));
		echo"<pre>"; print_r($travel_needs); exit;*/
		
		$user_existance=$this->User_model->is_user_email_already_exists($this->input->post('email'));
		if($user_existance->num_rows()>0)
		{
			$user_id=$user_existance->row()->id;
		}
		else
		{
			$user_id=$this->User_model->add_user($this->input->post());
		}
		
		if($this->input->post('total_days'))
		{
			$total_days=$this->input->post('total_days');
		}
		else
		{
			$total_days="";
		}
		$travel_needs=json_decode(htmlspecialchars_decode($this->input->post('travel_needs')));
		if(isset($travel_needs) && !empty($travel_needs))
		{
			if(isset($travel_needs->hotels))
			{
				$hotels="Yes";
			}
			else
			{
				$hotels="";
			}
			if(isset($travel_needs->attractions))
			{
				$attractions="Yes";
			}
			else
			{
				$attractions="";
			}
			if(isset($travel_needs->restaurants))
			{
				$restaurants="Yes";
			}
			else
			{
				$restaurants="";
			}
			if(isset($travel_needs->tour_guides))
			{
				$tour_guides="Yes";
			}
			else
			{
				$tour_guides="";
			}
		}
		else
		{
			$hotels="";
			$restaurants="";
			$attractions="";
			$tour_guides="";
		}
		$from_date=convertDate($this->input->post('from_date'));
		$to_date=convertDate($this->input->post('to_date'));
		$quote = array('source' => $this->input->post('from'),
		                       'destination' => $this->input->post('to'),
							   'from_date' => $from_date,
							   'from_time' => $this->input->post('pick_up_time'),
							   'to_date'=> $to_date,
							   'user_id'=>$user_id,
							   'no_of_passengers'=>$this->input->post('no_of_passenger'),
							   'no_of_buses'=>$this->input->post('no_of_buses'),
							   'no_of_extra_drivers'=>$this->input->post('no_of_extra_drivers'),
							   'drive' => $this->input->post('drive'),
							   'distance' => $this->input->post('distance'),
							   'total_days' => $total_days,
							   'cost'=>$this->input->post('cost'),
							   'description'=>$this->input->post('description'),
							   'trip_type'=>$this->input->post('trip_type'),
							   'date_added'=>date('Y-m-d H:i:s'),
							   'status' => '1',
							   'bus_id' => $this->input->post('bus_id'),
							   'company_id' => $this->input->post('company_id'),
							   'hotels' => $hotels,
							   'restaurants' => $restaurants,
							   'attractions' => $attractions,
							   'tour_guide' => $tour_guides,
							 );
		$this->db->insert('tbl_quotes', $quote);
	    if($this->db->insert_id()>0)
		{
			$quote_id=$this->db->insert_id();
			if($this->input->post('toWaypoints'))
			{
				$way_points="<ul>";
				foreach($this->input->post('toWaypoints') as $k=>$v)
				{
					$waypoints = array(
								   'quote_id' => $quote_id,
								   'locations' => $v
								  );
				    $this->db->insert('tbl_quote_multi_cities', $waypoints);
					$way_points.="<li>".$v."</li>";
				}
				$way_points.="</ul>";
				$locations="<br><br><b>Cities(Waypoints):</b><br>".$way_points;
			}
			else
			{
				$locations="";
			}
			$message = '<b>Hi,</b><br><br>Request has been submitted successfully. Details are: <br><br> <b>Source:</b> '.$this->input->post('from').$locations.'
			<br><br><b>Destination:</b> '.$this->input->post('to').'
			<br><br><b>From Date:</b> '.$this->input->post('from_date').'
			<br><br><b>Pick Up Time:</b> '.$this->input->post('pick_up_time').'
			<br><br><b>To Date:</b> '.$this->input->post('to_date').'
			<br><br><b>No of Passengers:</b> '.$this->input->post('no_of_passenger').'
			<br><br><b>No of Buses:</b> '.$this->input->post('no_of_buses').'
			<br><br><b>No of Extra Drivers:</b> '.$this->input->post('no_of_extra_drivers').'
			<br><br><b>Drive:</b> '.$this->input->post('drive').'
			<br><br><b>Distance:</b> '.$this->input->post('distance').'
			<br><br><b>Cost:</b> $ '.$this->input->post('cost').'
			<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('no_reply@gobusrental.com', 'Gobusrental');
			$this->email->to($this->input->post('email')); 
			$this->email->subject('Quote Request Received');
			$this->email->message($message );
			$this->email->send();
			
			return $quote_id;
		}
		else
		{
			return false;
		}
	}
	
	function get_quote_request_details($quote_id)
	{
		$this->db->select('tbl_quotes.*');
		$this->db->from('tbl_quotes');
		$this->db->where('tbl_quotes.id',$quote_id);
		$rec=$this->db->get();
		return $rec->row();
	}
	function get_quote_multi_cities($quote_id)
	{
		$this->db->select('tbl_quote_multi_cities.*');
		$this->db->from('tbl_quote_multi_cities');
		$this->db->where('tbl_quote_multi_cities.quote_id',$quote_id);
		$rec=$this->db->get();
		return $rec->result();
	}
}