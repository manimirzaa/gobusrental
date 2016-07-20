<?php 
class Notification_model extends CI_Model  
{
	function add_notification($from,$to,$title,$description,$link)
	{
		$notification = array(
		                'noti_from' => $from,
		                'noti_to' => $to,
						'title' => $title,
						'description' => $description,
						'link' => $link,
						'timestamp'=>date('Y-m-d H:i:s'),
						'status'=>1
					 );
		$this->db->insert('tbl_notifications', $notification);
	    if($this->db->insert_id()>0)
		{
			return true;
		}
		else
		{
			$message='Something went wrong please try again';
			$status_code='404';
			show_error($message, $status_code, $heading = 'Information');
		}
	}
}
?>