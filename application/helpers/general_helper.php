<?php
function get_all_states()
{
	$CI =& get_instance();
	$CI->load->model('Home_model');
	$response = $CI->Home_model->get_all_states();
	return $response;
}
function get_companies()
{
	$CI =& get_instance();
	$CI->load->model('Home_model');
	$response = $CI->Home_model->get_companies();
	return $response;
}
function notification_h_limit($text, $size=18)
{
  if(strlen($text)>$size)
  {
	  return substr($text, 0, $size)."...";
  }
  else
  {
	  return $text;
  }
}
function notification_p_limit($text, $size=42)
{
  if(strlen($text)>$size)
  {
	  return substr($text, 0, $size)."...";
  }
  else
  {
	  return $text;
  }
}
function convertDate($date) 
{
	$date = preg_replace('/\D/','/',$date);
	return date('Y-m-d',strtotime($date));
}
function american_date_format($date)
{
	if($date)
	{
	    return date('m-d-Y',strtotime($date));
	}
	else
	{
		return "";
	}
}
function session_check()
{
	$CI =& get_instance();
	$CI->load->model('Admin_model');
	$response = $CI->Admin_model->session_check();
	return $response;
}
?>