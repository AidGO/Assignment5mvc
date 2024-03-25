<?php

if(!defined('ABS_PATH')){die;}

require_once('./db.service.php');
require_once('./applicant.model.php');

class ApplicantsService
{
	private $_db;

	function __construct(DatabaseService $database)
	{
		$this->_db = $database;
	}

	function get_users_from_database():array
	{
		return $this->_db->get_users();
	}

	function get_users_by_level(string $level):array
	{
		$users = $this->get_users_from_database();
		return array_filter($users, function($user) use ($level) {
			return $user['level'] === $level;
		});
	}

	function get_users_by_experience(int $experienceNeeded):array{
		$users = $this->get_users_from_database();
		return array_filter($users, function($user)use($experienceNeeded){
			return $user['experience'] >= $experienceNeeded;
		});
	}

	function get_users_by_skills(array $skills):array{
		$users = $this->get_users_from_database();
		$result = [];
			foreach($users as $user){
				for ($i = 0; $i < count($skills); $i++)
				{
					if(in_array($skills[$i],$user['skills']))
					{
						if(!in_array($user,$result))
						{
							$result[] = $user;
							echo "k";
						}
					}
				}	
		};
		return $result;
	}

	function get_selected_users(string $level, int $experience, array $skills):array{
		$rawdata = $this->get_users_from_database();
		$response = [];
		$filteredData = array_filter($rawdata, fn($user)=> $user["level"] == $level 
		&& $user["experience"] == $experience 
		&& count(array_intersect($user['skills'], $skills)) > 0);

		foreach ($filteredData as $data)
		{
			$response[] = new Applicant($data);
		}
		return $response;
	}
}