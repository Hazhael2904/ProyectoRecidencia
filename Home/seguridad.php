<?php

class seguridad
{

	private $email=null;

	function _construct(argument)
	{
		if(isset($_SESSION["email"])) $this->$email=$_SESSION["email"];
	}

	public getEmail(){
		return $email
	}
}


?>