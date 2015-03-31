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

function topupClientData($topup_data)
{
	$CI =& get_instance();
	$CI->load->model('user_model');
	$topup_id = $CI->user_model->insertData($table="ta_admin_to_client_transaction",$topup_data);
    return $topup_id;
}

function getPendingClientTopup($user_id)
{
	$CI = & get_instance();
	$pending_topup = $CI->user_model->selectData( $table="ta_admin_to_client_transaction",$sel = array('trans_amount','trans_request_date'), $con = array('trans_approved' => 0 , 'trans_received_client_id' => $user_id ) , $limit= 5);
	return $pending_topup;
}

function getSuccessClientTopup($user_id)
{
	$CI = & get_instance();
	$success_topup = $CI->user_model->selectData( $table="ta_admin_to_client_transaction",$sel = array('trans_amount','trans_request_date'), $con = array('trans_approved' => 1 , 'trans_received_client_id' => $user_id ) , $limit= 5 );
	return $success_topup;
}

function topupAdminData($topup_data)
{
	$CI =& get_instance();

	$tot_balance = 0;
	$balance = $CI->user_model->selectData($table="ta_admin_fund_balance",$selectData=array('total_fund'),$condition=array('fund_id'=>1),$limit="1");
	if($balance) {
		$balance = $balance->row();
		$tot_balance = $balance->total_fund; 
	}

	$topup_data['admin_balance'] = $tot_balance;
	$topup_id = $CI->user_model->insertData($table="ta_admin_topup",$topup_data);

	$new_tot = $topup_data['topup_amount'] + $tot_balance;
	$CI->user_model->updateData($table="ta_admin_fund_balance",array('total_fund'=>$new_tot), array('fund_id'=>1));
    return $topup_id;
}

function getAdminTopup($user_id)
{
	$CI = & get_instance();
	$success_topup = $CI->user_model->selectData( $table="ta_admin_topup",$sel = array('topup_amount','topup_time'), $con = array('topup_status' => 1 , 'admin_id' => $user_id ) , $limit= 5 );
	return $success_topup;
}

function adminFundBalance($user_id)
{
	$CI = & get_instance();
	$topup_fund = $CI->user_model->selectSumData( $table="ta_admin_topup",$sel = 'topup_amount', $con = array('topup_status' => 1 , 'admin_id' => $user_id ));
	$transaction_fund = $CI->user_model->selectSumData( $table="ta_admin_to_client_transaction",$sel = 'trans_amount', $con = array('trans_approved' => 1 , 'trans_admin_id' => $user_id ));
	$total_fund=$topup_fund-$transaction_fund;
	echo $total_fund;
	
}

function getPendingTopupClientDetails()
{
	$table1 = "pl_user";
	$table2 = "ta_admin_to_client_transaction";
	$con = array('ta_admin_to_client_transaction.trans_approved' => 0);
	$join_con=$table1.".user_id = ".$table2.".trans_received_client_id";
	$CI = & get_instance();
	$pending_topup = $CI->user_model->selectJoinData( $table1,$table2,$join_con,$con);
	return $pending_topup;
}
