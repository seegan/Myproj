<?php
Class Admin extends CI_Model
{
 function login($email, $password)
 {
   $this -> db -> select('user_id, email, password');
   $this -> db -> from('pl_user');
   $this -> db -> where('email', $email);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>