<?php
class Applicant
{
	private $firstname;
    private $lastname;
	private $level;
	private $experience;
	private $skills;

	function __construct($data)
	{
		$this->firstname = $data['firstName'];
        $this->lastname = $data['lastName'];
		$this->level = $data['level'];
		$this->experience = $data['experience'];
		$this->skills = $data['skills'];
	}

	function getFirstName()
	{
		return $this->firstname;
	}

    function getLastName()
    {
        return $this->lastname;
    }

	function getLevel()
	{
		return $this->level;
	}

	function getExperience()
	{
		return $this->experience;
	}

	function getSkills()
	{
		return $this->skills;
	}

	function setFirstName(string $firstname)
	{
		$this->firstname = $firstname;
	}

    function setLastName(string $lastname)
    {
        $this->lastname = $lastname;
    }

	function setLevel(string $level)
	{
		$this->level = $level;
	}

	function setExperience(int $experience)
	{
		$this->experience = $experience;
	}

	function setSkills(array $skills)
	{
		$this->skills = $skills;
	}

	function appendSkill(string $skill)
	{
		array_push($this->skills, $skill);
	}
}