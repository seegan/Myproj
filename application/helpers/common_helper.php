<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Check Whether the user is logged in
 *
 * Create a admin URL based on the admin folder path mentioned in config file. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */

function getCurrentAccountStatus($role_id = array())
{
	$CI = & get_instance();
	$current_user = $CI->session->userdata('user_logged_in');

	//Check Is there any logged in user (if user not loggedin go to message page)
	if(!$current_user)	{
		var_dump("user not loggedin!"); 
		die();
	}

	$user_role = $current_user['role_id'];
	$user_id = $current_user['user_id'];


	//Check Current user role can access the page or not
	if ( !in_array($user_role, $role_id) )	{
	    var_dump("Current user dont have access to process this page!"); 
	    die();
	}

	//Check Current user account activated or not
	if(!isUserAccountActive($user_id))
	{
		$id = 3;
		redirect('status/info/'.$id);  
	}
	

}

function getAllClients()
{
	$CI = & get_instance();
	$cond = array('role_id'=>2, 'is_active'=>1);
	$sel = array('user_id','email','acc_id','acc_active');
	$data = $CI->user_model->selectData($table="pl_user",$sel,$cond);

	$result = false;
	if($data)
	{
		$result = $data->result();
	}
	return $result;
}















//Getting status

function isUserAccountActive($user_id = '')
{
	$CI = & get_instance();

	$data = false;
	$res = $CI->user_model->selectData( $table="pl_user",$sel = array('user_id'), $con = array('user_id' => $user_id, 'acc_active' => 1 ) );
	if($res)
	{
		$data = true;
	}
	return $data;
}


//Get Current User
function getCurrentUserSession()
{
	$CI = & get_instance();
	if($CI->session->userdata('user_logged_in'))
    {
        return $CI->session->userdata('user_logged_in');
    }
    else
    {
    	return false;
    }
}



function totalCount($table='',$condition=array())
{
	$CI = & get_instance();
	return $CI->user_model->getCount($table, $condition);
}









//Created By Suji
//Get Users Type for navigation menu etc..
function getUserRoleType()
{
	$CI = & get_instance();
	$cl_type = $CI->user_model->selectData( $table="pl_user_role",$sel = array('role_id','name'), $con = array('role_id >' => 2 ,'is_active' => 1) );
	return $cl_type;
}

function getUserAllDetailsByRoleID($role_id,$user_id)
{
	$CI = & get_instance();
	$cl_type = $CI->user_model->selectData( $table="pl_user",$sel = "*", $con = array('role_id ' => $role_id , 'ref_id' => $user_id ,'is_active' => 1));
	return $cl_type;
}

function getAllRecipientDetailsByRefID($ref_id)
{
	$CI = & get_instance();
	$cl_type = $CI->user_model->selectData( $table="pl_recipients",$sel = array('recipient_id' , 'first_name' , 'email' , 'datetime'), $con = array('ref_id ' => $ref_id , 'is_active' => 1 ));
	return $cl_type;
}

function getRecipientByID($recip_id)
{
	$CI = & get_instance();
	$cl_type = $CI->user_model->selectData( $table="pl_recipients",$sel = array('*'), $con = array('recipient_id ' => $recip_id, 'is_active' => 1 ));
	return $cl_type;
}

function updateRecipientData($recip_data,$recip_id)
{
	$CI = & get_instance();
	$cl_type = $CI->user_model->updateData( $table="pl_recipients",$update_data = $recip_data, $con = array('recipient_id ' => $recip_id ));
	return $cl_type;
}


function mysqldatetime_to_timestamp($date)
{
	date_default_timezone_set('Asia/Kolkata'); 
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}
