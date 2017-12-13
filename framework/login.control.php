<?php

class login {
	
	function index () {
		

	   $name = "Hello minds";

	   $GLOBALS["tpl"]->output("name", $name);
	   $GLOBALS["tpl"]->display('login.dt');	

	   //display('login.dt');	 
	}
}

