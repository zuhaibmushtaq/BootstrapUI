<?php

/**
 * 
 */
class authorization
{
		public $user;
		public $pwd;
	
	function getcredentials()
	{
		$user = $_POST['nm'];
		$pwd = $_POST['pass'];

		echo $user;
		echo $pwd;
	}
}




?>