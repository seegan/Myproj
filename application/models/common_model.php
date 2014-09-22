<?php
/**
 * Reverse bidding system Auth_model Class
 *
 * This Model will take care of handling sessions of the user.
 * 
 * @package		CIN
 * @subpackage	Models
 * @category	User_model 
 * @author		YottaDo Dev Team
 * @version		Version 1.0
 * @link		http://www.yottado.com
 */
class common_model extends CI_Model {

    /**
     * Constructor 
     *
     */
    function __construct()
    {
        parent::__construct();
    }

	// --------------------------------------------------------------------
		
	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */

	//insert to database
	function insertData($table,$insertData,$condition='',$get_exist='')
	{
		$this->db->from($table);
		if($condition=='')
		{
			$this->db->where($insertData);
		}
		else
		{
			$this->db->where($condition);
		}
    	
    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		if($get_exist!='')
    		{
    			return $query->row('id');
    		}
    		else
    		{
    			return false;
    		}

    	}
    	else{
			$this->db->insert($table,$insertData);
			return $this->db->insert_id();
    	}
    }//End of insertData Function

	//update datas
	function updateData($table="",$updateData=array(),$condition=array())
	{
        $this->db->where($condition);
        $this->db->update($table, $updateData); 
	}//End of updateData Function

	function selectData($table="",$selectData=array(),$condition=array(),$dist="")
	{
		

		if(count($condition)>0)	{	
	 		$this->db->where($condition);
	 	}
	 	if($dist=="dist")
	 	{
 			$this->db->order_by('id','desc'); 
		}
		$this->db->from($table);
	 	$this->db->select($selectData);
		$result = $this->db->get();
		if($result->num_rows()>0)
			return $result;
		else 
			return false;	

	}

	function select_like($table="",$selectData=array(),$title)
	{
		
			$this->db->order_by('title', "RANDOM"); 
	 		$this->db->like('title', $title, 'both'); 

		$this->db->from($table);
		$this->db->limit('5');
	 	$this->db->select($selectData);
		$result = $this->db->get();
		if($result->num_rows()>0)
			return $result;
		else 
			return false;	

	}

	function insertDataAll($table,$insertData)
	{
			$this->db->insert($table,$insertData);
			return $this->db->insert_id();
    }//End of insertData Function

	// --------------------------------------------------------------------

	function selectUserFromSettings($select, $condition)
	{
		$this->db->select($select);
		$this->db->where($condition);
		$this->db->from('bookmark_settings');
		$this->db->join('bookmark_user', 'bookmark_user.id = bookmark_settings.value');

		$query = $this->db->get();

		return $query;
    }	


    function checkinguser($table,$story_id, $user_id)
    {
    	$table2 = "bookmark_posted";
    	$res = $this->db->query('SELECT * FROM '.$table.' A WHERE NOT EXISTS(SELECT * FROM '.$table2.' B WHERE B.posted_site_id=A.url AND B.posted_user_id='.$user_id.' AND B.posted_story_id='.$story_id.') AND A.user_id='.$user_id.' AND A.is_Active=1 LIMIT 1');
		return $res;    	
    }
	 
}
// End Auth_model Class
   
/* End of file Auth_model.php */ 
/* Location: ./app/models/Auth_model.php */