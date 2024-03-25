<?php

if(!defined('ABS_PATH')){die;}

class DatabaseService 
{
	function __construct(){}

	function get_users():array
	{
		//simply returns an unfiltered list of users from applicants.json
		$users = json_decode(file_get_contents('./applicants.json'), true)['users'];
		return $users;
	}
}