<?php 
class Quotes_model extends CI_Model  
{
	function all_quotes()
	{
		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');
		$this->db->select('tbl_quotes.*,tbl_buses.bus_type,tbl_companies.company_name');
		$this->db->from('tbl_quotes');
		$this->db->join('tbl_buses','tbl_buses.id=tbl_quotes.bus_id','left');
		$this->db->join('tbl_companies','tbl_companies.id=tbl_buses.company_id','left');
		$this->db->order_by('tbl_quotes.id', 'desc');
		$rec=$this->db->get();
		return $rec->result();
	}
	function company_all_quotes()
	{
		$user_type=$this->session->userdata('user_type');
		$company_id=$this->session->userdata('company_id');
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
	function get_quote_details($id)
	{
		$user_type=$this->session->userdata('user_type');
		$this->db->select('tbl_quotes.*,tbl_buses.bus_type,tbl_buses.no_of_seat,tbl_buses.manufacture_date,tbl_buses.rstm,tbl_buses.cd,tbl_buses.dvd,tbl_buses.stv,tbl_buses.wifi,tbl_buses.pa,tbl_buses.ada,tbl_buses.alch,tbl_companies.company_name,tbl_companies.company_phone,tbl_companies.email as company_email,users.first_name,users.last_name,users.email,users.phone_no,users.mobile_no');
		$this->db->from('tbl_quotes');
		$this->db->join('tbl_buses','tbl_buses.id=tbl_quotes.bus_id','left');
		$this->db->join('tbl_companies','tbl_companies.id=tbl_buses.company_id','left');
		$this->db->join('users','users.id=tbl_quotes.user_id','left');
		$this->db->where('tbl_quotes.id', $id);
		$rec=$this->db->get();
		$quote=$rec->row();
		
		$multi_locations=$this->Home_model->get_quote_multi_cities($id);
		
		$html="";
		$html.='<div class="row">';
		$html.='<div class="col-md-12">';
		
		$html.='<div class="col-md-12"><table class="table table-striped table-bordered table-hover table-full-width">';
		$html.='<tbody>
		              <tr>
					      <td colspan="2" class="center"><b>Quote #: '.$quote->id.'</b></td>
					  </tr>
		        </tbody>';
		$html.='</table></div>';
		
		if($user_type==1)
		{
			$html.='<div class="col-md-6"><table class="table table-striped table-bordered table-hover table-full-width">';
			$html.='<tbody>
						  <tr>
							  <td colspan="2" class="center"><b>Client Information</b></td>
						  </tr>
						  <tr>
							  <th>Name:</th>
							  <td>'.$quote->first_name.' '.$quote->last_name.'</td>
						  </tr>
						  <tr>
							  <th>Email:</th><td>'.$quote->email.'</td>
						  </tr>
						  <tr>
							  <th>Phone/Mobile:</th><td>'.$quote->phone_no.' / '.$quote->mobile_no.'</td>
						  </tr>
					</tbody>';
			$html.='</table></div>';
			
			$html.='<div class="col-md-6"><table class="table table-striped table-bordered table-hover table-full-width">';
			$html.='<tbody>
						  <tr>
							  <td colspan="2" class="center"><b>Company Information</b></td>
						  </tr>
						  <tr>
							  <th>Name:</th>
							  <td>'.$quote->company_name.'</td>
						  </tr>
						  <tr>
							  <th>Email:</th><td>'.$quote->company_email.'</td>
						  </tr>
						  <tr>
							  <th>Phone:</th><td>'.$quote->company_phone.'</td>
						  </tr>
					</tbody>';
			$html.='</table></div>';
		}
		
		$html.='<div class="col-md-12"><table class="table table-striped table-bordered table-hover table-full-width">';
		$html.='<thead>
					<tr>
					   <td colspan="12" class="center danger"><b>Bus Information</b></td>
					</tr>
					<tr>
					    <th>Type</th>
						<th>Seats</th>
						<th>Model</th>
						<th>RSTM</th>
						<th>CD</th>
						<th>DVD</th>
						<th>STV</th>
						<th>WIFI</th>
						<th>PA</th>
						<th>ADA</th>
						<th>ALCH</th>
					</tr>
				</thead>';
			   if($quote->rstm)
			   {
				   $rstm='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $rstm='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($quote->cd)
			   {
				   $cd='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $cd='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($quote->dvd)
			   {
				   $dvd='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $dvd='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($quote->stv)
			   {
				   $stv='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $stv='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($quote->wifi)
			   {
				   $wifi='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $wifi='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($quote->pa)
			   {
				   $pa='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $pa='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($quote->ada)
			   {
				   $ada='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $ada='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($quote->alch)
			   {
				   $alch='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $alch='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
		$html.='<tbody>
                      <tr>
                          <td>'.$quote->bus_type.'</td>
						  <td>'.$quote->no_of_seat.'</td>
						  <td>'.$quote->manufacture_date.'</td>
						  <td>'.$rstm.'</td>
						  <td>'.$cd.'</td>
						  <td>'.$dvd.'</td>
						  <td>'.$stv.'</td>
						  <td>'.$wifi.'</td>
						  <td>'.$pa.'</td>
						  <td>'.$ada.'</td>
						  <td>'.$alch.'</td>
					  </tr>
				</tbody>';
		$html.='</table></div>';
		
		$html.='<div class="col-md-12"><table class="table table-striped table-bordered table-hover table-full-width">';
		$locations="";
		$waypoints="";
		if($multi_locations)
		{	
		    $waypoints='<th>Waypoints</th>';
			$locations.='<td>';
			foreach($multi_locations as $v)
			{
				$locations.=$v->locations."<br>"; 
			}
			$locations.='</td>';
		}
		if($quote->trip_type==1)
		{
			$trip_type="One Way";
		}
		elseif($quote->trip_type==2)
		{
			$trip_type="Round";
		}
		elseif($quote->trip_type==3)
		{
			$trip_type="Multi Days";
		}
		elseif($quote->trip_type==4)
		{
			$trip_type="Multi Cities";
		}
		$html.='<thead>
					<tr>
					   <td colspan="12" class="center danger"><b>Quote Information</b></td>
					</tr>
					<tr>
					    <th>Trip</th>
						<th>From</th>
						'.$waypoints.'
						<th>To</th>
						<th>From Date</th>
						<th>To Date</th>
						<th>Dept. Time</th>
						<th>No of Buses</th>
						<th>Extra Drivers</th>
						<th>Distance</th>
					</tr>
				</thead>';
		$html.='<tbody>
		              <tr>
					      <td>'.$trip_type.'</td>
					      <td>'.$quote->source.'</td>
						  '.$locations.'
						  <td>'.$quote->destination.'</td>
					      <td>'.american_date_format($quote->from_date).'</td>
						  <td>'.american_date_format($quote->to_date).'</td>
						  <td>'.$quote->from_time.'</td>
						  <td>'.$quote->no_of_buses.'</td>
						  <td>'.$quote->no_of_extra_drivers.'</td>
						  <td>'.$quote->distance.'</td>
					  </tr>
				</tbody>';
		$html.='</table></div>';
		
		if($quote->hotels)
		{
		    $html.='<div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i> Hotels</span></div>';
		}
		if($quote->restaurants)
		{
		    $html.='<div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i>  Restaurants</span></div>';
		}
		if($quote->attractions)
		{
		    $html.='<div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i>  Attractions</span></div>';
		}
		if($quote->tour_guide)
		{
		    $html.='<div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i>  Tour Guide</span></div>';
		}
		
		if($user_type==1)
		{
			$html.='<div class="col-md-12"><table class="table table-striped table-bordered table-hover table-full-width" style="margin-top:10px !important">';
			$html.='<tbody>
						  <tr>
							  <td colspan="12" class="center"><span class="label label-primary" style="font-size:15px !important; line-height:2 !important;">Estimated Trip Cost : $ '.$quote->cost.'</span></td>
						  </tr>
					</tbody>';
			$html.='</table></div>';
		}
		
		$html.='</div>';
		if($user_type==1 && $quote->quote_stage==1)
		{
			$html.='<div class="col-md-12"><div class="col-md-12">';
			$html.='<a href="'.base_url('Quotes/quote_forward_to_company/'.$quote->id.'').'" class="btn btn-success pull-right">Forward to Company</a>';
			$html.='<a href="'.base_url('Quotes/quote_reject/'.$quote->id.'').'" class="btn btn-danger pull-right" onClick="return confirm(\'Are you sure you want to reject?\')" style="margin-right:5px;">Reject</a>';
			$html.='</div></div>';
		}
		if($user_type==2 && $quote->quote_stage==2)
		{
			$html.='<div class="col-md-12"><div class="col-md-12">';
			$html.='<a href="'.base_url('Quotes/make_proposal/'.$quote->id.'').'" class="btn btn-success pull-right">Make Proposal</a>';
			$html.='<a href="'.base_url('Quotes/quote_reject_by_company/'.$quote->id.'').'" class="btn btn-danger pull-right" onClick="return confirm(\'Are you sure you want to reject?\')" style="margin-right:5px;">Reject</a>';
			$html.='</div></div>';
		}
		$html.='</div>';
		
	    return $html;
	}
	
	function quote_forward_to_company($quote_id)
	{
		$quote_details=$this->get_quote_data($quote_id);
		$company_info=$this->Admin_model->get_company_details($quote_details->company_id);
		$to_email=$company_info->email;
		$to_id=$company_info->owner_id;
		$from_id=$this->session->userdata('user_id');
		$noti_title="New Quote# ".$quote_id." received";
		$noti_description="New Quote# ".$quote_id." received";
		$link="Quotes/all_quotes";
		
		$forward = array(
		                'quote_stage' =>'2'
					 );
		$this->db->where('id', $quote_id);
		if($this->db->update('tbl_quotes', $forward))
		{
			$this->Notification_model->add_notification($from_id,$to_id,$noti_title,$noti_description,$link);
			$message = '<b>Hi,</b><br><br>New quote # '.$quote_id.' received. Details are: <br><br> <b>Source:</b> '.$quote_details->source.'
			<br><br><b>Destination:</b> '.$quote_details->destination.'
			<br><br><b>From Date:</b> '.$quote_details->from_date.'
			<br><br><b>Pick Up Time:</b> '.$quote_details->from_time.'
			<br><br><b>To Date:</b> '.$quote_details->to_date.'
			<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('no_reply@gobusrental.com', 'Gobusrental');
			$this->email->to($to_email); 
			$this->email->subject('New Quote Received');
			$this->email->message($message );
			$this->email->send();
			
			return true;
		}
		else
		{
			return false;
		}
	}
	function get_quote_data($quote_id)
	{
		$this->db->select('tbl_quotes.*,tbl_buses.bus_type,tbl_buses.no_of_seat,tbl_buses.manufacture_date,tbl_buses.rstm,tbl_buses.cd,tbl_buses.dvd,tbl_buses.stv,tbl_buses.wifi,tbl_buses.pa,tbl_buses.ada,tbl_buses.alch,tbl_companies.company_name,tbl_companies.company_phone,tbl_companies.email as company_email,users.first_name,users.last_name,users.email,users.phone_no,users.mobile_no');
		$this->db->from('tbl_quotes');
		$this->db->join('tbl_buses','tbl_buses.id=tbl_quotes.bus_id','left');
		$this->db->join('tbl_companies','tbl_companies.id=tbl_buses.company_id','left');
		$this->db->join('users','users.id=tbl_quotes.user_id','left');
		$this->db->where('tbl_quotes.id', $quote_id);
		$rec=$this->db->get();
		$quote=$rec->row();
		return $quote;
	}
	function quote_reject($quote_id)
	{
		$quote_details=$this->get_quote_data($quote_id);
		$user_info=$this->User_model->get_user_details($quote_details->user_id);
		$to_email=$user_info->email;
		$to_id=$user_info->id;
		$from_id=$this->session->userdata('user_id');
		$noti_title="Quote# ".$quote_id." rejected by admin";
		$noti_description="Quote# ".$quote_id." rejected by admin";
		$link="Quotes/all_quotes";
		
		$reject = array(
		                'status' =>'2',
		                'quote_stage' =>'0'
					 );
		$this->db->where('id', $quote_id);
		if($this->db->update('tbl_quotes', $reject))
		{
			$this->Notification_model->add_notification($from_id,$to_id,$noti_title,$noti_description,$link);
			$message = '<b>Hi,</b><br><br>Your quote # '.$quote_id.' has been rejected by admin. Details are: <br><br> <b>Source:</b> '.$quote_details->source.'
			<br><br><b>Destination:</b> '.$quote_details->destination.'
			<br><br><b>From Date:</b> '.$quote_details->from_date.'
			<br><br><b>Pick Up Time:</b> '.$quote_details->from_time.'
			<br><br><b>To Date:</b> '.$quote_details->to_date.'
			<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('no_reply@gobusrental.com', 'Gobusrental');
			$this->email->to($to_email); 
			$this->email->subject('Quote Rejected');
			$this->email->message($message );
			$this->email->send();
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function quote_reject_by_company($quote_id)
	{
		$quote_details=$this->get_quote_data($quote_id);
		$to_email="info@gobusrental.com";
		$to_id='1183';
		$from_id=$this->session->userdata('user_id');
		$noti_title="Quote# ".$quote_id." rejected by ".$this->session->userdata('user_name');
		$noti_description="Quote# ".$quote_id." rejected by ".$this->session->userdata('user_name');
		$link="Quotes/all_quotes";
		
		$reject = array(
		                'status' =>'3',
		                'quote_stage' =>'0'
					 );
		$this->db->where('id', $quote_id);
		if($this->db->update('tbl_quotes', $reject))
		{
			$this->Notification_model->add_notification($from_id,$to_id,$noti_title,$noti_description,$link);
			$message = '<b>Hi,</b><br><br>Your quote # '.$quote_id.' has been rejected by '.$this->session->userdata('user_name').'. Details are: <br><br> <b>Source:</b> '.$quote_details->source.'
			<br><br><b>Destination:</b> '.$quote_details->destination.'
			<br><br><b>From Date:</b> '.$quote_details->from_date.'
			<br><br><b>Pick Up Time:</b> '.$quote_details->from_time.'
			<br><br><b>To Date:</b> '.$quote_details->to_date.'
			<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($this->session->userdata('user_email'), $this->session->userdata('user_name'));
			$this->email->to($to_email); 
			$this->email->subject('Quote Rejected by company');
			$this->email->message($message );
			$this->email->send();
			
			return true;
		}
		else
		{
			return false;
		}
	}
	function make_proposal_pre_check($quote_id)
	{
		$user_type=$this->session->userdata('user_type');
		$company_id=$this->session->userdata('company_id');
		$quote=$this->get_quote_data($quote_id);
		if(($quote && $quote->quote_stage==2 && $quote->company_id==$company_id)|| ($quote && $quote->quote_stage==2 && $user_type==1))
		{
			return true;
		}
		else
		{
			$message='This quote is not for you company or quote yet not forwarded to you';
			$status_code='404';
			show_error($message, $status_code, $heading = 'Information');
		}
	}
	function add_proposal()
	{
		//echo"<pre>"; print_r($this->input->post()); exit;	
		$from_id=$this->session->userdata('user_id');	
		if($this->input->post('driver_tip'))
		{
				$driver_tip="Yes";
		}
		else
		{
			$driver_tip="";
		}
		if($this->input->post('driver_room'))
		{
				$driver_room="Yes";
		}
		else
		{
			$driver_room="";
		}
		if($this->input->post('tolls'))
		{
				$tolls="Yes";
		}
		else
		{
			$tolls="";
		}
		if($this->input->post('parking'))
		{
				$parking="Yes";
		}
		else
		{
			$parking="";
		}
		if($this->input->post('driver_meal'))
		{
				$driver_meal="Yes";
		}
		else
		{
			$driver_meal="";
		}
		
		$deposit_amount_due_date=convertDate($this->input->post('deposit_amount_due_date'));
		$final_payment_due_date=convertDate($this->input->post('final_payment_due_date'));
		$proposal = array('quote_id' => $this->input->post('quote_id'),
		                       'trip_cost' => $this->input->post('trip_cost'),
							   'deposit_amount_percentage' => $this->input->post('deposit_amount_percentage'),
							   'deposit_amount'=>$this->input->post('deposit_amount'),
							   'deposit_amount_due_date'=>$deposit_amount_due_date,
							   'final_payment' => $this->input->post('final_payment'),
							   'final_payment_due_date'=>$final_payment_due_date,
							   'driver_tip'=>$driver_tip,
							   'driver_room' => $driver_room,
							   'tolls' => $tolls,
							   'parking' => $parking,
							   'driver_meal'=>$driver_meal,
							   'comments'=>$this->input->post('comments'),
							   'proposal_by'=>$from_id,
							   'added_at'=>date('Y-m-d H:i:s')
							 );
		$this->db->insert('tbl_quotes_proposals', $proposal);
	    if($this->db->insert_id()>0)
		{
			$proposal_id=$this->db->insert_id();
			
			$update_quote_status=$this->update_quote_status('3',$this->input->post('quote_id'));
			
			$quote_details=$this->get_quote_data($this->input->post('quote_id'));
			$to_email="info@gobusrental.com";
			$to_id='1183';
			$noti_title="Proposal for quote# ".$this->input->post('quote_id')." by ".$this->session->userdata('user_name');
			$noti_description="Proposal for quote# ".$this->input->post('quote_id')." by ".$this->session->userdata('user_name');
			$link="Quotes/quote_proposal/".$proposal_id;
			
			$this->Notification_model->add_notification($from_id,$to_id,$noti_title,$noti_description,$link);
			$message = '<b>Hi,</b><br><br>New proposal for quote # '.$this->input->post('quote_id').' by '.$this->session->userdata('user_name').'. Details are: <br><br> <b>Source:</b> '.$quote_details->source.'
			<br><br><b>Destination:</b> '.$quote_details->destination.'
			<br><br><b>From Date:</b> '.$quote_details->from_date.'
			<br><br><b>Pick Up Time:</b> '.$quote_details->from_time.'
			<br><br><b>To Date:</b> '.$quote_details->to_date.'
			<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($this->session->userdata('user_email'), $this->session->userdata('user_name'));
			$this->email->to($to_email); 
			$this->email->subject('Proposal Received');
			$this->email->message($message );
			$this->email->send();
			
			return true;
		}
		else
		{
			return false;
		}
	}
	function update_quote_status($quote_stage,$quote_id)
	{
		$update = array(
		                'quote_stage' =>$quote_stage
					 );
		$this->db->where('id', $quote_id);
		if($this->db->update('tbl_quotes', $update))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function get_proposals_pre_check($quote_id)
	{
		$user_type=$this->session->userdata('user_type');
		$company_id=$this->session->userdata('company_id');
		$quote=$this->get_quote_data($quote_id);
		if(($quote && $quote->quote_stage==3 && $quote->company_id==$company_id)|| ($quote && $quote->quote_stage==3 && $user_type==1))
		{
			return true;
		}
		else
		{
			$message='No proposal found.';
			$status_code='404';
			show_error($message, $status_code, $heading = 'Information');
		}
	}
	function quote_proposal($quote_id)
	{
		$this->get_proposals_pre_check($quote_id);
		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');
		$this->db->select('tbl_quotes_proposals.*,users.first_name,users.last_name');
		$this->db->from('tbl_quotes_proposals');
		$this->db->join('users','users.id=tbl_quotes_proposals.proposal_by','left');
		$this->db->where('tbl_quotes_proposals.quote_id', $quote_id);
		if($user_type==2)
		{
			$this->db->where('tbl_quotes_proposals.proposal_by', $user_id);
		}
		$this->db->order_by('tbl_quotes_proposals.id', 'desc');
		$rec=$this->db->get();
		return $rec->result();
	}
	function get_proposal_data($id)
	{
		$this->db->select('tbl_quotes_proposals.*,users.first_name,users.last_name');
		$this->db->from('tbl_quotes_proposals');
		$this->db->join('users','users.id=tbl_quotes_proposals.proposal_by','left');
		$this->db->where('tbl_quotes_proposals.id', $id);
		$rec=$this->db->get();
		return $rec->row();
	}
	function get_proposal_details($id)
	{
		$user_type=$this->session->userdata('user_type');
		$proposal_details=$this->get_proposal_data($id);
		$html="";
		$html.='<table class="table table-striped table-bordered table-hover table-full-width">';
		$html.='<thead>
					<tr>
					   <td colspan="12" class="center info"><b>Proposal Information</b></td>
					</tr>
					<tr>
					    <th>Trip Cost</th>
						<th>Deposit Amount %</th>
						<th>Deposit Amount</th>
						<th>Deposit Amount Due Date</th>
						<th>Final Payment</th>
						<th>Final Payment Due Date</th>
						<th>Driver Tip</th>
						<th>Driver Room</th>
						<th>Tolls</th>
						<th>Parking</th>
						<th>Driver Meal</th>
					</tr>
				</thead>';
		       if($proposal_details->driver_tip)
			   {
				   $driver_tip='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $driver_tip='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($proposal_details->driver_room)
			   {
				   $driver_room='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $driver_room='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($proposal_details->tolls)
			   {
				   $tolls='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $tolls='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($proposal_details->parking)
			   {
				   $parking='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $parking='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
			   if($proposal_details->driver_meal)
			   {
				   $driver_meal='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
			   }
			   else
			   {
				   $driver_meal='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
			   }
		$html.='<tbody>
                      <tr>
						  <td>
							<span class="input-icon">
							    <input type="hidden" id="proposal_id" name="proposal_id" value="'.$proposal_details->id.'">
								<input type="number" id="trip_cost" name="trip_cost" class="form-control" value="'.$proposal_details->trip_cost.'">
								<i class="fa fa-usd"></i>
							</span>
						  </td>
						  <td>
								<input type="number" id="deposit_percentage" name="deposit_percentage" class="form-control" value="'.$proposal_details->deposit_amount_percentage.'">
						  </td>
						  <td>
							<span class="input-icon">
								<input type="text" id="deposit_amount" name="deposit_amount" class="form-control" value="'.$proposal_details->deposit_amount.'" readonly>
								<i class="fa fa-usd"></i>
							</span>
						  </td>
						  <td>'.american_date_format($proposal_details->deposit_amount_due_date).'</td>
						  <td>
							<span class="input-icon">
								<input type="text" id="final_payment" name="final_payment" class="form-control" value="'.$proposal_details->final_payment.'" readonly>
								<i class="fa fa-usd"></i>
							</span>
						  </td>
						  <td>'.american_date_format($proposal_details->final_payment_due_date).'</td>
						  <td>'.$driver_tip.'</td>
						  <td>'.$driver_room.'</td>
						  <td>'.$tolls.'</td>
						  <td>'.$parking.'</td>
						  <td>'.$driver_meal.'</td>
					  </tr>
				</tbody>';
		$html.='</table>';
		
		if($user_type==1 && $proposal_details->status==1)
		{
			$html.='<a href="'.base_url('Quotes/proposal_forward_to_user/'.$proposal_details->id.'/'.$proposal_details->quote_id.'').'" class="btn btn-success pull-right" onClick="return confirm(\'Are you sure you want to forward proposal to user?\')">Forward to User</a>';
			$html.='<a href="'.base_url('Quotes/proposal_reject_by_admin/'.$proposal_details->id.'/'.$proposal_details->quote_id.'').'" class="btn btn-danger pull-right" onClick="return confirm(\'Are you sure you want to reject?\')" style="margin-right:5px;">Reject</a>';
		}
		
		return $html;
	}
	
	function proposal_reject_by_admin($id,$quote_id)
	{
		$this->update_proposal_status($id,'2');
		
		$quote_details=$this->get_quote_data($quote_id);
		$proposal_details=$this->get_proposal_data($id);
		$user_info=$this->User_model->get_user_details($proposal_details->proposal_by);
		$to_email=$user_info->email;
		$to_id=$user_info->id;
		$from_id=$this->session->userdata('user_id');
		$noti_title="Proposal for quote# ".$quote_id." rejected";
		$noti_description="Proposal for quote# ".$quote_id." rejected";
		$link="Quotes/quote_proposal/".$quote_id;
		
		$this->Notification_model->add_notification($from_id,$to_id,$noti_title,$noti_description,$link);
		$message = '<b>Hi,</b><br><br>Proposal for quote # '.$quote_id.' rejected. Details are: <br><br> <b>Source:</b> '.$quote_details->source.'
		<br><br><b>Destination:</b> '.$quote_details->destination.'
		<br><br><b>From Date:</b> '.$quote_details->from_date.'
		<br><br><b>Pick Up Time:</b> '.$quote_details->from_time.'
		<br><br><b>To Date:</b> '.$quote_details->to_date.'
		<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($this->session->userdata('user_email'), $this->session->userdata('user_name'));
		$this->email->to($to_email); 
		$this->email->subject('Proposal Rejected');
		$this->email->message($message );
		$this->email->send();
		
		return true;
		
	}
	function update_proposal_status($proposal_id,$status)
	{
		$update = array(
		                'status' =>$status
					 );
		$this->db->where('id', $proposal_id);
		if($this->db->update('tbl_quotes_proposals', $update))
		{
			return true;
		}
		else
		{
			$message='Some thing went wrong. Please try again.';
			$status_code='404';
			show_error($message, $status_code, $heading = 'Information');
		}
	}
	function proposal_admin_pricing()
	{
		$update = array(
		                'admin_final_trip_cost' =>$this->input->post('trip_cost'),
						'admin_final_deposit_percentage' =>$this->input->post('deposit_percentage'),
						'admin_final_deposit_amount' =>$this->input->post('deposit_amount'),
						'admin_final_payment' =>$this->input->post('final_payment')
					 );
		$this->db->where('id', $this->input->post('proposal_id'));
		if($this->db->update('tbl_quotes_proposals', $update))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function proposal_forward_to_user($proposal_id,$quote_id)
	{
		//echo $proposal_id;exit;
		$this->update_proposal_status($proposal_id,'3');
		$this->update_quote_status('4',$quote_id);
		
		$quote_details=$this->get_quote_data($quote_id);
		$proposal_details=$this->get_proposal_data($id);
		$user_info=$this->User_model->get_user_details($quote_details->user_id);
		$to_email=$user_info->email;
		$to_id=$user_info->id;
		$from_id=$this->session->userdata('user_id');
		$noti_title="Proposal for quote# ".$quote_id." received";
		$noti_description="Proposal for quote# ".$quote_id." received";
		$link="Quotes/quote_proposal/".$quote_id;
		
		$this->Notification_model->add_notification($from_id,$to_id,$noti_title,$noti_description,$link);
		$message = '<b>Hi,</b><br><br>Proposal for quote # '.$quote_id.' received. Details are: <br><br> <b>Source:</b> '.$quote_details->source.'
		<br><br><b>Destination:</b> '.$quote_details->destination.'
		<br><br><b>From Date:</b> '.$quote_details->from_date.'
		<br><br><b>Pick Up Time:</b> '.$quote_details->from_time.'
		<br><br><b>To Date:</b> '.$quote_details->to_date.'
		<br><br><b><br><b>Regards,</b><br><br> Gobusrental';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from("no-reply@gobusrental.com", "Gobusrental");
		$this->email->to($to_email); 
		$this->email->subject('Proposal Received');
		$this->email->message($message );
		$this->email->send();
		
		return true;
	}
}